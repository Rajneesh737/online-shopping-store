<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../css/bootstrap.css"/>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<br><br>
<div class="container">
  <h2>Add New product</h2>
  <form action="add.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label>Description:</label>
      <input type="text" class="form-control"  placeholder="Enter Description" name="product_desc">
    </div>
    <div class="form-group">
      <label>Category:</label>
      <input type="text" class="form-control"  placeholder="Enter Category" name="product_category">
    </div>
    <div class="form-group">
      <label>Category_ID:</label>
      <input type="number" class="form-control"  placeholder="Enter Category ID" name="product_cat_id">
    </div>
    <div class="form-group">
      <label>Quantity</label>
      <input type="number" class="form-control"  placeholder="Enter Quantity" name="product_quantity">
    </div>
    <div class="form-group">
      <label>Price:</label>
      <input type="number" class="form-control"  placeholder="Enter Price" name="product_price">
    </div>
	  <div class="form-group">
      <label>Image:</label>
      <input type="file" class="form-control"  placeholder="Input Image" name="image">
    </div>
    <div class="form-group">
      <label>Owner:</label>
      <input type="text" class="form-control"  placeholder="Enter Owner Name" name="product_owner">
    </div>
    
    <input type="submit" name="insert-btn" class="btn btn-primary" />
    
  </form>
  
  
  
  
  
  
</div>

</body>
</html>
