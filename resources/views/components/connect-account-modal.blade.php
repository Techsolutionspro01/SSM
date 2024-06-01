  <!-- The Modal change connectAccountModal-->
  <div class="modal fade" id="connectAccountsModal">
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
                      <div class="col-lg-5 p-4">
                          <div class="text">
                              <h3>Welcome to [SSM Name]</h3>
                              <h1 class="mt-5">
                                  Connect Your Social Networks To Manage
                              </h1>
                              <p>To get started, please begin by connecting your social
                                  accounts.</p>
                          </div>

                      </div>

                      <div class="col-lg-7">
                          <div class="social-account-connect">

                              <div class="d-flex justify-content-between bg-light p-3 mb-3">
                                  <div class="d-flex align-items-center">
                                      <i class="mdi mdi-facebook btn-icon-append"></i>
                                      <p class="mb-0 ml-2">Facebook (Pages & Groups)</p>
                                  </div>
                                  <div>
                                      <button class="btn btn-sm btn-outline-dark" id="connectButton">Connect</button>
                                      <button class="btn btn-sm btn-outline-dark" id="disconnectButton"
                                          style="display: none;">DisConnect</button>
                                      <button class="btn btn-sm btn-success" id="connectedButton"
                                          style="display: none;">Connected</button>

                                  </div>
                              </div>
                              <div class="input-container" id="inputContainer" style="display: none; margin-top: 10px;">
                                  <input type="text" class="form-control mb-2" id="inputField"
                                      placeholder="Enter details" required>
                                  <button class="btn btn-primary btn-sm" id="submitButton"
                                      style="display: none;">Submit</button>
                              </div>

                              <!-- Toast HTML -->
                              <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
                                  <div id="toastMessage" class="toast" role="alert" aria-live="assertive"
                                      aria-atomic="true">
                                      <div class="toast-header">
                                          <strong class="me-auto">Notification</strong>
                                          <button type="button" class="btn-close" data-bs-dismiss="toast"
                                              aria-label="Close"></button>
                                      </div>
                                      <div class="toast-body">
                                          Facebook details saved successfully
                                      </div>
                                  </div>
                              </div>




                         


                              <div class="d-flex justify-content-between bg-light p-3 mb-3">
                                  <div class="d-flex align-items-center">
                                      <i class="mdi mdi-instagram"></i>
                                      <p class="mb-0 ml-2">Instagram (Business)</p>
                                  </div>
                                  <div>
                                      <button class="btn btn-sm btn-outline-dark">Connect</button>
                                  </div>
                              </div>
                              <div class="d-flex justify-content-between bg-light p-3 mb-3">
                                  <div class="d-flex align-items-center">
                                      <i class="mdi mdi-twitter"></i>
                                      <p class="mb-0 ml-2">Twitter (Profiles)</p>
                                  </div>
                                  <div>
                                      <button class="btn btn-sm btn-outline-dark">Connect</button>
                                  </div>
                              </div>
                              <div class="d-flex justify-content-between bg-light p-3 mb-3">
                                  <div class="d-flex align-items-center">
                                      <i class="mdi mdi-linkedin"></i>
                                      <p class="mb-0 ml-2">LinkedIn (Profiles & Pages)</p>
                                  </div>
                                  <div>
                                      <button class="btn btn-sm btn-outline-dark">Connect</button>
                                  </div>
                              </div>
                              <div class="d-flex justify-content-between bg-light p-3 mb-3">
                                  <div class="d-flex align-items-center">
                                      <i class="mdi mdi-youtube"></i>
                                      <p class="mb-0 ml-2">YouTube (Channels)</p>
                                  </div>
                                  <div>
                                      <button class="btn btn-sm btn-outline-dark">Connect</button>
                                  </div>
                              </div>
                              <div class="d-flex justify-content-between bg-light p-3 mb-3">
                                  <div class="d-flex align-items-center">
                                      <i class="mdi mdi-circle"></i>
                                      <p class="mb-0 ml-2">TikTok (Personal & Business)
                                      </p>
                                  </div>
                                  <div>
                                      <button class="btn btn-sm btn-outline-dark">Connect</button>
                                  </div>
                              </div>
                          </div>
                      </div>

                  </div>
              </div>

              <!-- Modal  close -->
              <div class="d-flex justify-content-center align-items-center mt-5 mb-5 ">
                  <button type="button" class="btn btn-sm btn-dark px-5" data-bs-dismiss="modal">Close</button>
              </div>

          </div>
      </div>
  </div>

