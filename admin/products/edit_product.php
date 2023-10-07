<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Product</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="css/bootstrap.css"/> -->
  <link rel="stylesheet" href="../../css/bootstrap.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<br><br>
<div class="container">
  <h2>Edit Product</h2>
  
  <?php
  	$conn =  mysqli_connect('localhost','root','','db_bestbuy');
	if(isset($_GET['edit'])){
		$edit_id =  $_GET['edit'];
	
	$select = "SELECT * FROM tbl_product WHERE product_id='$edit_id'";
	$run =  mysqli_query($conn,$select);
	$row_product =  mysqli_fetch_array($run);
		$product_id =  $row_product['product_id'];
		$product_desc =  $row_product['product_desc'];
		$product_quantity =  $row_product['product_quantity'];
		$product_price =  $row_product['product_price'];
		$product_cat_id =  $row_product['product_cat_id'];
		$product_category =  $row_product['product_category'];
		$product_image =  $row_product['product_image'];
		$product_owner =  $row_product['product_owner'];
		
	}
  ?>
  
  
  <form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
      <label>Description:</label>
      <input type="text" class="form-control" value="<?php echo $product_desc;?>"  placeholder="Enter Description" name="product_desc">
    </div>
    <div class="form-group">
      <label>Category:</label>
      <input type="text" class="form-control" value="<?php echo $product_category;?>" placeholder="Enter Category" name="product_category">
    </div>
    <div class="form-group">
      <label>Category_ID:</label>
      <input type="number" class="form-control" value="<?php echo $product_cat_id;?>" placeholder="Enter Category ID" name="product_cat_id">
    </div>
    <div class="form-group">
      <label>Quantity</label>
      <input type="number" class="form-control" value="<?php echo $product_quantity;?>" placeholder="Enter Quantity" name="product_quantity">
    </div>
    <div class="form-group">
      <label>Price:</label>
      <input type="number" class="form-control" value="<?php echo $product_price;?>" placeholder="Enter Price" name="product_price">
    </div>
	<div class="form-group">
      <label>Image:</label>
      <input type="file" class="form-control"  placeholder="image" name="image">
    </div>
    <div class="form-group">
      <label>Owner:</label>
      <input type="text" class="form-control" value="<?php echo $product_owner;?>" placeholder="Enter Owner Name" name="product_owner">
    </div>
	
	<a class="btn btn-primary" href="index.php">View Product</a>
    &nbsp;&nbsp;
    <input type="submit" name="insert-btn" class="btn btn-success" />
	
  </form>
  
  <?php
	$conn =  mysqli_connect('localhost','root','','db_bestbuy');
	
	if(isset($_POST['insert-btn'])){
		// $eproduct_id =  $_POST['product_id'];
		$eproduct_desc =  $_POST['product_desc'];
		$eproduct_quantity =  $_POST['product_quantity'];
		$eproduct_price =  $_POST['product_price'];
		$eproduct_cat_id =  $_POST['product_cat_id'];
		$eproduct_category =  $_POST['product_category'];
		$eimage =  $_FILES['image']['name'];
		$eimage_tmp = $_FILES['image']['tmp_name'];
		$eproduct_owner =  $_POST['product_owner'];  
	
	if(empty($eimage)){
		$eimage= $product_image;
	}

	
	$update = "UPDATE tbl_product SET product_desc='$eproduct_desc',product_quantity='$eproduct_quantity',product_price='$eproduct_price',product_cat_id='$eproduct_cat_id',product_category='$eproduct_category',product_image='$eimage',product_owner='$eproduct_owner' WHERE product_id='$edit_id' ";
	
	$run_update = mysqli_query($conn,$update);
	if($run_update ===  true){
		echo "Data Has Been Updated";
		move_uploaded_file($eimage_tmp,"upload/$eimage");
		header("Location: index.php");
	}else{
		echo "Failed, Ty Again";
	}	
	
		
	}
	
  ?>  
  
  
</div>

</body>
</html>
