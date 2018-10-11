<?php session_start(); ?>
<?php if(isset($_SESSION['_username'])):?>
<?php require_once('view-profile.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once('../layout/head.php');?>
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<?php require_once('../layout/header.php'); ?>
	</header><!--/header-->
	<div class="space-header"></div>
	<section>
		<div class="container">
			<?php require_once('sidemenu.php'); ?>
			<!-- Detail Profile -->
			<div class="col-md-9">
				<div class="left-sidebar">
					<h2>Dynamic Tabs</h2>
					<ul class="nav nav-tabs">
						<li class="active tab-profile"><a data-toggle="tab" href="#menu0">Belum dibayar</a></li>
						<li class="tab-profile"><a data-toggle="tab" href="#menu1">Belum dikirimkan</a></li>
						<li class="tab-profile"><a data-toggle="tab" href="#menu2">Belum diterima</a></li>
						<li class="tab-profile"><a data-toggle="tab" href="#menu3">Selesai</a></li>
						<li class="tab-profile"><a data-toggle="tab" href="#menu4">Batal</a></li>
					</ul>

					<div class="tab-content">
						<div id="menu0" class="tab-pane fade in active">
							<h3>Belum dibayar</h3>
						</div>
						<div id="menu1" class="tab-pane fade">
							<h3>Belum dikirimkan</h3>
						</div>
						<div id="menu2" class="tab-pane fade">
							<h3>Belum diterima</h3>
						</div>
						<div id="menu3" class="tab-pane fade">
							<h3>Selesai</h3>
						</div>
						<div id="menu4" class="tab-pane fade">
							<h3>Batal</h3>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<?php require_once('../layout/footer.php');?>	
	</footer><!--/Footer-->
	
<?php require_once('../layout/modal.php'); ?>
<?php require_once('../layout/javascript.php');?>
<script src="profile.js"></script>
<?php require_once('../layout/cs_javascript.php');?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>
<?php else: ?>
<?php header('location: ../users/login.php'); ?>
<?php endif ?>