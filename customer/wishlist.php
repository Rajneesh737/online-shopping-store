<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | BestBuy</title>

    <link rel="stylesheet" href="../css/bootstrap.css" />
    <script src="../js/jquery-3.2.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">BestBuy</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categories &nbsp &nbsp &nbsp
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <ul class="list-unstyled components">
                                    <?php
                                    session_start();
                                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                        $u = $_SESSION['user_id'];
                                        
                                        $conn =  mysqli_connect('localhost', 'root', '', 'db_bestbuy');
                                        $select = "select * from categories";
                                        $run_select = mysqli_query($conn, $select);
                                        while ($row = mysqli_fetch_assoc($run_select)) {
                                            $category_id = $row['category_id'];
                                            $category_name = $row['category_name'];
                                    ?>
                                            <li>
                                                <a href="category_filter.php?cat=<?php echo $category_id; ?>"><?php echo $category_name; ?></a>
                                            </li>
                                        <?php } ?>
                                </ul>
                            </div>
                        </li>
                        
                    </ul>
                    <div class="form-inline my-2 my-lg-0">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="cart.php">My Cart<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="wishlist.php">My Wishlist<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    My Account &nbsp &nbsp &nbsp
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="profile.php">Profile</a>
                                    <a class="dropdown-item" href="edit_profile.php">Edit Profile</a>
                                    <a class="dropdown-item" href="my_orders.php">My Orders</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php">Log Out</a>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div id="categ_cont">
        <?php
                                        $conn =  mysqli_connect('localhost', 'root', '', 'db_bestbuy');
                                        if (isset($_GET['del'])) {
                                            $del_id =  $_GET['del'];
                                            $delete =  "DELETE FROM tbl_wishlist WHERE p_id='$del_id'";
                                            $run_delete = mysqli_query($conn, $delete);
                                            if ($run_delete ===  true) {
                                                echo "Record Has Been Deleted";
                                            } else {
                                                echo "Failed, Try Again";
                                            }
                                        }
        ?>
        <!-- <div class="container"> -->


        <div class="container mt-5">
            <div class="row">
            <?php

                                        $conn =  mysqli_connect('localhost', 'root', '', 'db_bestbuy');
                                        $select = "SELECT * FROM tbl_wishlist,tbl_product,tbl_discount WHERE p_id=tbl_product.product_id AND tbl_product.product_id=tbl_discount.product_id  AND u_id=$u";
                                        $run_select = mysqli_query($conn, $select);
                                        while ($row = mysqli_fetch_assoc($run_select)) {
                                            $product_id = $row['product_id'];
                                            $product_desc = $row['product_desc'];
                                            $product_quantity = $row['product_quantity'];
                                            $product_price = $row['product_price'];
                                            $product_cat_id = $row['product_cat_id'];
                                            $product_category = $row['product_category'];
                                            $product_image = $row['product_image'];
                                            $product_owner = $row['product_owner'];
                                            $discount_perc = $row['discount_perc'];
                                            $price = $product_price * (100-$discount_perc) / 100;
                                            echo "<div class='col-md-3 mb-3' > 
          <form action='add_to_cart.php' method='POST'>
          <div class='card'>
            <img src='../admin/products/upload/$product_image' class='card-img-top' height='250px'>
            <div class='card-body text-center'>
              <h5 class='card-title'>$product_desc</h5>
              <p class='card-text'>ISM Special Price Rs.$price</p>
              <button type='submit' name='Add_to_Cart' class='btn btn-info'>Add to Cart</button>
              <input type='hidden' name='product_id' value='$product_id'>
              <input type='hidden' name='product_price' value='$product_price'>
              <a class='btn btn-danger' href='wishlist.php?del=$product_id'>Delete</a>
            </div>
          </div>
          </form>
          </div>&nbsp;&nbsp;&nbsp;";
                                        }
                                    }
            ?>
            </div>
        </div>
    </div>
</body>

</html>