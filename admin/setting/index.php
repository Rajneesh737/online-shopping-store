<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <title>Collapsible sidebar using Bootstrap 4</title>


  <!-- JQuery, Popper and Bootstrap Offline Library -->
  <link rel="stylesheet" href="../../css/bootstrap.css" />
  <script src="../../js/jquery-3.2.1.slim.min.js"></script>
  <script src="../../js/popper.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="style.css" />


  <!-- Bootstrap CSS CDN -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" /> -->
  <!-- Scrollbar Custom CSS -->
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
  <!-- Font Awesome JS -->
  <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script> -->

</head>

<body>
  <div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <h4>Bootstrap Sidebar</h4>
      </div>

      <ul class="list-unstyled components">
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
          <a href="../setting/index.php">Setting</a>
        </li>
        <li>
        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Setting</a>
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
                    Dropdown button
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="../users/add_user.php">User</a>
                    <a class="dropdown-item" href="#">Product</a>
                    <a class="dropdown-item" href="#">Category</a>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hello,
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="../users/index.php">Edit Profile</a>
                    <a class="dropdown-item" href="#">logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>


      <div id="accordion">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Product
              </button>
            </h5>
          </div>

          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
            <?php
                $conn =  mysqli_connect('localhost', 'root', '', 'db_bestbuy');
                if (isset($_GET['del'])) {
                  $del_id =  $_GET['del'];
                  $delete =  "UPDATE tbl_discount SET discount_perc=0 WHERE product_id='$del_id'";
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
                    <th>Description</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Dscount</th>
                    <th>Discounted Price</th>
                    <th>Remove Discount </th>
                    <th>Set Discount</th>
                  </tr>
                </thead>
                <?php
                $conn =  mysqli_connect('localhost', 'root', '', 'db_bestbuy');
                $select = "SELECT * FROM tbl_product";
                
                $run =  mysqli_query($conn, $select);
                
                while ($row_product =  mysqli_fetch_array($run)) {
                  $product_id =  $row_product['product_id'];
                  $select2 = "SELECT * FROM tbl_discount WHERE product_id='$product_id'";
                  $run2 =  mysqli_query($conn, $select2);
                  $row_discount =  mysqli_fetch_array($run2);
                  $discount_perc=$row_discount['discount_perc'];

                  
                  $product_desc =  $row_product['product_desc'];
                  $product_price =  $row_product['product_price'];
                  $product_category =  $row_product['product_category'];

                ?>
                  <tbody>
                    <tr>
                      <td><?php echo $product_id; ?></td>
                      <td><?php echo $product_desc; ?></td>
                      <td><?php echo $product_category; ?></td>
                      <td><?php echo $product_price; ?></td>
                      <td><?php echo $discount_perc; ?></td>
                      <td><?php echo $product_price * (100-$discount_perc)/100; ?></td>
                      <td><a class="btn btn-danger" href="index.php?del=<?php echo $product_id; ?>">Remove</a></td>
                      <td><a class="btn btn-success" href="discount/edit_discount.php?edit=<?php echo $product_id; ?>">Edit</a></td>
                    </tr>
                  <?php } ?>

                  </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="card" >
          <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Delivery Fees
              </button>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
              <div class="container">
                <h2>List of Locations</h2><a class="btn btn-primary" href="place/add_place.php">Add Location</a>
                <?php
                $conn =  mysqli_connect('localhost', 'root', '', 'db_bestbuy');
                if (isset($_GET['del'])) {
                  $del_id =  $_GET['del'];
                  $delete =  "DELETE FROM tbl_place WHERE place_id='$del_id'";
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
                      <th>Place Name</th>
                      <th>Pincode</th>
                      <th>Delivery Fee</th>
                      <th>Delete</th>
                      <th>Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $conn =  mysqli_connect('localhost', 'root', '', 'db_bestbuy');
                    $select = "SELECT * FROM tbl_place";
                    $run =  mysqli_query($conn, $select);
                    while ($row_place =  mysqli_fetch_array($run)) {
                      $place_id =  $row_place['place_id'];
                      $place_name =  $row_place['place_name'];
                      $place_pincode =  $row_place['place_pincode'];
                      $place_fee =  $row_place['place_fee'];
                    ?>
                      <tr>
                        <td><?php echo $place_id; ?></td>
                        <td><?php echo $place_name; ?></td>
                        <td><?php echo $place_pincode; ?></td>
                        <td><?php echo $place_fee; ?></td>
                        <td><a class="btn btn-danger" href="index.php?del=<?php echo $place_id; ?>">Delete</a></td>
                        <td><a class="btn btn-success" href="place/edit_place.php?edit=<?php echo $place_id; ?>">Edit</a></td>
                      </tr>
                    <?php } ?>

                  </tbody>
                </table>
              </div>



            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingThree">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Collapsible Group Item #3
              </button>
            </h5>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</body>

</html>