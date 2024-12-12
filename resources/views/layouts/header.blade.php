<style>
    .bg-hospital-blue img {
        display: block;
        height: 60px;
        margin: 5 auto; /* Center the image */
        max-width: 100%; /* Adjust the image size */
    }

    /* Increase z-index to make it appear on top */
    .topbar {
        z-index: 9999;
        /* Add other styles as needed */
    }
</style>
<div class="topbar" style="z-index: 1000;">
    
    <nav class="navbar-custom">
        <ul class="navbar-right d-flex list-inline float-right mb-0">
            <!-- Users Dropdown in a Card -->
            <?php
            $currentUser = Auth::user();

            if ($currentUser && $currentUser->name === "Admin"): ?>
                <li class="dropdown notification-list">
                    <div class="dropdown-toggle nav-link waves-effect">
                        <a href="/users">
                            <i class="ti-forms"></i> Users
                        </a>
                    </div>
                </li>
            <?php endif; ?>

            <!-- Full Screen -->
            <li class="dropdown notification-list d-none d-md-block">
                <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                    <i class="mdi mdi-fullscreen noti-icon"></i>
                </a>
            </li>

            <!-- User Profile Dropdown -->
            <li class="dropdown notification-list">
                <div class="dropdown notification-list nav-pro-img">
                    <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fas fa-user user-icon"></i> {{ Auth::user()->username }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="mdi mdi-power text-danger"></i> {{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </li>
        </ul>

        <ul class="list-inline menu-left mb-0" style="padding-left: 10px;">
            <li class="float-left">
                <a href="/nutritionforms" class="logo">
                <span>
                <!-- <div class="bg-hospital-blue">
                    <img src="{{ secure_asset('assets/images/en.png') }}" alt="enCODE Logo">
                </div> -->
                <div class="bg-hospital-blue">
                    <img src="{{ asset('assets/images/NutriConnect.png') }}" alt="enCODE Logo">
                </div>
                    <!-- <h1 style="color: blue;">ERE</h1> -->
                </span>
                </a>
            </li>
        </ul>
    </nav>

    <script>
        // Assuming that $currentUser is a PHP variable, you can pass its value to a JavaScript variable like this
        var currentUser = <?php echo json_encode($currentUser); ?>;
        console.log("currentUser:", currentUser);
    </script>
</div>
