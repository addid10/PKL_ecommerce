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
			<div class="row">
				<div class="col-md-3">
					<div class="left-sidebar">
						<h2>Profile</h2>
						<div class="col-md-12 panel-group category-products">
							<div class="panel panel-default">
								<h4 class="panel-title">
									<div class="col-md-4">
										<img class="img-radius" src="../assets/images/user/default.jpg">
									</div>
									<div class="col-md-8" style="padding-top:5px;">
										<p style="color:#000">Atalie H. Larisa</p>
										<a href=""><i class="fa fa-pencil"></i> Edit Profile</a>
									</div>
								</h4>
							</div>
							<hr>
							<div class="">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#">
												<span class="badge pull-right"><i class="fa fa-user"></i></span>
												Akun saya
										</a>
									</h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#">
												<span class="badge pull-right"><i class="fa fa-list"></i></span>
												Belanjaan saya
										</a>
									</h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#" class="active-profile">
												<span class="badge pull-right"><i class="fa fa-bell"></i></span>
												Notifikasi
										</a>
									</h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#">
												<span class="badge pull-right"><i class="fa fa-shopping-cart"></i></span>
												Cart
										</a>
									</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Detail Profile -->
			<div class="col-md-9">
				<div class="left-sidebar">
					<h2 class="title text-center">Detail Profile</h2>
						<div class="col-md-12 panel-group category-products">
							<div class="panel panel-default">
								<div class="col-sm-8">
									<div class="contact-form">
										<form id="contactForm" class="contact-form row" method="POST">
											<div class="form-group col-md-3">
												<label class="pull-right">Nama</label>
											</div>
											<div class="form-group col-md-9">
												<input type="text" id="subjek" name="subjek" class="form-control" required="required" placeholder="Subject" maxlength="30">
											</div>
											<div class="form-group col-md-3">
												<label class="pull-right">Username</label>
											</div>
											<div class="form-group col-md-9">
												<div class="col-md-5">
													<p class="user-name">atalie</p>
												</div>
											</div>
											<div class="form-group col-md-3">
												<label class="pull-right">Email</label>
											</div>
											<div class="form-group col-md-9">
												<div class="col-md-5">
													<p>mukadua@gmail.com</p>
												</div>
												<div class="col-md-3">
													<a><u>Ubah</u></a>
												</div>
											</div>
											<div class="form-group col-md-3">
												<label class="pull-right">Alamat</label>
											</div>
											<div class="form-group col-md-9">
												 <textarea name="alamat" required="required" class="form-control" rows="8" placeholder="Alamat"></textarea>
											</div> 
											<div class="form-group col-md-3">
												<label class="pull-right">Jenis Kelamin</label>
											</div>
											<div class="form-group col-md-9">
												<label class="radio-inline"><input type="radio" value="L">Laki-laki</label>
												<label class="radio-inline"><input type="radio" value="P">Perempuan</label>
											</div>                          
											<div class="form-group col-md-12">
												<input type="submit" class="btn btn-primary pull-right" value="Submit"> 
											</div>
										</form>
									</div>
								</div>
								<div class="col-md-4">
									<div class="col-md-12">
										<img class="img-radius-profile" src="../assets/images/user/default.jpg">
									</div>
									<div class="col-md-12" style="padding:20px;text-align:center;color:#b0b0b0">
										<p>Ukuran maks. 1 MB<br>Format .PNG, .JPEG, .JPG</p>
										<input id="file-upload" type="file"/>
									</div>
								</div>
							</div>
						</div>
				</div>	
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<?php require_once('../layout/footer.php');?>	
	</footer><!--/Footer-->
	
  
<?php require_once('../layout/javascript.php');?>
<script src="contact.js"></script>
<?php require_once('../layout/cs_javascript.php');?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>