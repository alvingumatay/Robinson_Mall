<?php
include_once("./database/constants.php");
if (!isset($_SESSION["userid"])) {
	header("location:".DOMAIN."/");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel = "shortcut icon" href = "./images/robinson2.jpg" />
	<title>Inventory Management System</title>
	<script src="./js/jquery.min.js"></script>
	<script defer src="./js/script.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link href="./font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
 	<script type="text/javascript" src="./js/main.js"></script>
 </head>
<body>
	<!-- Navbar -->
	<?php include_once("./templates/header.php"); ?>
	<br/><br/>
	<div class="container">
    
		<div class="row">
	
			<div class="col-md-4">
				<div class="card mx-auto">
        <?php
          $conn = new mysqli("localhost","root","","project_inv") or die(mysqli_error());
          $query = $conn->query("SELECT * FROM `user` WHERE `id` ") or die(mysqli_error());
          while($fetch = $query->fetch_array()){
          ?>
				
				 <img class="card-img-top mx-auto" style="width:60%;" src="images/<?php echo $fetch["image"];?>" alt="Card image cap">
				  <div class="card-body">
				  
				    <h4 class="card-title">Profile Info</h4>
				     <p class="card-text"><i class="fa fa-user">&nbsp;</i><?php echo $fetch['username'];?></p>
				    <p class="card-text"><i class="fa fa-user">&nbsp;</i><?php echo $fetch['usertype'];?></p>
				    <p class="card-text">Last Login : <?php echo $fetch['last_login'];?></p>
				    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo $fetch['id'];?>"><i class="fa fa-edit">&nbsp;</i>Edit Profile</a>
				   </div>
			
				      
				</div>
			</div>


<!-- Modal -->
<div class="modal fade" id="edit<?php echo $fetch['id'];?>"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    	<div class="modal-header">
        <h5 class="modal-title" >Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <div class="modal-body">
      	
	<form  method = "POST" enctype = "multi-part/form-data" action="edit.php">
	    
	<div class = "form-group">
		<img src="images/<?php echo $fetch['image'];?>" style="width:200px; border-radius:50%; margin:10px;">
		
		<label for = "username">Profile Image: </label>
       <br/>
       <input type="file" name="image" class="form-control">
		<input type="hidden" name="image" class="form-control" value="<?php echo $fetch['image'];?>">
		<br/>
    </div>	
	  <div class = "form-group">
       <input type="hidden" name="id" value = "<?php echo $fetch['id']; ?>"/>
        <label for = "username">Username: </label>
		<input class = "form-control" name = "username" value = "<?php echo $fetch['username']; ?>" type = "text" required = "required">
	</div>
	<input type="hidden" class = "form-control" name = "email" value = "<?php echo $fetch['email']; ?>" type = "text" required = "required">
	<input type="hidden" class = "form-control" name = "password" value = "<?php echo $fetch['password']; ?>" type = "text" required = "required">
    <div class = "form-group">
		<label for = "username">Usertype: </label>
		<select name="usertype" class="form-control" id="usertype">
		              <option value=""><?php echo $fetch['usertype']; ?></option>
		              <option value="Admin">Admin</option>
		              <option value="Other">Other</option>
		            </select>
	</div>
	<input type="hidden" class = "form-control" name = "register_date" value = "<?php echo $fetch['register_date']; ?>" type = "text" required = "required">
	<input type="hidden" class = "form-control" name = "last_login" value = "<?php echo $fetch['last_login']; ?>" type = "text" required = "required">
	<input type="hidden" class = "form-control" name = "notes" value = "<?php echo $fetch['notes']; ?>" type = "text" required = "required">

      </div>
     
  
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  class="btn btn-primary" name="edit" >Save changes</button>
      </div>
       
      </form>
      
    </div>
    
  </div>
</div>
  <?php
}
?>      
      <div class="col-md-8">
				<div class="jumbotron" style="width:100%;height:100%;">
					<h1>Welcome Admin,</h1>
					<div class="row">
						<div class="col-sm-6">
							<div class="clock">
                            <div class="hand hour" data-hour-hand></div>
                            <div class="hand minute" data-minute-hand></div>
                            <div class="hand second" data-second-hand></div>
                            <div class="number number1">1</div>
                            <div class="number number2">2</div>
                            <div class="number number3">3</div>
                            <div class="number number4">4</div>
                            <div class="number number5">5</div>
                            <div class="number number6">6</div>
                            <div class="number number7">7</div>
                            <div class="number number8">8</div>
                            <div class="number number9">9</div>
                            <div class="number number10">10</div>
                            <div class="number number11">11</div>
                            <div class="number number12">12</div>
                          </div>

						</div>
						<div class="col-sm-6">
							<div class="card">
						      <div class="card-body">
						        <h4 class="card-title">New Orders</h4>
						        <p class="card-text">Here you can make invoices and create new orders</p>
						        <a href="new_order.php" class="btn btn-danger">New Orders</a>
						      </div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<p></p>
	<p></p>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card">
						<div class="card-body">
						<h4 class="card-title">Categories</h4>
						<p class="card-text">Here you can manage your categories and you add new parent and sub categories</p>
						<a href="#" data-toggle="modal" data-target="#form_category" class="btn btn-danger">Add</a>
						<a href="manage_categories.php" class="btn btn-danger">Manage</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
						<div class="card-body">
						<h4 class="card-title">Brands</h4>
						<p class="card-text">Here you can manage your brand and you add new brand</p>
						<a href="#" data-toggle="modal" data-target="#form_brand" class="btn btn-danger">Add</a>
						<a href="manage_brand.php" class="btn btn-danger">Manage</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
						<div class="card-body">
						<h4 class="card-title">Products</h4>
						<p class="card-text">Here you can manage your prpducts and you add new products</p>
						<a href="#" data-toggle="modal" data-target="#form_products" class="btn btn-danger">Add</a>
						<a href="manage_product.php" class="btn btn-danger">Manage</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	
	<?php
	//Categpry Form
	include_once("./templates/category.php");
	 ?>
	 <?php
	//Brand Form
	include_once("./templates/brand.php");
	 ?>
	 <?php
	//Products Form
	include_once("./templates/products.php");
	 ?>


</body>
<script src="js/jquery-3.2.1.min.js"></script>	
<script src="js/bootstrap.js"></script>	
</html>
