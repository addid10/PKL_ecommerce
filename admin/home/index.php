<?php require_once('../layout/token.php'); ?>
<?php if (isset($_SESSION['username_admin'])): ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('../layout/header.php'); ?>
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <?php require_once('../layout/navigation.php'); ?>
            </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <?php require_once('../layout/menu.php'); ?>
                    </nav>
                </div>
            </div>
        </div>
</body>
<?php require_once('../layout/javascript.php'); ?>

</html>
<?php else: ?>
<?php header('location: ../users/login'); ?>
<?php endif; ?>