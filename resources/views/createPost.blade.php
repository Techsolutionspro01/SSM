@extends('layouts.main')

@section('title', 'Welcome')

@section('content')
<div class="col-lg-12" style="padding-left: 30px; padding-right: 30px;">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="postComposerModalLabel">New Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-3">
                        <div>
                            <div class="accordion" id="faqAccordion">
                                <div class="accordion-item mt-2">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button bg-light" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapsetwo" aria-expanded="true"
                                            aria-controls="collapsetwo">
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
                                <!-- Uncomment and repeat for other options -->
                                <!--
                                <div class="accordion-item mt-2">
                                    <h2 class="accordion-header" id="headingfour">
                                        <button class="accordion-button bg-light" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapsefour"
                                            aria-expanded="true" aria-controls="collapsefour">
                                            <h6><i class="bi bi-instagram"></i> Instagram</h6>
                                        </button>
                                    </h2>
                                    <div id="collapsefour" class="accordion-collapse collapse"
                                        aria-labelledby="headingfour" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            <div>
                                                <p>account1</p>
                                                <p>account2</p>
                                                <p>account3</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                -->
                            </div>
                            <div class="Nosocialaccount alert alert-secondary mt-3 text-small" role="alert">
                                <p>No social account connected. Please connect an account to post.
                                    <button class="btn btn-dark text-white mr-sm-2 mb-2 mb-sm-0" data-bs-toggle="modal"
                                        data-bs-target="#connectAccountsModal">Connect Accounts</button>
                                </p>
                            </div>
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
                                    <label for="facebookCarousel" class="ms-2 me-2">Facebook Carousel</label>
                                    <input type="checkbox" id="facebookCarousel" name="checkbox">
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="file" id="uploadFile" name="uploadFile" multiple>
                            </div>
                            <div id="imagePreview" style="margin-top: 10px; max-height: 100px; display: flex; flex-wrap: wrap;"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Schedule</button>
                    <button type="button" class="btn btn-primary">Post Now</button>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection





@section('scripts')
    <script>
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
    </script>
@endSection
