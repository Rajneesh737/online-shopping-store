<!DOCTYPE html>
<html lang="en">

<head>
	<title>Edit Place</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="stylesheet" href="css/bootstrap.css"/> -->
	<link rel="stylesheet" href="../../../css/bootstrap.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
	<br><br>
	<div class="container">
		<h2>Edit Place</h2>

		<?php
		$conn =  mysqli_connect('localhost', 'root', '', 'db_bestbuy');
		if (isset($_GET['edit'])) {
			$edit_id =  $_GET['edit'];

			$select = "SELECT * FROM tbl_place WHERE place_id='$edit_id'";
			$run =  mysqli_query($conn, $select);
			$row_place =  mysqli_fetch_array($run);
			$place_name =  $row_place['place_name'];
			$place_pincode =  $row_place['place_pincode'];
			$place_fee =  $row_place['place_fee'];
		}
		?>


		<form action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Name:</label>
				<input type="text" class="form-control" placeholder="Enter Place Name" value="<?php echo $place_name;?>" name="place_name">
			</div>
			<div class="form-group">
				<label>Pincode</label>
				<input type="number" class="form-control" placeholder="Enter Place Pincode" value="<?php echo $place_pincode;?>" name="place_pincode">
			</div>
			<div class="form-group">
				<label>Delivery Charges:</label>
				<input type="number" class="form-control" placeholder="Enter Delivery Charges for the Place" value="<?php echo $place_fee;?>" name="place_fee">
			</div>
			<a class="btn btn-primary" href="index.php">View place</a>
			&nbsp;&nbsp;
			<input type="submit" name="insert-btn" class="btn btn-success" />

		</form>

		<?php
		$conn =  mysqli_connect('localhost', 'root', '', 'db_bestbuy');

		if (isset($_POST['insert-btn'])) {

			$eplace_name = $_POST['place_name'];
			$eplace_pincode = $_POST['place_pincode'];
			$eplace_fee = $_POST['place_fee'];

			$update = "UPDATE tbl_place SET place_name='$eplace_name',place_pincode='$eplace_pincode',place_fee='$eplace_fee' WHERE place_id='$edit_id' ";

			$run_update = mysqli_query($conn, $update);
			if ($run_update ===  true) {
				echo "Data Has Been Updated";
				header("Location: index.php");
			} else {
				echo "Failed, Try Again";
			}
		}

		?>


	</div>

</body>

</html>