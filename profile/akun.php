<?php require_once('../layout/token.php'); ?>
<?php if(isset($_SESSION['username_member'])):?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>My Profile - LainLain</title>
	<?php require_once('../layout/head.php');?>
</head>

<body>
	<header id="header">
		<?php require_once('../layout/header.php'); ?>
	</header>
	<div class="space-header"></div>
	<section>
		<div class="container">
			<div class="row">
				<?php require_once('sidemenu.php'); ?>
				<div class="col-md-9">
					<h2 class="title text-center">Detail Profile</h2>
					<div class="left-sidebar">
						<form id="profile-form" class="contact-form row">
							<div class="panel-group category-products">
								<div class="row panel panel-default">
									<div class="col-md-8">
										<div class="contact-form row ml-3">
											<div class="form-group col-md-3">
												<label class="">Nama</label>
											</div>
											<div class="form-group col-md-9">
												<input type="text" id="nama" name="nama" value="<?php echo $profile->nama_users; ?>" class="form-control"
												 required="required" placeholder="Isi nama anda.." maxlength="30">
											</div>
											<div class="form-group col-md-3">
												<label class="">Username</label>
											</div>
											<div class="form-group col-md-9">
												<input type="text" value="<?php echo $_SESSION['username_member']; ?>" class="form-control" disabled>
											</div>
											<div class="form-group col-md-3">
												<label class="">Email</label>
											</div>
											<div class="form-group col-md-9">
												<input type="text" value="<?php echo $profile->email; ?>" class="form-control" disabled>
											</div>
											<div class="form-group col-md-3">
												<label class="">Telepon</label>
											</div>
											<div class="form-group col-md-9">
												<input type="text" name="telepon" id="telepon" value="<?php echo $profile->telepon; ?>" class="form-control"
												 placeholder="Isi telepon anda.." required>
											</div>
											<div class="form-group col-md-3">
												<label class="">Kode Pos</label>
											</div>
											<div class="form-group col-md-9">
												<input type="text" name="kodepos" id="kodepos" value="<?php echo $profile->kode_pos; ?>" class="form-control"
												 placeholder="Cantumkan kode pos anda.." required>
											</div>
											<div class="form-group col-md-3">
												<label class="">Alamat</label>
											</div>
											<div class="form-group col-md-9">
												<textarea name="alamat" id="alamat" class="form-control" rows="4" placeholder="Isi alamat anda.." required><?php echo $profile->alamat;?></textarea>
											</div>
											<div class="form-group col-md-3">
												<label class="">Jenis Kelamin</label>
											</div>
											<div class="form-group col-md-9">
												<label class="radio-inline"><input type="radio" name="gender" value="L" <?php if($profile->jenis_kelamin=="L"){
													echo "checked"; }?>>Laki-laki</label>
												<label class="radio-inline"><input type="radio" name="gender" value="P" <?php if($profile->jenis_kelamin=="P"){
													echo "checked"; }?>>Perempuan</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="row">
											<div class="col-md-12">
												<?php if(!empty($profile->foto)): ?>
												<img class="img-radius-profile" src="../assets/images/user/<?php echo $profile->foto;?>">
												<?php else: ?>
												<img class="img-radius-profile" src="../assets/images/lain3.png">
												<?php endif ?>
											</div>
											<div class="col-md-12" style="">
												<p class="pt-2 text-center">Ukuran maks. 1 MB<br>Format .PNG, .JPEG, .JPG</p>
												<input id="foto" type="file" name="foto">
												<input type="hidden" name="hidden_foto" value="<?php echo $profile->foto;?>">
											</div>
										</div>
									</div>

									<div class="form-group col-md-12">
                               			<input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>" required>
										<input type="hidden" name="id" value="<?php echo $profile->id;?>">
										<input type="submit" class="btn btn-primary btn-length" value="Submit">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<footer id="footer">
		<!--Footer-->
		<?php require_once('../layout/footer.php');?>
	</footer>
	<!--/Footer-->

	<?php require_once('../layout/modal.php'); ?>
	<?php require_once('../layout/javascript.php');?>
	<script src="profile.js"></script>
</body>

</html>
<?php else: ?>
<?php header('location: ../users/login.php'); ?>
<?php endif ?>