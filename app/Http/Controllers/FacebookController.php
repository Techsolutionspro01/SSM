<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\FacebookToken;
use App\Models\FacebookPage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\FacebookPost;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\URL;





class FacebookController extends Controller
{
    public function getFacebookToken(Request $request)
    {
        try {
            $token = $request->input('token');

            $response = Http::get('https://graph.facebook.com/v19.0/me', [
                'access_token' => $token
            ]);

            $userData = $response->json();


            $newToken = FacebookToken::updateOrCreate(
                ['facebook_id' => $userData['id']], // Update if this condition matches
                [
                    'token' => $token,
                    'name' => $userData['name'],
                    'facebook_id' => $userData['id']
                ]
            );
            return response()->json([
                'message' => 'Facebook details saved successfully',
                'data' => $newToken,
                'status' => 201
            ], 201);
        } catch (\Exception $error) {
            // Handle exceptions
            \Log::error('Error fetching Facebook details: ' . $error->getMessage());
            return response()->json([
                'message' => 'Error',
                'error' => $error->getMessage()
            ], 500);
        }
    }

    public function welcome()
    {
        try {

            return view('welcome');
        } catch (\Exception $error) {
            // Handle exceptions
            \Log::error('Error fetching Facebook details: ' . $error->getMessage());
            return response()->json([
                'message' => 'Error',
                'error' => $error->getMessage()
            ], 500);
        }
    }


    public function getFacebookPages(Request $request)
    {
        try {

            // dd($request->all());
            // Retrieve the token and facebook_id from the request headers
            $token = $request->header('Authorization');
            $facebookId = $request->header('facebookid'); // Assuming 'facebook_id' as the custom header name for Facebook ID
            // dd($token, $facebookId);
            // Check if the token is not empty
            if (!empty($token)) {
                // Make a request to Facebook Graph API to fetch pages using the token
                $response = Http::get("https://graph.facebook.com/v19.0/me/accounts", [
                    'access_token' => $token
                ]);

                // Decode the JSON response
                $pagesData = $response->json()['data'];


                if (!empty($pagesData)) {
                    // Check if there are existing entries for the given facebookId
                    $existingPages = FacebookPage::where('facebook_Account_id', $facebookId)->get();

                    // Delete existing entries if any
                    if (!$existingPages->isEmpty()) {
                        foreach ($existingPages as $page) {
                            $page->delete();
                        }
                    }

                    // Iterate through fetched pages and save them to the database
                    foreach ($pagesData as $page) {
                        FacebookPage::create([
                            'facebook_Account_id' => $facebookId,
                            'access_token' => $page['access_token'],
                            'category' => $page['category'],
                            'category_list' => json_encode($page['category_list']),
                            'name' => $page['name'],
                            'facebook_id' => $page['id'],
                            'tasks' => isset($page['tasks']) ? json_encode($page['tasks']) : null
                        ]);
                    }

                    return response()->json([
                        'message' => 'All pages fetched and saved successfully',
                        'data' => $pagesData,
                        'status' => 201
                    ], 200);
                } else {
                    return response()->json([
                        'message' => 'No pages fetched from Facebook',
                        'status' => 404
                    ], 404);
                }
            }

            return response()->json([
                'message' => 'No tokens found in the request headers',
                'status' => 404
            ], 404);
        } catch (\Exception $error) {
            // Handle exceptions
            \Log::error('Error fetching Facebook pages: ' . $error->getMessage());
            return response()->json([
                'message' => 'Internal server error',
                'error' => $error->getMessage(),
                'status' => 500
            ], 500);
        }
    }


    public function getNeverExpireToken(Request $request)
    {
        try {
            // Validate the request
            $validatedData = $request->validate([
                'short_lived_token' => 'required|string',
            ]);

            // Replace with your app's ID and secret
            $appId = '784241733808038';
            $appSecret = 'b811653fa8c193346f82a149aa8a3ed4';
            $shortLivedToken = $request->input('short_lived_token');

            // Exchange the short-lived token for a long-lived token
            $response = Http::get('https://graph.facebook.com/oauth/access_token', [
                'grant_type' => 'fb_exchange_token',
                'client_id' => $appId,
                'client_secret' => $appSecret,
                'fb_exchange_token' => $shortLivedToken,
            ]);

            // Check if the response is successful
            if ($response->failed()) {
                return response()->json(['error' => 'Failed to exchange token', 'details' => $response->json()], $response->status());
            }

            // Log the response for debugging
            \Log::info('Facebook token exchange response:', $response->json());

            // Extract the access token and expiration time from the response
            $responseData = $response->json();

            if (!isset($responseData['access_token'])) {
                return response()->json(['error' => 'Access token not found in the response'], 500);
            }

            $longLivedToken = $responseData['access_token'];
            $expiresIn = $responseData['expires_in'] ?? null; // Some responses may not include 'expires_in'

            // If 'expires_in' is not present, the token might be non-expiring
            $expiresAt = $expiresIn ? date('Y-m-d H:i:s', time() + $expiresIn) : 'never';

            return response()->json([
                'long_lived_token' => $longLivedToken,
                'expires_in' => $expiresIn,
                'expires_at' => $expiresAt,
                'message' => 'Token exchanged successfully',
                'data' => $responseData,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error exchanging token',
                'message' => $e->getMessage(),
            ], 500);
        }
    }


