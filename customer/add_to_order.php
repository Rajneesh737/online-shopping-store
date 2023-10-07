<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	$u = $_SESSION['user_id'];

	$conn = new mysqli("localhost", "root", "", "db_bestbuy");
	if ($conn->connect_error) {
		die("Connection Failed!" . $conn->connect_error);
	}
	$select = "SELECT * FROM tbl_cart,tbl_discount  WHERE p_id=product_id AND u_id=$u";
	$run =  mysqli_query($conn, $select);
	while ($row =  mysqli_fetch_array($run)) {
		$pid=$row['p_id'];
		$quantity=$row['quantity'];
		$discount_perc = $row['discount_perc'];
		$ctotal=$row['c_total'];
		$ctotal = $ctotal * (100-$discount_perc) / 100;
		$insert="INSERT into tbl_order (u_id,p_id,quantity,c_total) values ('$u','$pid','$quantity','$ctotal')";
		$run_insert =  mysqli_query($conn, $insert);

	}
	if($run_insert ===  true){
		echo "Data Has Been Inserted";
		$clear="DELETE from tbl_cart WHERE u_id=$u";
	$run_clear =  mysqli_query($conn, $clear);
    header("Location: index.php");
	}else{
		echo "Failed, Ty Again";
	}	
	
}
?>