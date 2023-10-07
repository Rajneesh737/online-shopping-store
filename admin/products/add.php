<?php
	$conn =  mysqli_connect('localhost','root','','db_bestbuy');
	
	if(isset($_POST['insert-btn'])){
		
	$product_desc = $_POST['product_desc'];
	$product_quantity = $_POST['product_quantity'];
	$product_price = $_POST['product_price'];
	$product_cat_id = $_POST['product_cat_id'];
	$product_category = $_POST['product_category'];
	$image = $_FILES['image']['name'];
	$image_tmp = $_FILES['image']['tmp_name'];
	$product_owner = $_POST['product_owner'];
	$insert = "INSERT INTO tbl_product (product_desc,product_quantity,product_price,product_cat_id,product_category,product_image,product_owner) VALUES('$product_desc','$product_quantity','$product_price','$product_cat_id','$product_category','$image','$product_owner')";
	
	$run_insert = mysqli_query($conn,$insert);
	if($run_insert ===  true){
		echo "Data Has Been Inserted";
		move_uploaded_file($image_tmp,"upload/$image");
    header("Location: index.php");
	}else{
		echo "Failed, Ty Again";
	}	
	}
  ?>