<?php
include_once("./database/constants.php");
if (isset($_SESSION["userid"])) {
	header("location:".DOMAIN."/dashboard.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel = "shortcut icon" href = "./images/robinson2.jpg" />
	<title>Robinson's Super Market</title>
	<script src="./js/jquery.min.js"></script>
	<script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link href="./font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet"> 
 	<link rel="stylesheet" type="text/css" href="./includes/style.css">
 	<script type="text/javascript" rel="stylesheet" src="./js/main.js"></script>
 </head>
<body>
<div class="overlay"><div class="loader"></div></div>
	<!-- Navbar -->
	<?php include_once("./templates/header.php"); ?>
	<br/><br/>
	<div class="container">
		<?php
			if (isset($_GET["msg"]) AND !empty($_GET["msg"])) {
				?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <?php echo $_GET["msg"]; ?>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
				<?php
			}
		?>
		<div class="card mx-auto" style="width: 20rem;">
		  <img class="card-img-top mx-auto" style="width:60%;" src="./images/robinson.jpg" alt="Login Icon">
		  <div class="card-body">
		    <form id="form_login" onsubmit="return false">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" name="log_email" id="log_email" placeholder="Enter email">
			    <small id="e_error" class="form-text text-muted">We'll never share your email with anyone else.</small>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" name="log_password" id="log_password" placeholder="Password">
			  	<small id="p_error" class="form-text text-muted"></small>
			  </div>
			  <button type="submit" class="btn btn-danger"><i class="fa fa-lock">&nbsp;</i>Login</button>
			  &nbsp;&nbsp;&nbsp;
			  <span><a type="button"  class="btn btn-danger" target="_blank" href="http://localhost/Robinsonmall_inv-master/public_html/register.php?link=register"><i class="fa fa-key"></i> Register</a>    </span>
			</form>
		    
		  </div>
		  <div class="card-footer"><a href="#">Forget Password ?</a></div>
		</div>
	</div>

</body>
</html>