<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once('../layout/head.php');?>
</head><!--/head-->

<body>
	<header id="header">
		<?php require_once('../layout/header.php'); ?>
	</header>
	<div class="space-header"></div>
	 
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Kontak <strong>Kami</strong></h2>    		
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Hubungi Kami</h2>
				    	<form id="contact-form" class="contact-form row">
				            <div class="form-group col-md-6">
				                <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" maxlength="30">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" maxlength="30">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" id="subjek" name="subjek" class="form-control" required="required" placeholder="Subject" maxlength="30">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea id="message" name="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
                        		<input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>" required>
				                <input type="submit" class="btn btn-primary w-50" value="Submit"> 
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Info Kontak</h2>
	    				<address>
	    					<p>LainLain.co.id</p>
							<p>Jl. Hasanudin HM No.55</p>
							<p>Banjarmasin, Kal - Sel</p>
							<p>Email: info@lainlain.co.id</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
	</div>
	
	<div class="space-header"></div>
	<footer id="footer">
		<?php require_once('../layout/footer.php');?>	
	</footer>
	
  
<?php require_once('../layout/javascript.php');?>
<script src="contact.js"></script>
</body>
</html>