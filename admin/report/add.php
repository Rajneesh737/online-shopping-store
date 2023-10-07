<!DOCTYPE html>
<html lang="en">

<head>
  <title>Report</title>
  <link rel="stylesheet" href="../../css/bootstrap.css" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
  <br><br>
  <div class="container">
    <h2>View Orders Report</h2>


    <table class="table table-bordered">
      <thead>
        <tr>
          <th>S.NO.</th>
          <th>Image</th>
          <th>Description</th>
          <th>Buyer</th>
          <th>Buyer User Id</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Total Price</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $conn =  mysqli_connect('localhost', 'root', '', 'db_bestbuy');
        if (isset($_POST['insert-btn'])) {
          $date1 = $_POST['from'];
          $date2 = $_POST['to'];
          echo "<h2><b>From : </b> &emsp; $date1 </h2>";
          echo "<h2><b>To : </b> &emsp; &emsp; $date2</h2>";
          $select = "SELECT *
                      FROM tbl_product
                      JOIN tbl_user
                      JOIN tbl_order ON tbl_order.u_id=tbl_user.user_id AND tbl_order.p_id=tbl_product.product_id
                      WHERE order_date>='$date1' AND order_date<='$date2'";
          $run =  mysqli_query($conn, $select);
          $sno = 1;
          while ($row_product =  mysqli_fetch_array($run)) {
            $product_id =  $row_product['product_id'];
            $product_desc =  $row_product['product_desc'];
            $product_quantity =  $row_product['product_quantity'];
            $product_price =  $row_product['product_price'];
            $product_category =  $row_product['product_category'];
            $product_image =  $row_product['product_image'];
            $product_owner =  $row_product['product_owner'];
            $order_date = $row_product['order_date'];
            $c_id = $row_product['c_id'];
            $c_total = $row_product['c_total'];
            $quantity = $row_product['quantity'];
            $user_name = $row_product['user_name'];
            $user_id = $row_product['u_id'];
        ?>
            <tr>
              <td><?php echo $sno;
                  $sno += 1; ?></td>
              <td><img src="../products/upload/<?php echo $product_image; ?>" height="70px"></td>
              <td><?php echo $product_desc; ?></td>
              <td><?php echo $user_name; ?></td>
              <td><?php echo $user_id; ?></td>
              <td><?php echo $quantity; ?></td>
              <td><?php echo $c_total/$quantity; ?></td>
              <td><?php echo $c_total; ?></td>
              <td><?php echo $order_date; ?></td>
            </tr>
        <?php }
        }
        ?>
      </tbody>
    </table>
  </div>
  <div class="container text-center">
<button onclick="window.print()" class="btn btn-primary">&emsp;Print&emsp;</button>
<br>
<br>
      </div>
</body>

</html>