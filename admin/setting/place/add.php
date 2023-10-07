<?php
	$conn =  mysqli_connect('localhost','root','','db_bestbuy');
	
	if(isset($_POST['insert-btn'])){
		
	$place_name = $_POST['place_name'];
	$place_pincode = $_POST['place_pincode'];
	$place_fee = $_POST['place_fee'];

	$insert = "INSERT INTO tbl_place (place_name,place_pincode,place_fee) VALUES('$place_name','$place_pincode','$place_fee')";
	
	$run_insert = mysqli_query($conn,$insert);
	if($run_insert ===  true){
		echo "Data Has Been Inserted";
    	header("Location: index.php");
	}else{
		echo "Failed, Ty Again";
	}	
	}
  ?>