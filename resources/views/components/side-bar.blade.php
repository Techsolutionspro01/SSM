<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="index.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                    data-bs-target="#composeCollapse" aria-expanded="false" aria-controls="composeCollapse">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Compose
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="composeCollapse" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#socialPostModal"
                            data-bs-whatever="@getbootstrap">Create
                            Post</a>
                        <a class="nav-link " href="#" data-bs-toggle="modal"
                            data-bs-target="#blogPostModal">Blog Post</a>

                        <a class="nav-link" href="#">Automations</a>
                    </nav>
                </div>
                <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" data-bs-whatever="@mdo">Open modal for @mdo</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" data-bs-whatever="@fat">Open modal for @fat</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Open modal for
                        @getbootstrap</button> -->

                <!-- layout start  -->
                <a class="nav-link collapsed d-none" href="#" data-bs-toggle="collapse"
                    data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Layouts
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse d-none" id="collapseLayouts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="layout-static.html">Static Navigation</a>
                        <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                    </nav>
                </div>
                <!-- end layout  -->
                <a class="nav-link" href="./planner.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-calendar"></i></div>
                    Planner
                </a>
                <a class="nav-link" href="./analyzer.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Analyzer
                </a>
                <a class="nav-link" href="./Inbox.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-message"></i></div>
                    Inbox
                </a>
                <!-- start discover -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                    data-bs-target="#discoverCollapse" aria-expanded="false" aria-controls="discoverCollapse">
                    <div class="sb-nav-link-icon"><i class="fas fa-map"></i></div>
                    Discover
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="discoverCollapse" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="#">Content Feed</a>
                        <a class="nav-link" href="#">Influencer</a>
                    </nav>
                </div>
                <!-- end discover  -->

                <a class="nav-link" href="./mediaCollection.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-message"></i></div>
                    Media Library
                </a>
                <!-- Authentication pages  -->
                <a class="nav-link collapsed d-none" href="#" data-bs-toggle="collapse"
                    data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse d-none" id="collapsePages" aria-labelledby="headingTwo"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                            aria-controls="pagesCollapseAuth">
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="login.html">Login</a>
                                <a class="nav-link" href="register.html">Register</a>
                                <a class="nav-link" href="password.html">Forgot Password</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#pagesCollapseError" aria-expanded="false"
                            aria-controls="pagesCollapseError">
                            Error
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="401.html">401 Page</a>
                                <a class="nav-link" href="404.html">404 Page</a>
                                <a class="nav-link" href="500.html">500 Page</a>
                            </nav>
                        </div>
                    </nav>
                </div>
                <!-- end Authentication pages  -->

                <!-- start addons  -->
                <div class="sb-sidenav-menu-heading d-none">Addons</div>
                <a class="nav-link d-none" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Charts
                </a>
                <a class="nav-link d-none" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a>
                <!-- end addons  -->
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in: <b>TechSolutions </b></div>

        </div>
    </nav>
</div>