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

    <div class="container">
        <?php
                                        $conn =  mysqli_connect('localhost', 'root', '', 'db_bestbuy');
                                        if (isset($_GET['del'])) {
                                            $del_id =  $_GET['del'];
                                            $delete =  "DELETE FROM tbl_cart WHERE c_id='$del_id'";
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
                    <th>S.NO.</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Price</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                                        $conn =  mysqli_connect('localhost', 'root', '', 'db_bestbuy');
                                        $select = "SELECT * FROM tbl_order , tbl_product WHERE p_id=product_id AND u_id=$u";
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
                                            $price=$c_total / $quantity;
                ?>
                    <tr>
                        <td><?php echo $sno;
                                            $sno += 1; ?></td>
                        <td><img src="../admin/products/upload/<?php echo $product_image; ?>" height="70px"></td>
                        <td><?php echo $product_desc; ?></td>
                        <td><?php echo $quantity; ?></td>
                        <td><?php echo $c_total; ?></td>
                        <td><?php echo $c_total; ?></td>
                        <td><?php echo $order_date; ?></td>
                    </tr>
                <?php }
                ?>

            </tbody>
        </table>
    <?php } ?>
    </div>
</body>

</html>