<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../../css/bootstrap.css" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
  <br><br>
  <div class="container">
    <h2>Add New Place</h2>
    <form action="add.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>Name:</label>
        <input type="text" class="form-control" placeholder="Enter Place Name" name="place_name">
      </div>
      <div class="form-group">
        <label>Pincode</label>
        <input type="number" class="form-control" placeholder="Enter Place Pincode" name="place_pincode">
      </div>
      <div class="form-group">
        <label>Delivery Charges:</label>
        <input type="number" class="form-control" placeholder="Enter Delivery Charges for the Place" name="place_fee">
      </div>
      <input type="submit" name="insert-btn" class="btn btn-primary" />
    </form>
  </div>
</body>

</html>