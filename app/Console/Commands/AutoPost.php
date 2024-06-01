<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\FacebookPost;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;


class AutoPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:auto-post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    // public function handle()
    // {
    //     $this->info('Hello World!');
    // }

    public function handle()
    {

        $this->info('Hello World!');

        $now = Carbon::now();
        $posts = FacebookPost::where('schedule_time', '<=', $now)->where('posted', false)->get();
        $client = new Client();
        $facebookResponses = [];

        foreach ($posts as $post) {
            $selectedPages = json_decode($post->selected_pages, true);
            $imageData = json_decode($post->images, true);
            $facebookCarousel = $post->facebook_carousel;
            $message = $post->message;

            if ($facebookCarousel == 'on') {
                $childAttachments = [];
                foreach ($imageData as $image) {
                    $childAttachments[] = [
                        'link' => $image['link'],
                        'picture' => $image['link']
                    ];
                }

                foreach ($selectedPages as $page) {
                    $pageAccessToken = $page['access_token'];

                    if ($pageAccessToken) {
                        try {
                            $response = $client->post("https://graph.facebook.com/v19.0/{$page['id']}/feed", [
                                'form_params' => [
                                    'access_token' => $pageAccessToken,
                                    'message' => $message,
                                    'link' => URL::to('/'),
                                    'child_attachments' => json_encode($childAttachments)
                                ],
                            ]);

                            $facebookResponses[] = json_decode($response->getBody()->getContents(), true);
                        } catch (\Exception $e) {
                            \Log::error('Failed to post carousel to Facebook', ['details' => $e->getMessage()]);
                        }
                    }
                }
            } else {
                foreach ($selectedPages as $page) {
                    foreach ($imageData as $image) {
                        $imagePath = public_path('storage/' . $image['path']);
                        if (!file_exists($imagePath)) {
                            \Log::error('Image file not found', ['path' => $imagePath]);
                            continue;
                        }

                        $imageData = file_get_contents($imagePath);

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

                            $facebookResponses[] = json_decode($response->getBody()->getContents(), true);
                        } catch (\Exception $e) {
                            \Log::error('Failed to post image to Facebook', ['details' => $e->getMessage()]);
                        }
                    }
                }
            }

            $post->posted = true;
            $post->save();
        }
    }
}
