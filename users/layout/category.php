						<?php if(isset($_SESSION['_username'])): ?>
						<h2>Profile</h2>
						<div class="panel-group category-products">
							<div class="panel panel-default">
								<h4 class="panel-title">
									<div class="col-md-4">
										<img class="img-radius" src="../assets/images/user/<?php echo $profile->foto;?>">
									</div>
									<div class="col-md-8" style="padding-top:5px;">
										<p style="color:#000">
										<?php if($profile->nama_users==''){
											echo "Anonymous";
										} 
										else{
											echo $profile->nama_users;
										}
										?></p>
										
										<input type="hidden" id="hiddenUser" value="<?=$profile->id;?>">
										<a href="../profile/akun.php"><i class="fa fa-pencil"></i> Edit Profile</a>
									</div>
								</h4>
							</div>
						</div>
						<?php endif?>
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
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
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Continuous Form
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
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
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#womens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Karton
										</a>
									</h4>
								</div>
								<div id="womens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Fendi</a></li>
											<li><a href="#">Guess</a></li>
											<li><a href="#">Valentino</a></li>
											<li><a href="#">Dior</a></li>
											<li><a href="#">Versace</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Buku Tulis</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Buku Gambar</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Folio</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">NOTA</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Kwitansi</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">ATK</a></h4>
								</div>
							</div>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#"> <span class="pull-right">(50)</span>Mirage</a></li>
									<li><a href="#"> <span class="pull-right">(56)</span>KIKY</a></li>
									<li><a href="#"> <span class="pull-right">(27)</span>SIDU</a></li>
									<li><a href="#"> <span class="pull-right">(32)</span>GOLD PAPER</a></li>
									<li><a href="#"> <span class="pull-right">(5)</span>STABILO</a></li>
									<li><a href="#"> <span class="pull-right">(9)</span>EPAPER</a></li>
									<li><a href="#"> <span class="pull-right">(4)</span>COPY PAPER</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->