<?php if(isset($_SESSION['username_member'])): ?>
<?php require_once('../profile/view-profile.php'); ?>
<h2>Profile</h2>
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
		<p class="mb-0">
			<?= $profile->nama_users ?>
		</p>
		<?php endif ?>
		<a href="../profile/akun"><i class="fa fa-pencil"></i> Edit Profile</a>
	</div>
</div>
<?php endif?>
<h2>Category</h2>
<div class="panel-group category-products" id="accordian">
	<div class="panel panel-default">
		<div class="panel-heading pt-0">
			<h4 class="panel-title  mb-0">
				<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
					<span class="p-2 badge pull-right"><i class="fa fa-plus"></i></span>
					HVS
				</a>
			</h4>
		</div>
		<div id="sportswear" class="panel-collapse collapse">
			<div class="panel-body">
				<ul>
					<li><a href="#">Mirage </a></li>
					<li><a href="#">KIKY </a></li>
					<li><a href="#">SIDU </a></li>
					<li><a href="#">EPAPER </a></li>
					<li><a href="#">COPY PAPER </a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading pt-0">
			<h4 class="panel-title"><a href="#">Buku Tulis</a></h4>
		</div>
	</div>
</div>