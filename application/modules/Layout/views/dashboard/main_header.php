<header class="main-header">
    <!-- Logo -->
    <a href="<?= site_url('Dashboard')?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs"><?= $this->session->userdata('refUserNamaAsli') ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">
                                <i class="text-aqua"></i>Profile
                            </a>
                        </li>
                        <li>
                            <a id="confirm_logout" href="#">
                                <i class="text-aqua"></i> Sign out
                            </a>
                        </li>
                       
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>