<?php
	session_start();
	$conn = new mysqli("localhost","root","","db_bestbuy");
	if($conn->connect_error){
		die("Connection Failed!".$conn->connect_error);
	}

	if (isset($_POST['user_name'])) {
	  $user_name = $_POST['user_name'];
	  $user_password = $_POST['user_password'];
      $user_email=$_POST['user_email'];
      
          $insert="INSERT INTO  `tbl_user` (user_name,user_email,user_password,user_image,user_details) VALUES ('$user_name','$user_email','$user_password','null','null')";
          $run_insert = mysqli_query($conn,$insert);
          if($run_insert ===  true){
              echo "Data Has Been Inserted, Now Taking you to the Login Page...";
            //   sleep(5);
              header("location:login.php");
          }else{
              echo "User Already Exists!!,  Now Taking you to the Login Page...";
            //  sleep(5);
              header("location:login.php");
          }
        }
?>