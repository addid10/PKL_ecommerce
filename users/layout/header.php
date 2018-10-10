    <!--<div class="header_top">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +6282255999499</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> rezkynewaditya@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-github"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="logo pull-left collapse navbar-collapse">
							<a href="../home"><img src="../assets/images/home/logo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="search_box pull-right collapse navbar-collapse">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="mainmenu pull-right">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="../home" class="active">Home</a></li>
								<li><a href="../contact-us">Contact</a></li>
								<?php if(isset($_SESSION['_username'])): ?>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
										<li><a href="../chec">Pembelian</a></li> 
										<li><a href="../cart">Cart</a></li> 
										<li><a href="../wishlist">Wishlist</a></li> 
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#"><i class="fa fa-user"></i>  <?php echo $_SESSION['_username'];?><i class="fa fa-angle-down"></i></a>
									<ul role="menu" class="sub-menu">
										<li><a href="../profile">Profile</a></li>
										<li><a href="#" id="log">Logout</a></li>
                                    </ul>								
								</li> 
								<form id="out" method="POST" action="../users/logout.php">
											<input type="hidden" name="logout">
								</form>
								<?php else: ?>
								<li><a href="../users/login.php"><i class="fa fa-lock"></i> Login</a></li>
								<?php endif ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->