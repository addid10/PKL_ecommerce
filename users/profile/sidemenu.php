			<?php require_once('url.php'); ?>
			<div class="row">
				<div class="col-md-3">
					<div class="left-sidebar">
						<h2>Profile</h2>
						<div class="col-md-12 panel-group category-products">
							<div class="panel panel-default">
								<h4 class="panel-title">
									<div class="col-md-4">
										<img class="img-radius" src="../assets/images/user/<?php echo $profile->foto;?>">
									</div>
									<div class="col-md-8" style="padding-top:5px;">
										<p style="color:#000">
										<?php if($profile->nama_users==''){
											echo "Tanpa Nama";
										} 
										else{
											echo $profile->nama_users;
										}
										?></p>
										<a href="../profile/akun.php"><i class="fa fa-pencil"></i> Edit Profile</a>
									</div>
								</h4>
							</div>
							<hr>
							<div class="">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="../profile/akun.php" class="<?php if($url=="akun.php"){ echo "active-profile";}?>">
												<span class="badge pull-right"><i class="fa fa-user"></i></span>
												Akun saya
										</a>
									</h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="../profile/change_password.php" class="<?php if($url=="change_password.php"){ echo "active-profile";}?>">
												<span class="badge pull-right"><i class="fa fa-key"></i></span>
												Ganti Password
										</a>
									</h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="../profile" class="<?php if($sub_url=="profile" AND $url==""){ echo "active-profile";}?>">
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
										<a href="../cart" class="<?php if($sub_url=="cart"){ echo "active-profile";}?>">
												<span class="badge pull-right"><i class="fa fa-shopping-cart"></i></span>
												Cart
										</a>
									</h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="../wishlist" class="<?php if($sub_url=="wishlist"){ echo "active-profile";}?>">
												<span class="badge pull-right"><i class="fa fa-heart"></i></span>
												Wishlist
										</a>
									</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>