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
	
		<nav class="navbar navbar-commerce"><!--header-bottom-->
			<div class="container-fluid">
					<div class="col-sm-2">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="../home"><img src="../assets/images/home/logo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="search_box collapse navbar-collapse">
						<form id="search" action="../search/" method="GET">
							<input type="text" name="q" placeholder="Search"/>
						</form>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="collapse navbar-collapse navbar-right">
							<ul class="nav navbar-nav">
								<li><a href="../home" class="active">Home</a></li>
								<li><a href="../contact-us">Contact</a></li>
								<?php if(isset($_SESSION['_username'])): ?>
								<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#">Shop <img src="../assets/images/angle-down.png" width="10px"></a>
									<ul class="dropdown-menu">
										<li><a href="../profile"><i class="glyphicon glyphicon-list-alt"></i> Pembelian</a></li> 
										<li><a href="../cart"><i class="glyphicon glyphicon-shopping-cart"></i> Cart</a></li> 
										<li><a href="../wishlist"><i class="glyphicon glyphicon-heart"></i> Wishlist</a></li> 
									</ul>
                                </li> 
								<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user"></i>  <?php echo $_SESSION['_username'];?> <img src="../assets/images/angle-down.png" width="10px"></a>
									<ul class="dropdown-menu">
										<li><a href="../profile"><i class="glyphicon glyphicon-user"></i> Profile</a></li>
										<li><a href="#" id="log"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
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
					<div class="col-sm-1 collapse navbar-collapse">
						<div id="cart-quantity">
							<span class="quantity fa-stack fa-2x has-badge" data-count="4">
								<a href="../cart"><i class="fa fa-shopping-cart fa-stack-1x"></i></a>
							</span>
						</div>
					</div>
			</div>
		</nav><!--/header-bottom-->