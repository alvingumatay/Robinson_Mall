<?php 
if(ISSET($_POST['edit'])){
      
      $username = $_POST['username'];
      $usertype = $_POST['usertype'];  
      $new_file_name = strtolower($file);
      $final_file=str_replace(' ','-',$new_file_name);
      $image = $_POST['image'];
      if(move_uploaded_file($file_loc,$folder.$final_file))
    {
      $image=$final_file;
    }
      $conn = new mysqli("localhost","root","","project_inv") or die(mysqli_error());
      $conn->query("UPDATE `user` SET `username` = '$username', `usertype` = '$usertype', `image` = '$image'") or die(mysqli_error());
      header("location: dashboard.php");
    }