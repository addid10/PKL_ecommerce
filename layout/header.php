
<div class="header_top" id="alert-top">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="contactinfo">
					<ul class="nav nav-pills">
						<li><a href="#"><i class="fa fa-warning"></i> Silahkan lengkapi profile anda untuk mempermudah transaksi!</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<nav class="navbar navbar-expand-lg navbar-light light-bg">
	<div class="container">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggler">
		<span class="navbar-toggler-icon" style="color:#000"></span>
		<i class="fa fa-toggle-on" style="color:#000"></i>
	</button>
	<div class="collapse navbar-collapse" id="navbar-toggler">
		<a href="../home"><img src="../assets/images/lain.png" style="width:150px" alt="" /></a>
		<ul class="navbar-nav ml-auto mt-2 mt-lg-0 mr-5">
			<li class="nav-item">
				<a class="nav-link" href="../home">Home</a>
			</li>
			<?php if(isset($_SESSION['username_member'])): ?>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
					Shop
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="../profile"><i class="glyphicon glyphicon-list-alt"></i> Pembelian</a>
					<a class="dropdown-item" href="../cart"><i class="glyphicon glyphicon-shopping-cart"></i> Cart</a>
					<a class="dropdown-item" href="../wishlist"><i class="glyphicon glyphicon-heart"></i> Wishlist</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
					<i class="fa fa-user"></i>
					<?= $_SESSION['username_member'];?>
				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="../profile"><i class="glyphicon glyphicon-user"></i> Profile</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="../users/logout.php"><i class="fa fa-sign-out"></i> Logout</a>
				</div>
			</li>
			<li class="nav-item">
				<?php require_once('../layout/header.cart.php');?>
				<span class="quantity fa-stack" data-count="<?=$count?>" style="font-size:20px">
					<a href="../cart"><i class="fa fa-shopping-cart fa-stack-1x"></i></a>
				</span>
			</li>
			<?php else:?>
			<li class="nav-item">
				<a class="nav-link" href="../contact-us">Contact</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../users/login.php"><i class="fa fa-sign-in"></i> Login</a>
			</li>
			<?php endif ?>
		</ul>
		<form class="form-inline my-2 my-lg-0 row" id="search" action="../search">
		<div class="col-9 pr-0 pl-2">
			<input class="form-control" type="search" name="q" placeholder="Search">
		</div>
		<div class="col-3 pl-0 pr-2">
			<button class="btn btn-search w-100" type="submit"><i class="fa fa-search"></i></button>
		</div>
		</form>
	</div>
</div>
</nav>