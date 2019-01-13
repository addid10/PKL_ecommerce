<div class="navbar-wrapper">
    <div class="navbar-logo">
        <a class="mobile-menu" id="mobile-collapse" href="#!">
            <i class="ti-menu"></i>
        </a>
        <div class="mobile-search">
            <div class="header-search">
                <div class="main-search morphsearch-search">
                    <div class="input-group">
                        <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                        <input type="text" class="form-control" placeholder="Enter Keyword">
                        <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <a href="#">
            <img class="img-fluid" src="../assets/images/lain.png" style="width:35px" alt="Theme-Logo" />
        </a>
        <a class="mobile-options">
            <i class="ti-more"></i>
        </a>
    </div>

    <div class="navbar-container container-fluid">
        <ul class="nav-left">
            <li>
                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
            </li>
            <li>
                <a href="#!" onclick="javascript:toggleFullScreen()">
                    <i class="ti-fullscreen"></i>
                </a>
            </li>
        </ul>
        <ul class="nav-right">
            <li class="header-notification">
                <a href="#">
                    <i class="ti-bell"></i>
                    <span class="badge bg-c-pink"></span>
                </a>
                <ul class="show-notification">
                    <li>
                        <h6>Notifications</h6>
                        <label class="label label-danger">New</label>
                    </li>
                    <li>
                        <div class="media">
                            <?php require_once('function.php'); echo get_notification();?>
                        </div>
                    </li>
                </ul>
            </li>

            <li class="user-profile header-notification">
                <a href="#!">
                    <img src="../assets/images/lain.png">
                    <span>
                        <?= $_SESSION['username_admin'] ?></span>
                    <i class="ti-angle-down"></i>
                </a>
                <ul class="show-notification profile-notification">
                    <li>
                        <a href="../users/logout">
                            <i class="ti-layout-sidebar-left"></i> Logout
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>