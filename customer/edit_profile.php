<!DOCTYPE html>
<html lang="en">

<head>
  <title>Edit Your Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="css/bootstrap.css"/> -->
  <link rel="stylesheet" href="../../css/bootstrap.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
  <br><br>
  <div class="container">
    <h2>Edit Your Profile</h2>
    <?php
    session_start();
    $conn =  mysqli_connect('localhost', 'root', '', 'db_bestbuy');
    if (isset($_SESSION['user_id'])) {
      $edit_id =  $_SESSION['user_id'];

      $select = "SELECT * FROM tbl_user WHERE user_id='$edit_id'";
      $run =  mysqli_query($conn, $select);
      $row_user =  mysqli_fetch_array($run);
      $user_name =  $row_user['user_name'];
      $user_email =  $row_user['user_email'];
      $user_password =  $row_user['user_password'];
      $user_image =  $row_user['user_image'];
      $user_details =  $row_user['user_details'];
    }
    ?>


    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>Name:</label>
        <input type="text" class="form-control" value="<?php echo $user_name; ?>" placeholder="Name" name="user_name">
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" value="<?php echo $user_email; ?>" placeholder="Enter email" name="user_email">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" value="<?php echo $user_password; ?>" placeholder="Enter password" name="user_password">
      </div>

      <div class="form-group">
        <label>Image:</label>
        <input type="file" class="form-control" placeholder="image" name="image">
      </div>

      <div class="form-group">
        <label>Details:</label>
        <textarea class="form-control" name="user_details"><?php echo $user_details; ?></textarea>
      </div>

      <a class="btn btn-primary" href="profile.php">View User</a>
      &nbsp;&nbsp;
      <input type="submit" name="insert-btn" class="btn btn-success" />

    </form>

    <?php
    $conn =  mysqli_connect('localhost', 'root', '', 'db_bestbuy');

    if (isset($_POST['insert-btn'])) {

      $euser_name = $_POST['user_name'];
      $euser_email = $_POST['user_email'];
      $euser_password = $_POST['user_password'];
      $eimage = $_FILES['image']['name'];
      $eimage_tmp = $_FILES['image']['tmp_name'];
      $euser_details = $_POST['user_details'];

      if (empty($eimage)) {
        $eimage = $user_image;
      }


      $update = "UPDATE tbl_user SET user_name='$euser_name',user_email='$euser_email',user_password='$euser_password',user_image='$eimage',user_details='$euser_details' WHERE user_id='$edit_id' ";

      $run_update = mysqli_query($conn, $update);
      if ($run_update ===  true) {
        echo "Data Has Been Updated";
        move_uploaded_file($eimage_tmp, "upload/$eimage");
        header("Location: index.php");
      } else {
        echo "Failed, Ty Again";
      }
    }

    ?>

  </div>
  <?php
  $temp = $_SESSION['user_id'];
  session_unset();
  $_SESSION['user_id'] = $temp;
  $select = "SELECT * FROM tbl_user where user_id='$temp'";
  $run_select = mysqli_query($conn, $select);
  $row_user = mysqli_fetch_assoc($run_select);
  $user_name = $row_user['user_name'];
  $user_image = $row_user['user_image'];
  $user_details = $row_user['user_details'];
  $num = mysqli_num_rows($run_select);
  if ($num) {
    $_SESSION['loggedin'] = true;
    $_SESSION['user_email'] = $user_email;
    $_SESSION['user_name'] = $user_name;
    $_SESSION['user_image'] = $user_image;
    $_SESSION['user_details'] = $user_details;
  }
  ?>
</body>

</html>