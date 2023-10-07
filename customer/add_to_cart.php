<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	$u = $_SESSION['user_id'];

	$conn = new mysqli("localhost", "root", "", "db_bestbuy");
	if ($conn->connect_error) {
		die("Connection Failed!" . $conn->connect_error);
	}

	// Add products into the cart table
	if (isset($_POST['product_id'])) {
		$product_id = $_POST['product_id'];
		$product_price = $_POST['product_price'];

		$stmt = $conn->prepare('SELECT p_id FROM tbl_cart WHERE p_id=? AND u_id =?');
		$stmt->bind_param('ii', $product_id, $u);
		$stmt->execute();
		$res = $stmt->get_result();
		$r = $res->fetch_assoc();
		$id = $r['p_id'] ?? '';
		echo $product_id;
		if (!$id) {
			$select = "SELECT * from tbl_product WHERE product_id=$product_id";
			$run_select = mysqli_query($conn, $select);
			$row = mysqli_fetch_assoc($run_select);
			$product_category = $row['product_category'];
			// echo $product_category;
			$product_cat_id = $row['product_cat_id'];
			$product_image = $row['product_image'];
			$product_desc = $row['product_desc'];
			$product_quantity = $row['product_quantity'];
			$product_owner = $row['product_owner'];
			$total_price = $product_quantity * $product_price;
			$insert = "INSERT INTO tbl_cart (u_id,p_id,quantity,c_total) VALUES ('$u','$product_id',1,'$product_price')";
			// $query->bind_param('isiiisssi',$pid,$pdesc,$pqty,$pprice,$pci,$pc,$pimage,$total_price);
			// $query->execute();
			$run_insert = mysqli_query($conn, $insert);
			if ($run_insert ===  true) {
				echo "Data Has Been Inserted";
			} else {
				echo "Failed, Ty Again";
			}
		} else {
			echo '<div class="alert alert-danger alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Item already added to your cart!</strong>
						</div>';
		}
	}
} else {
	echo "hi";
}