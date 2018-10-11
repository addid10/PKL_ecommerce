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
					<form id="profileForm" class="contact-form row" enctype="multipart/form-data">
						<h2 class="title text-center">Detail Profile</h2>
						<?php
						if(isset($_GET['status'])){
                            $status = $_GET['status'];
                            echo '<div class="alert alert-success">
                                        <strong>'.$status.'</strong>
                                  </div>';
						}
						?>
						<div class="col-md-12 panel-group category-products">
							<div class="panel panel-default">
								<div class="col-sm-8">
									<div class="contact-form">
										<div class="form-group col-md-3">
											<label class="pull-left">Nama</label>
										</div>
										<div class="form-group col-md-9">
											<input type="text" id="nama" name="nama" value="<?php echo $profile->nama_users; ?>" class="form-control" required="required" placeholder="Isi nama anda.." maxlength="30">
										</div>
										<div class="form-group col-md-3">
											<label class="pull-left">Username</label>
										</div>
										<div class="form-group col-md-9">
											<input type="text" value="<?php echo $_SESSION['_username']; ?>" class="form-control" disabled>
										</div>
										<div class="form-group col-md-3">
											<label class="pull-left">Email</label>
										</div>
										<div class="form-group col-md-7">
											<input type="text" value="<?php echo $profile->email; ?>" class="form-control" disabled>
										</div>
										<div class="col-md-2">
											<button class="btn btn-warning" data-toggle="modal" data-target="#editEmail">Ubah</button>
										</div>
										<div class="form-group col-md-3">
											<label class="pull-left">Telepon</label>
										</div>
										<div class="form-group col-md-9">
											<input type="text" name="telepon" id="telepon" value="<?php echo $profile->telepon; ?>" class="form-control" placeholder="Isi telepon anda..">
										</div>
										<div class="form-group col-md-3">
												<label class="pull-left">Alamat</label>
										</div>
										<div class="form-group col-md-9">
												 <textarea name="alamat" id="alamat" required="required" class="form-control" rows="8" placeholder="Isi alamat anda.."><?php echo $profile->alamat;?></textarea>
										</div> 
										<div class="form-group col-md-3">
												<label class="pull-left">Jenis Kelamin</label>
										</div>
										<div class="form-group col-md-9">
												<label class="radio-inline"><input type="radio" name="gender" value="L" <?php if($profile->jenis_kelamin=="L"){ echo "checked"; }?>>Laki-laki</label>
												<label class="radio-inline"><input type="radio" name="gender" value="P" <?php if($profile->jenis_kelamin=="P"){ echo "checked"; }?>>Perempuan</label>
										</div>    
									</div>
								</div>
								<div class="col-md-4">
									<div class="col-md-12">
										<img class="img-radius-profile" src="../assets/images/user/<?php echo $profile->foto;?>">
									</div>
									<div class="col-md-12" style="padding:20px;text-align:center;color:#b0b0b0">
										<p>Ukuran maks. 1 MB<br>Format .PNG, .JPEG, .JPG</p>
										<input id="foto" type="file" name="foto"/>
										<input type="hidden" name="hidden_foto" value="<?php echo $profile->foto;?>">
									</div>
								</div>
								                      
								<div class="form-group col-md-12">
									<input type="hidden" name="id" value="<?php echo $profile->id_users;?>">
									<input type="submit" class="btn btn-primary pull-right btn-length" value="Submit"> 
								</div>
							</div>
						</div>
					</form>
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