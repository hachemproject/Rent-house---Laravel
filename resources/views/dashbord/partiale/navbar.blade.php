<nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white"
id="sidenavAccordion">
<!-- Sidenav Toggle Button-->
<button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i
        data-feather="menu"></i></button>
<!-- Navbar Brand-->
<div class="nav-logo d-flex align-items-center flex-column">
    <i class="uil uil-estate text-primary" style="font-size: 2rem"></i>
    <a class="navbar-brand me-0" href="#" style="margin-top: -0.9rem">Dre<span
            class="text-primary fw-bold">a</span>m
        <span class="text-primary fw-bold">Home</span></a>
</div>


<!-- * * Tip * * You can use text or an image for your navbar brand.-->
<!-- * * * * * * When using an image, we recommend the SVG format.-->
<!-- * * * * * * Dimensions: Maximum height: 32px, maximum width: 240px-->
<!-- Navbar Search Input-->
<!-- * * Note: * * Visible only on and above the lg breakpoint-->

<!-- Navbar Items-->
<ul class="navbar-nav align-items-center ms-auto">
    <!-- Documentation Dropdown-->
    
    <!-- Navbar Search Dropdown-->
    <!-- * * Note: * * Visible only below the lg breakpoint-->
    
    <!-- Alerts Dropdown-->
    
    <!-- Messages Dropdown-->
   
    <!-- User Dropdown-->
    <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
        <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage"
            href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false"><img class="img-fluid"
                src="/dashbord/assets/img/illustrations/profiles/profile-1.png" /></a>
        <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up"
            aria-labelledby="navbarDropdownUserImage">
            <h6 class="dropdown-header d-flex align-items-center">
                <img class="dropdown-user-img" src="dashbord/assets/img/illustrations/profiles/profile-1.png" />
                <div class="dropdown-user-details">
                    <div class="dropdown-user-details-name">{{ Auth::user()->name }}</div>
  
                </div>
            </h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('profile.edit') }}" >
                <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                Account
            </a>

                <form method="POST" action="{{ route('logout') }}" >
                    @csrf
                    <li>                                            
                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); this.closest('form').submit();"class="dropdown-item">
                        <div class="dropdown-item-icon"><i data-feather="settings"></i></div> Logout
                        </a>
                    </li>
                 </form>  


        </div>
    </li>
</ul>
</nav>

