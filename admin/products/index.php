<?php
session_start();
$conn =  mysqli_connect('localhost', 'root', '', 'db_bestbuy');

if (!isset($_SESSION['user_email'])) {
  echo "<script>window.open('../admin_login.php','_self');</script>";
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <title>Admin Client</title>
  <link rel="stylesheet" href="../../css/bootstrap.css" />
  <script src="../../js/jquery-3.2.1.slim.min.js"></script>
  <script src="../../js/popper.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>

  <!-- Bootstrap CSS CDN -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" /> -->
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="style.css" />
  <!-- Scrollbar Custom CSS -->
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

  <!---->

  <!-- Font Awesome JS -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
  <div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <h4>Admin Panel</h4>
      </div>

      <ul class="list-unstyled components">
        <li>
          <a href="../admin_user/index.php">Admin</a>
        </li>
        <li>
          <a href="../users/index.php">Users</a>
        </li>
        <li>
          <a href="../products/index.php">Products</a>
        </li>
        <li>
          <a href="../orders/index.php">Orders</a>
        </li>
        <li>
          <a href="../categories/index.php">Categories</a>
        </li>
        <li>
          <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Settings</a>
          <ul class="collapse list-unstyled" id="pageSubmenu">
            <li>
              <a href="../setting/discount/index.php">Discount</a>
            </li>
            <li>
              <a href="../setting/place/index.php">Delivery Fee</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="../report/index.php">Report</a>
        </li>
      </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
              <li class="nav-item">
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Add New &nbsp&nbsp&nbsp&nbsp
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="../admin_user/add_user.php">Admin</a>
                    <a class="dropdown-item" href="../products/add_product.php">Product</a>
                    <a class="dropdown-item" href="../categories/add_category.php">Category</a>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Account &nbsp&nbsp&nbsp&nbsp
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="../profile.php">Profile</a>
                    <a class="dropdown-item" href="../admin_logout.php">logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="container">
        <h2>View Products</h2><a class="btn btn-primary" href="add_product.php">Add Product</a>
        <br><br>
        <?php
        $conn =  mysqli_connect('localhost', 'root', '', 'db_bestbuy');
        if (isset($_GET['del'])) {
          $del_id =  $_GET['del'];
          $delete =  "DELETE FROM tbl_product WHERE product_id='$del_id'";
          $run_delete = mysqli_query($conn, $delete);
          if ($run_delete ===  true) {
            echo "Record Has Been Deleted";
          } else {
            echo "Failed, Try Again";
          }
        }
        ?>

        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Image</th>
              <th>Description</th>
              <th>Category</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Delete</th>
              <th>Edit</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $conn =  mysqli_connect('localhost', 'root', '', 'db_bestbuy');
            $select = "SELECT * FROM tbl_product";
            $run =  mysqli_query($conn, $select);
            while ($row_product =  mysqli_fetch_array($run)) {
              $product_id =  $row_product['product_id'];
              $product_desc =  $row_product['product_desc'];
              $product_quantity =  $row_product['product_quantity'];
              $product_price =  $row_product['product_price'];
              $product_category =  $row_product['product_category'];
              $product_image =  $row_product['product_image'];
              $product_owner =  $row_product['product_owner'];
            ?>
              <tr>
                <td><?php echo $product_id; ?></td>
                <td><img src="upload/<?php echo $product_image; ?>" height="70px"></td>
                <td><?php echo $product_desc; ?></td>
                <td><?php echo $product_category; ?></td>
                <td><?php echo $product_price; ?></td>
                <td><?php echo $product_quantity; ?></td>
                <td><a class="btn btn-danger" href="index.php?del=<?php echo $product_id; ?>">Delete</a></td>
                <td><a class="btn btn-success" href="edit_product.php?edit=<?php echo $product_id; ?>">Edit</a></td>
              </tr>
            <?php } ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>