    public function postFacebook(Request $request)
    {
        // Retrieve data from the request
        $message = $request->input('message');
        $scheduleTime = $request->input('schedule_time');
        $facebookCarousel = $request->input('facebook_carousel');
        $selectedPagesJson = $request->input('selectedPages'); // JSON string
        $selectedPages = json_decode($selectedPagesJson, true); // Convert JSON to array
        $images = $request->file('images');


//  dd($scheduleTime);
        $imageData = [];
        $facebookResponses = [];

        if ($scheduleTime == 0) {
            // dd('time', $scheduleTime);
         
            if ($images !== null && $facebookCarousel == 'on') {
                // Loop through each uploaded image
                foreach ($images as $image) {
                    // Get the original name of the uploaded image
                    $imageName = $image->getClientOriginalName();

                    // Store the uploaded image in the storage/app/public/post directory
                    $path = $image->store('public/post');

                    // Get the path relative to the storage/app/public directory
                    $relativePath = str_replace('public/', '', $path);

                    // Add image name and path to the array
                    $imageData[] = [
                        'link' => URL::asset('storage/' . $relativePath),
                        'path' => $relativePath
                    ];
                }

                // Prepare the child attachments for the carousel
                $childAttachments = [];
                foreach ($imageData as $image) {
                    $childAttachments[] = [
                        'link' => URL::asset('storage/' . $image['path']),
                        'picture' => URL::asset('storage/' . $image['path'])
                    ];
                }

                // Loop through each selected page to get the access token
                foreach ($selectedPages as &$page) {
                    // Retrieve the access token from the database using the page id
                    $facebookPage = FacebookPage::where('facebook_id', $page['id'])->first();

                    if ($facebookPage) {
                        $page['access_token'] = $facebookPage->access_token; // Add the access token to the page array
                    } else {
                        $page['access_token'] = null; // Add null if the access token is not found
                    }
                }

                // Initialize GuzzleHTTP client
                $client = new Client();

                // Initialize an array to store the responses from Facebook
                $facebookResponses = [];

                // Loop through each selected page to post the carousel
                foreach ($selectedPages as $page) {
                    // Retrieve the access token
                    $pageAccessToken = $page['access_token'];

                    if ($pageAccessToken) {
                        try {
                            // Make a POST request to the Facebook Graph API to post the carousel
                            $response = $client->post("https://graph.facebook.com/v19.0/{$page['id']}/feed", [
                                'form_params' => [
                                    'access_token' => $pageAccessToken,
                                    'message' => $message,
                                    'link' => URL::to('/'), // Use your website's root URL or any other valid link
                                    'child_attachments' => json_encode($childAttachments)
                                ],
                            ]);

                            // Add the response to the array
                            $facebookResponses[] = json_decode($response->getBody()->getContents(), true);
                        } catch (\Exception $e) {
                            // Handle the exception (e.g., log the error, return an error response, etc.)
                            return response()->json(['error' => 'Failed to post carousel to Facebook', 'details' => $e->getMessage()], 500);
                        }
                    }
                }

                // Return the responses or handle them as needed
                // return response()->json(['success' => true, 'data' => $facebookResponses]);
            } else if ($images !== null && $facebookCarousel == 'off') {

                // Loop through each uploaded image
                foreach ($images as $image) {
                    // Get the original name of the uploaded image
                    $imageName = $image->getClientOriginalName();

                    // Store the uploaded image in the storage/app/public/post directory
                    $path = $image->store('public/post');

                    // Get the path relative to the storage/app/public directory
                    $relativePath = str_replace('public/', '', $path);

                    // Add image name and path to the array
                    $imageData[] = [
                        'name' => $imageName,
                        'path' => $relativePath
                    ];
                }


                // Loop through each selected page to get the access token
                foreach ($selectedPages as &$page) {

                    // Retrieve the access token from the database using the page id
                    $facebookPage = FacebookPage::where('facebook_id', $page['id'])->first();

                    if ($facebookPage) {
                        $page['access_token'] = $facebookPage->access_token; // Add the access token to the page array
                    } else {
                        $page['access_token'] = null; // Add null if the access token is not found
                    }
                }


                // Initialize GuzzleHTTP client
                $client = new Client();


                // dd($imageData);
                // Loop through each selected page to post the images
                foreach ($selectedPages as $page) {
                    foreach ($imageData as $image) {
                        // Construct the full path to the image
                        $imagePath = public_path('storage/' . $image['path']);

                        // Make sure the image file exists
                        if (!file_exists($imagePath)) {
                            return response()->json(['error' => 'Image file not found'], 404);
                        }

                        // Read the image data
                        $imageData = file_get_contents($imagePath);

                        // Make a POST request to the Facebook Graph API to post the image
                        try {
                            $response = $client->post("https://graph.facebook.com/v19.0/{$page['id']}/photos", [
                                'multipart' => [
                                    [
                                        'name' => 'source',
                                        'contents' => $imageData,
                                        'filename' => basename($imagePath),
                                    ],
                                    [
                                        'name' => 'message',
                                        'contents' => $message,
                                    ],
                                    [
                                        'name' => 'access_token',
                                        'contents' => $page['access_token'],
                                    ],
                                ],
                            ]);


                            // Add the response to the array
                            $facebookResponses[] = json_decode($response->getBody()->getContents(), true);
                        } catch (\Exception $e) {
                            // Handle the exception (e.g., log the error, return an error response, etc.)
                            return response()->json(['error' => 'Failed to post image to Facebook', 'details' => $e->getMessage()], 500);
                        }
                    }
                }
            } else {

                // Initialize GuzzleHTTP client
                $client = new Client();



                // Loop through each selected page to post the images
                foreach ($selectedPages as &$page) {
                    // Retrieve the access token from the database
                    $facebookPage = FacebookPage::where('facebook_id', $page['id'])->first();
                    if ($facebookPage) {
                        $page['access_token'] = $facebookPage->access_token; // Add the access token to the page array
                    } else {
                        $page['access_token'] = null; // Add null if the access token is not found
                        continue; // Skip this page if no access token found
                    }


                    // Make a POST request to the Facebook Graph API to post the image

                    $response = $client->post("https://graph.facebook.com/v19.0/{$page['id']}/feed", [
                        'form_params' => [
                            'message' => $message,
                            'access_token' => $page['access_token'],
                        ],
                    ]);

                    // Add the response to the array
                    $facebookResponses[] = json_decode($response->getBody()->getContents(), true);
                }
            }
            // Create a new FacebookPost model instance
            $post = new FacebookPost();
            $post->message = $message;
            $post->facebook_carousel = $facebookCarousel;
            $post->selected_pages = json_encode($selectedPages); // Store selected pages with access tokens
            $post->images = json_encode($imageData);
            // $post->schedule_time = $scheduleTime; // Set the schedule time in the model
            $post->save();

            // Return success response with the stored post and Facebook responses
            return response()->json([
                'message' => 'Post created successfully and images posted to Facebook',
                'data' => $post,
                'facebook_responses' => $facebookResponses,
                'status' => 201,
            ]);
        } else {

            // dd('np 0', $scheduleTime);
            if ($images !== null) {
                // Loop through each uploaded image
                foreach ($images as $image) {
                    // Get the original name of the uploaded image
                    $imageName = $image->getClientOriginalName();

                    // Store the uploaded image in the storage/app/public/post directory
                    $path = $image->store('public/post');

                    // Get the path relative to the storage/app/public directory
                    $relativePath = str_replace('public/', '', $path);

                    // Add image name and path to the array
                    $imageData[] = [
                        'link' => URL::asset('storage/' . $relativePath),
                        'path' => $relativePath
                    ];
                }

            }
            $post = new FacebookPost();
            $post->message = $message;
            $post->facebook_carousel = $facebookCarousel;
            $post->selected_pages = json_encode($selectedPages); // Store selected pages with access tokens
            $post->images = json_encode($imageData);
            $post->schedule_time = $scheduleTime; // Set the schedule time in the model
            $post->posted = false;
            $post->save();

            // Return success response with the stored post and Facebook responses
            return response()->json([
                'message' => 'Post saved successfully will be  posted on selecetd time',
                'data' => $post,
                'facebook_responses' => $facebookResponses,
                'status' => 201,
            ]);
        }
    }

}
