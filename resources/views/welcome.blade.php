 @extends('layouts.main')

 @section('title', 'Welcome')

 @section('content')



     <div id="layoutSidenav">
         <x-side-bar></x-side-bar>

         <div id="layoutSidenav_content">
             <main>
                 <div class="container-fluid px-4">
                     <h1 class="mt-4">Dashboard</h1>
                     <ol class="breadcrumb mb-4">
                         <li class="breadcrumb-item active">Dashboard</li>
                     </ol>
                     <div class="row mb-4 mt-2">
                         <div class="col-md-6 col-xl-4 border-0 shadow">
                             <div>
                                 <div class="text-dark">
                                     <h3 id="welcomeMessage">Welcome!</h3>
                                     <p class="pt-3">Lorem ipsum dolor sit amet consectetur.</p>
                                 </div>

                                 <br>
                                 <div
                                     class="button d-flex justify-content-center align-items-center justify-content-around pb-4">
                                     <button class="btn btn-dark text-white mr-sm-2 mb-2 mb-sm-0" data-bs-toggle="modal"
                                         data-bs-target="#connectAccountsModal">Connect
                                         Accounts</button>
                                     <button class="btn btn-outline-light text-dark bg-light ml-sm-2">Connect Blogs /
                                         Web</button>
                                 </div>
                             </div>

                             {{-- connect-account-modal.blade.php --}}
                             <x-connect-account-modal></x-connect-account-modal>
                         </div>

                         <div class="col-md-6 col-xl-4 mt-2 d-none">
                             <div class="card border-0 shadow">
                                 <div class="card-body">
                                     <div class="text">
                                         <h3>Plan Info</h3>
                                     </div>
                                     <div class="d-flex flex-column flex-sm-row flex-md-column justify-content-between">

                                         <div class="button d-flex justify-content-between mt-3 mt-sm-0">
                                             <button
                                                 class="btn btn-outline-light text-dark bg-light ml-sm-2 ml-md-2 mb-2 mb-sm-0"
                                                 data-bs-toggle="modal" data-bs-target="#changeplanmanager">Change
                                                 Plan</button>
                                             <button class="btn btn-primary">Subscribe</button>
                                         </div>
                                     </div>
                                     <hr>
                                     <div>
                                         <div class="workspace d-flex justify-content-between align-items-center">
                                             <p>Workspace</p>
                                             <span class="progress progress-bar bg-success" role="progressbar"
                                                 style="width: 50%;" aria-valuenow="50" aria-valuemin="0"
                                                 aria-valuemax="100"></span>
                                             <span>1/1</span>
                                         </div>
                                         <div class="members d-flex justify-content-between align-items-center">
                                             <p>Members</p>
                                             <span class="progress progress-bar bg-success" role="progressbar"
                                                 style="width: 50%;" aria-valuenow="50" aria-valuemin="0"
                                                 aria-valuemax="100"></span>
                                             <span>0/1</span>
                                         </div>
                                         <div class="accounts d-flex justify-content-between align-items-center">
                                             <p>Accounts</p>
                                             <span class="progress progress-bar bg-success" role="progressbar"
                                                 style="width: 50%;" aria-valuenow="50" aria-valuemin="0"
                                                 aria-valuemax="100"></span>
                                             <span>0/10</span>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <!-- The changeplanmanager Modal -->
                             <div class="modal fade" id="changeplanmanager">
                                 <div class="modal-dialog modal-xl">
                                     <div class="modal-content">

                                         <!-- Modal Header -->
                                         <div class="modal-header d-none">
                                             <h4 class="modal-title">Welcome to [SSM Name]</h4>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                         </div>

                                         <!-- Modal body -->
                                         <div class="modal-body">
                                             <div class="row">
                                                 <div class="text">
                                                     <h2 class="text-center pt-3 pb-3 mb-4 mt-3">Change your trial
                                                         plan to try more features with higher limits</h2>
                                                 </div>
                                             </div>
                                             <div class="row">
                                                 <div class="col-lg-3 pt-4 changeplan">
                                                     <div class="starter">
                                                         <p>STARTER</p>
                                                     </div>
                                                     <div class="details mt-3 mb-3 pt-2 pb-2">
                                                         <p><span>1</span> Workspace</p>
                                                         <p><span>No</span> Team Members</p>
                                                         <p><span>5</span> Social Accounts</p>
                                                         <p><span>No</span> Blogs</p>
                                                         <p><span>No</span> Automations</p>
                                                         <p><span>10GB</span> Media Storage</p>
                                                         <p><span>10</span> AI Image Credits</p>
                                                         <button class="btn btn-sm btn-outline-dark mt-3 px-5">Chose
                                                             Plan</button>
                                                     </div>
                                                 </div>
                                                 <div class="col-lg-3 pt-4 changeplan">
                                                     <div class="starter">
                                                         <p>PROFESSIONAL</p>
                                                     </div>
                                                     <div class="details mt-3 mb-3 pt-2 pb-2">
                                                         <p><span>1</span> Workspace</p>
                                                         <p><span>1</span> Team Members</p>
                                                         <p><span>5</span> Social Accounts</p>
                                                         <p><span>3</span> Blogs</p>
                                                         <p><span>10</span> Automations</p>
                                                         <p><span>10GB</span> Media Storage</p>
                                                         <p><span>20</span> AI Image Credits</p>
                                                         <button class="btn btn-sm btn-outline-dark mt-3 px-5">Chose
                                                             Plan</button>
                                                     </div>
                                                 </div>
                                                 <div class="col-lg-3 pt-4 bg-light changeplan">
                                                     <div class="starter">
                                                         <p>Influncer</p>
                                                     </div>
                                                     <div class="details mt-3 mb-3 pt-2 pb-2">
                                                         <p><span>1</span> Workspace</p>
                                                         <p><span>5</span> Team Members</p>
                                                         <p><span>25</span> Social Accounts</p>
                                                         <p><span>25</span> Blogs</p>
                                                         <p><span>Unlimited</span> Automations</p>
                                                         <p><span>20GB</span> Media Storage</p>
                                                         <p><span>20</span> AI Image Credits</p>
                                                         <button class="btn btn-sm btn-outline-dark mt-3 px-5 bg-light"
                                                             disabled>Current Plan</button>
                                                     </div>
                                                 </div>
                                                 <div class="col-lg-3 pt-4">
                                                     <div class="starter">

                                                         <p>BUSINESS & AGENCY</p>
                                                         <h4 class="text-danger d-none">start</h4>
                                                     </div>
                                                     <div class="details mt-3 mb-3 pt-2 pb-2">
                                                         <p><span>1</span> Workspace</p>
                                                         <p><span>5</span> Team Members</p>
                                                         <p><span>25</span> Social Accounts</p>
                                                         <p><span>25</span> Blogs</p>
                                                         <p><span>Unlimited</span> Automations</p>
                                                         <p><span>20GB</span> Media Storage</p>
                                                         <p><span>20</span> AI Image Credits</p>
                                                         <button class="btn btn-sm btn-outline-dark mt-3 px-5">Chose
                                                             Plan</button>
                                                     </div>
                                                 </div>
                                             </div>

                                         </div>
                                         <div class="d-flex justify-content-center align-items-center mt-5 mb-5 ">
                                             <button type="button" class="btn btn-sm btn-dark px-5"
                                                 data-bs-dismiss="modal">Close</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-3 col-xl-4 mt-2 d-none">
                             <div class="card border-0 shadow">
                                 <div class="card-body">
                                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid est autem
                                         dolorum cupiditate animi modi!</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="row d-none">
                         <div class="col-xl-3 col-md-6">
                             <div class="card bg-primary text-white mb-4">
                                 <div class="card-body">Primary Card</div>
                                 <div class="card-footer d-flex align-items-center justify-content-between">
                                     <a class="small text-white stretched-link" href="#">View Details</a>
                                     <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-xl-3 col-md-6">
                             <div class="card bg-warning text-white mb-4">
                                 <div class="card-body">Warning Card</div>
                                 <div class="card-footer d-flex align-items-center justify-content-between">
                                     <a class="small text-white stretched-link" href="#">View Details</a>
                                     <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-xl-3 col-md-6">
                             <div class="card bg-success text-white mb-4">
                                 <div class="card-body">Success Card</div>
                                 <div class="card-footer d-flex align-items-center justify-content-between">
                                     <a class="small text-white stretched-link" href="#">View Details</a>
                                     <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-xl-3 col-md-6">
                             <div class="card bg-danger text-white mb-4">
                                 <div class="card-body">Danger Card</div>
                                 <div class="card-footer d-flex align-items-center justify-content-between">
                                     <a class="small text-white stretched-link" href="#">View Details</a>
                                     <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-xl-6">
                             <div class="card mb-4 border-0 border-radius-2 shadow">
                                 <div class="card-header d-none">
                                     <i class="fas fa-chart-pie me-1"></i>
                                     Pie Chart Example
                                 </div>
                                 <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas>
                                 </div>

                             </div>
                         </div>
                         <div class="col-xl-6">
                             <div class="card mb-4 border-0 shadow">
                                 <div class="card-header">
                                     <i class="fas fa-chart-area me-1"></i>
                                     Area Chart Example
                                 </div>
                                 <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas>
                                 </div>
                             </div>
                         </div>
                         <div class="col-xl-6 d-none">
                             <div class="card mb-4 border-0 border-radius-2 shadow">
                                 <div class="card-header">
                                     <i class="fas fa-chart-bar me-1"></i>
                                     Bar Chart Example
                                 </div>
                                 <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas>
                                 </div>
                             </div>
                         </div>
                     </div>

                 </div>




                 <!-- create post modal  -->
                 <div class="modal mt-1 fade" id="socialPostModal" tabindex="-1" aria-labelledby="socialPostModalLabel"
                     aria-hidden="true">
                     <div class="modal-dialog modal-fullscreen">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title" id="postComposerModalLabel">New Post</h5>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal"
                                     aria-label="Close"></button>
                             </div>
                             <div class="modal-body">
                                 <div class="row">
                                     <div class="col-lg-3">
                                         <div class="">
                                             <div class="accordion" id="faqAccordion">
                                                 <div class="accordion-item mt-2">
                                                     <h2 class="accordion-header" id="headingTwo">
                                                         <button class="accordion-button bg-light" type="button"
                                                             data-bs-toggle="collapse" data-bs-target="#collapsetwo"
                                                             aria-expanded="true" aria-controls="collapsetwo">
                                                             <h6><i class="bi bi-facebook"></i> Facebook</h6>
                                                         </button>
                                                     </h2>
                                                     <div id="collapsetwo" class="accordion-collapse collapse"
                                                         aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                                         <div class="accordion-body">
                                                             <div>
                                                                 <div id="pageNames"></div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <!-- Additional accordion items can go here -->
                                             </div>
                                         </div>
                                         <div class="Nosocialaccount alert alert-secondary mt-3 text-small"
                                             role="alert">
                                             <p>No social account connected. Please connect an account to post.
                                                 <button class="btn btn-dark text-white mr-sm-2 mb-2 mb-sm-0"
                                                     data-bs-toggle="modal" data-bs-target="#connectAccountsModal">Connect
                                                     Accounts</button>
                                             </p>
                                         </div>
                                     </div>
                                     <div class="col-lg-5" id="createpostsection">
                                         <div class="p-auto" style="padding-top: auto;">
                                             <div class="mb-3">
                                                 <textarea class="form-control" id="postContent" rows="5" placeholder="What's on your mind?"></textarea>
                                             </div>
                                             <div style="padding-bottom: 10px">

                                                 <div class="d-flex align-items-center">
                                                     <i class="fab fa-facebook"></i>
                                                     <label for="facebookCarousel" class="ms-2 me-2">Facebook
                                                         Carousel</label>
                                                     <input type="checkbox" id="facebookCarousel" name="checkbox">
                                                 </div>

                                             </div>
                                             <div class="mb-3">
                                                 <input type="file" id="uploadFile" name="uploadFile" multiple>
                                             </div>
                                             <div id="imagePreview" style="margin-top: 10px; max-height: 100px;"></div>
                                         </div>
                                     </div>
                                 </div>
                                 {{-- <div class="modal-footer">
                                     <button type="button" class="btn btn-secondary"
                                         data-bs-dismiss="modal">Schedule</button>
                                     <button type="button" class="PostNow btn btn-primary" id="postNowButton">Post
                                         Now</button>
                                 </div> --}}

                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-secondary"
                                         id="scheduleButton">Schedule</button>
                                     <button type="button" class="btn btn-secondary" id="closeScheduleButton"
                                         style="display: none;">Close Schedule</button>
                                     <input type="datetime-local" id="scheduleTime" name="scheduleTime"
                                         style="display: none;">
                                     <button type="button" class="PostNow btn btn-primary" id="postNowButton">Post
                                         Now</button>
                                 </div>


                             </div>
                         </div>
                     </div>
                 </div>


             </main>

             <footer class="py-4 bg-light mt-auto">
                 <div class="container-fluid px-4">
                     <div class="d-flex align-items-center justify-content-between small">
                         <div class="text-muted">Copyright &copy; Your Website 2023</div>
                         <div>
                             <a href="#">Privacy Policy</a>
                             &middot;
                             <a href="#">Terms &amp; Conditions</a>
                         </div>
                     </div>
                 </div>
             </footer>
         </div>
     </div>


 @endsection





 @section('scripts')

     <script>
         // Check if Facebook is connected in local storage

         document.getElementById('scheduleButton').addEventListener('click', function() {
             var scheduleInput = document.getElementById('scheduleTime');
             var scheduleButton = document.getElementById('scheduleButton');
             var closeScheduleButton = document.getElementById('closeScheduleButton');

             scheduleInput.style.display = 'block';
             scheduleButton.style.display = 'none';
             closeScheduleButton.style.display = 'block';
         });

         document.getElementById('closeScheduleButton').addEventListener('click', function() {
             var scheduleInput = document.getElementById('scheduleTime');
             var scheduleButton = document.getElementById('scheduleButton');
             var closeScheduleButton = document.getElementById('closeScheduleButton');

             scheduleInput.style.display = 'none';
             scheduleButton.style.display = 'block';
             closeScheduleButton.style.display = 'none';

             // Set scheduleTime to 0 when Close Schedule is clicked
             scheduleInput.value = '0';

         });

         document.getElementById('connectButton').addEventListener('click', function() {
             const inputContainer = document.getElementById('inputContainer');
             const connectButton = document.getElementById('connectButton');
             const submitButton = document.getElementById('submitButton');

             if (inputContainer.style.display === 'none' || inputContainer.style.display === '') {
                 inputContainer.style.display = 'block';
                 connectButton.style.display = 'none';
                 submitButton.style.display = 'inline-block';
             }
         });

         document.getElementById('submitButton').addEventListener('click', function() {
             const inputField = document.getElementById('inputField').value.trim(); // Trim whitespace
             if (inputField === '') {
                 // Show an error message in the toast body
                 const toastEl = document.getElementById('toastMessage');
                 const toast = new bootstrap.Toast(toastEl);
                 toastEl.querySelector('.toast-body').innerText = 'Please enter a value in the input field.';
                 toast.show();
                 return; // Exit the function early
             }

             const apiUrl = '/Get/Token'; // Use relative URL

             axios.post(apiUrl, {
                     token: inputField
                 })
                 .then(response => {
                     console.log('Success:', response.status);
                     console.log('Data:', response.data);
                     if (response.status === 201) {
                         document.getElementById('inputContainer').style.display = 'none';
                         // Show the connected button
                         document.getElementById('connectedButton').style.display = 'inline-block';
                         // Save connection state in local storage
                         localStorage.setItem('facebookConnected', 'true');
                         localStorage.setItem('facebookData', JSON.stringify(response.data));
                         console.log(JSON.parse(localStorage.getItem('facebookData')));

                         // Show toast message
                         const toastEl = document.getElementById('toastMessage');
                         const toast = new bootstrap.Toast(toastEl);
                         toast.show();
                         document.getElementById('disconnectButton').style.display = 'inline-block';
                         Retrievedata();

                     }
                 })
                 .catch(error => {
                     console.error('Error:', error);
                 });
         });

         const isConnected = localStorage.getItem('facebookConnected') === 'true';

         if (isConnected) {
             document.getElementById('connectedButton').style.display = 'inline-block';
             document.getElementById('disconnectButton').style.display = 'inline-block';
             document.getElementById('connectButton').style.display = 'none';

         }

         document.getElementById('connectButton').addEventListener('click', function() {
             const inputContainer = document.getElementById('inputContainer');
             const connectButton = document.getElementById('connectButton');
             const submitButton = document.getElementById('submitButton');

             if (inputContainer.style.display === 'none' || inputContainer.style.display === '') {
                 inputContainer.style.display = 'block';
                 connectButton.style.display = 'none';
                 submitButton.style.display = 'inline-block';
             }
         });
         document.getElementById('disconnectButton').addEventListener('click', function() {
             // Remove connection state from local storage
             // localStorage.removeItem('facebookConnected');
             localStorage.clear();
             const toastEl = document.getElementById('toastMessage');
             const toast = new bootstrap.Toast(toastEl);
             toastEl.querySelector('.toast-body').innerText = 'Facebook details DisConnected successfully  .';
             console.log(JSON.parse(localStorage.getItem('facebookData')));
             toast.show();
             // Hide connected and disconnect buttons
             document.getElementById('connectedButton').style.display = 'none';
             document.getElementById('disconnectButton').style.display = 'none';
             // Show connect button
             document.getElementById('connectButton').style.display = 'inline-block';
             Retrievedata();
         });

         function Retrievedata() {
             // Retrieve data from local storage
             const facebookData = JSON.parse(localStorage.getItem('facebookData'));

             // Check if Facebook data exists and contains a name
             if (facebookData && facebookData.data && facebookData.data.name) {
                 // Update the welcome message with the stored name
                 document.getElementById('welcomeMessage').innerText = `Welcome, ${facebookData.data.name}!`;
                 getfacebookPages();

             } else {
                 // If the data is not found or doesn't contain a name, display a default message
                 document.getElementById('welcomeMessage').innerText = 'Welcome!';
             }

         }

         Retrievedata();
         console.log(JSON.parse(localStorage.getItem('facebookData')));
         let pages;

         function getfacebookPages() {
             // Retrieve data from local storage
             const storedData = JSON.parse(localStorage.getItem('facebookData'));
             console.log(storedData);
             // Access the token and facebook_id from storedData
             const token = storedData.data.token;
             const facebook_id = storedData.data.facebook_id; // Make sure the key matches exactly

             console.log('Facebook ID:', facebook_id);
             console.log('Token:', token);

             // Define the API endpoint
             const apiUrl = '/Get/Pages';

             // Make the Axios request with token and facebook_id included in the headers
             axios.get(apiUrl, {
                     headers: {
                         Authorization: token,
                         facebookid: facebook_id // Assuming 'facebook_id' as the custom header name for Facebook ID
                     }
                 })
                 .then(response => {

                     console.log('Success:', response.data);
                     // Assuming this code block executes when you receive a successful response from the server
                     if (response.status === 200) {
                         pages = response.data.data; // Assuming data is an array of pages
                         console.log('Pages:', pages);
                         const pageNamesHTML = pages.map(page => `
                        <div>
                            <input type="checkbox" name="pageCheckbox" value="${page.id}" id="page_${page.id}">
                            <label for="page_${page.id}">${page.name}</label>
                        </div>
                    `).join('');
                         // Assuming you have a div with id 'pageNames' to display the page names and checkboxes
                         document.getElementById('pageNames').innerHTML = pageNamesHTML;

                         // Hide the 'Nosocialaccount' div
                         document.querySelector('.Nosocialaccount').style.display = 'none';

                         // Add event listener to checkboxes
                         const checkboxes = document.querySelectorAll('input[name="pageCheckbox"]');
                         checkboxes.forEach(checkbox => {
                             checkbox.addEventListener('change', () => {
                                 if (checkbox.checked) {
                                     // Retrieve details of the checked page
                                     const selectedPage = pages.find(page => page.id === checkbox.value);
                                     console.log('Selected page:', selectedPage);
                                     // Perform further actions with the selected page details
                                 }
                             });
                         });
                     } else {
                         // Show the 'Nosocialaccount' div
                         document.querySelector('.Nosocialaccount').style.display = 'block';

                     }
                 })
                 .catch(error => {
                     console.error('Error:', error);
                 });
         }


         function getNeverExpireToken() {

             // Define the API endpoint
             const apiUrl = '/Get/long-lived/Token/Expiration';

             // Make the Axios request with token and facebook_id included in the headers
             axios.post(apiUrl, {
                     short_lived_token: 'EAALJQ4H2L6YBO2pB09fBS5hmMCZCotnVspEfP6CZCzHS3PaOFno4EzGmUjyeWumiu8ZBdEuew0cIiuX9xuUvxzMVj3PpSmAZBlepdVo1gza8wZBWR2FAKBAqHaKYiyZBd2c2JDvJQhg5Tw0aZC5pNmQRwmbUSovto2D1bGfV6jLaHctFvPZCL9H7Gt3UA7lZAWSbzr4mRevw0'
                 })
                 .then(response => {
                     console.log('Success:', response.data);
                     // Handle the response data as needed
                 })
                 .catch(error => {
                     console.error('Error:', error);
                 });
         }


         document.getElementById('uploadFile').addEventListener('change', function(event) {
             const files = event.target.files; // Get all selected files
             const imagePreview = document.getElementById('imagePreview');
             imagePreview.innerHTML = ''; // Clear previous preview images

             for (let i = 0; i < files.length; i++) {
                 const file = files[i];
                 if (file) {
                     const reader = new FileReader();
                     reader.onload = function(e) {
                         const imageUrl = e.target.result;
                         const imageElement = document.createElement('img');
                         imageElement.src = imageUrl;
                         imageElement.classList.add('uploaded-image');
                         imageElement.style.maxHeight = '100px';
                         imageElement.style.margin = '10px';

                         // Add a click event listener to each image element
                         imageElement.addEventListener('click', function() {
                             // Remove the clicked image from the preview container
                             imagePreview.removeChild(imageElement);
                         });

                         imagePreview.appendChild(imageElement); // Append each image to the preview container
                     };
                     reader.readAsDataURL(file);
                 }
             }
         });

         // Add event listener to the 'postNowButton' button
         document.getElementById('postNowButton').addEventListener('click', function() {
             const postContent = document.getElementById('postContent').value;
             const files = document.getElementById('uploadFile').files;
             const facebookCarouselCheckbox = document.getElementById('facebookCarousel');
             var scheduleInput = document.getElementById('scheduleTime');
             let scheduleTime = scheduleInput.value;
             if (!scheduleInput.value) {
                 scheduleTime = '0';
             }


             // Check if the checkbox is checked
             const isFacebookCarouselChecked = facebookCarouselCheckbox.checked;

             // Collecting files
             const formData = new FormData();
             formData.append('message', postContent);
             formData.append('facebook_carousel', isFacebookCarouselChecked ? 'on' : 'off');

             // Add event listener to checkboxes
             const selectedPages = [];

             // Iterate over checkboxes to check if they are checked
             const checkboxes = document.querySelectorAll('input[name="pageCheckbox"]');
             checkboxes.forEach(checkbox => {
                 if (checkbox.checked) {
                     // Retrieve details of the checked page
                     const selectedPage = pages.find(page => page.id === checkbox.value);

                     // Push the selected page details into the selectedPages array
                     selectedPages.push({
                         id: selectedPage.id,
                         name: selectedPage.name
                     });
                 }
             });
             // Check if no page is selected
             if (selectedPages.length === 0) {
                 alert('Please select at least one page.');
                 return; // Exit the function early if no page is selected
             }
             // Append the selectedPages array to FormData
             formData.append('selectedPages', JSON.stringify(selectedPages));

             for (let i = 0; i < files.length; i++) {
                 const file = files[i];
                 formData.append('images[]', file);
             }

             // Debugging: log FormData values
             for (let pair of formData.entries()) {
                 if (pair[0] === 'images[]') {
                     console.log(
                         `${pair[0]} - Name: ${pair[1].name}, Size: ${pair[1].size} bytes, Type: ${pair[1].type}`
                     );
                 } else {
                     console.log(`${pair[0]}: ${pair[1]}`);
                 }
             }
             formData.append('schedule_time', scheduleTime);
             //   the following code to make the Axios POST request
             axios.post('/post/message', formData, {
                     headers: {
                         'Content-Type': 'multipart/form-data'
                     }
                 })
                 .then(response => {
                     console.log('Post successful:', response.data);

                     alert(response.data.message);
                     // Add event listener to the modal button to redirect

                     //  window.location.href = '/';

                     // You can add any success handling here
                 })
                 .catch(error => {
                     console.error('Error posting message:', error);
                     // You can add any error handling here
                 });
         });
     </script>

 @endsection
