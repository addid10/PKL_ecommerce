<?php require_once('url.php'); ?>
<div class="col-md-3">
	<?php require_once('../profile/view-profile.php'); ?>
	<h2 class="title text-center">Profile</h2>
	<div class="row mb-5">
		<?php if(!empty($profile->foto)): ?>
		<div class="col-4">
			<img class="img-radius" src="../assets/images/user/<?php echo $profile->foto;?>">
		</div>
		<?php else: ?>
		<div class="col-4">
			<img class="img-radius" src="../assets/images/lain3.png">
		</div>
		<?php endif ?>
		<div class="col-8">
		<?php if(empty($profile->nama_users)): ?>
			<p class="mb-0">Tanpa Nama</p>
		<?php else: ?>
			<p class="mb-0"><?= $profile->nama_users ?></p>
		<?php endif ?>
			<a href="../profile/akun"><i class="fa fa-pencil"></i> Edit Profile</a>
		</div>
	</div>
	<hr>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a href="../profile/akun" class="<?php if($url=="akun"){ echo "active-profile" ;}?>">
					<span class="badge pull-right"><i class="fa fa-user"></i></span>
					Akun saya
				</a>
			</h4>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a href="../profile/change_password" class="<?php if($url=="change_password"){ echo "active-profile" ;}?>">
					<span class="badge pull-right"><i class="fa fa-key"></i></span>
					Ganti Password
				</a>
			</h4>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a href="../profile" class="<?php if($sub_url=="profile" && $url=="" ){ echo "active-profile" ;}?>">
					<span class="badge pull-right"><i class="fa fa-list"></i></span>
					Belanjaan saya
				</a>
			</h4>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a href="#">
					<span class="badge pull-right"><i class="fa fa-bell"></i></span>
					Notifikasi
				</a>
			</h4>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a href="../cart" class="<?php if($sub_url=="cart"){ echo "active-profile" ;}?>">
					<span class="badge pull-right"><i class="fa fa-shopping-cart"></i></span>
					Cart
				</a>
			</h4>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a href="../wishlist" class="<?php if($sub_url=="wishlist"){ echo "active-profile" ;}?>">
					<span class="badge pull-right"><i class="fa fa-heart"></i></span>
					Wishlist
				</a>
			</h4>
		</div>
	</div>
</div>