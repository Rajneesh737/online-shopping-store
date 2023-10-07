<?php
	// session_start();
    
	$conn = new mysqli("localhost","root","","db_bestbuy");
	if($conn->connect_error){
		die("Connection Failed!".$conn->connect_error);
	}
	if ($_SERVER['REQUEST_METHOD']=='POST') {
	  $user_email = $_POST['user_email'];
	  $user_password = $_POST['user_password'];
          $select="SELECT * FROM tbl_user where user_email='$user_email' AND user_password='$user_password'";
          $run_select = mysqli_query($conn,$select);
          $row_user=mysqli_fetch_assoc($run_select);
          $user_id=$row_user['user_id'];
          $user_name=$row_user['user_name'];
          $user_details=$row_user['user_details'];
          echo $user_id;
          $num=mysqli_num_rows($run_select);
          if($num){
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['user_email']=$user_email;
             $_SESSION['user_id']=$user_id;
             $_SESSION['user_name']=$user_name;
             $_SESSION['user_details']=$user_details;
            header("Location: index.php");

          }else{
            header("Location: signup.php");
          }
        }
?>