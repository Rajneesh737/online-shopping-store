<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit User</title>
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
  <h2>Edit Category</h2>

  <?php
  	$conn =  mysqli_connect('localhost','root','','db_bestbuy');
	if(isset($_GET['edit'])){
		$edit_id =  $_GET['edit'];

	$select = "SELECT * FROM categories WHERE category_id='$edit_id'";
	$run =  mysqli_query($conn,$select);
	$row_category =  mysqli_fetch_array($run);
		$category_name =  $row_category['category_name'];


	}
  ?>


  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label>Name:</label>
      <input type="text" class="form-control" value="<?php echo $category_name;?>"  placeholder="Name" name="category_name">
    </div>

	<a class="btn btn-primary" href="index.php">View Category</a>
    &nbsp;&nbsp;
    <input type="submit" name="insert-btn" class="btn btn-success" />

  </form>

  <?php
	$conn =  mysqli_connect('localhost','root','','db_bestbuy');

	if(isset($_POST['insert-btn'])){

	$ecategory_name = $_POST['category_name'];





	$update = "UPDATE categories SET category_name='$ecategory_name' WHERE category_id='$edit_id' ";

	$run_update = mysqli_query($conn,$update);
	if($run_update ===  true){
		echo "Data Has Been Updated";

		header("Location: index.php");
	}else{
		echo "Failed, Ty Again";
	}


	}

  ?>


</div>

</body>
</html>
