<!-- <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="register-photo">
        <div class="form-container">
            <form action="checkuser.php" method="post">
                <h2 class="text-center"><strong>Enter</strong> the credentials.</h2>
                <div class="form-group"><input class="form-control" type="email" name="user_email" placeholder="Email" required></div>
                <div class="form-group"><input class="form-control" type="text" name="user_password" placeholder="Password" required></div>
                </div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Log In</button></div>
                
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>



 -->

 <?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="login_style.css">

  <link rel="stylesheet" href="login_css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->                  
  <link rel="stylesheet" href="login_css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="login_css/style.css">
<title>BestBuy | Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


</head>
<body>
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Log In here!!</h3>
              <p class="mb-4">Welcome To our BestBuy Store. Log In below to Enjoy the website</p>
            </div>
            <form action="checkuser.php" method="post">
              <div class="form-group first">
                <label for="email">Email</label>
              <input type="email" name="user_email" class="form-control" placeholder="Email" required="required" id="username">
              </div>

              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control"  name="user_password" placeholder="Password" id="password">

              </div>

              <div class="d-flex mb-5 align-items-center">
                <span class="ml-auto">Don't Have an Account? <a href="signup.php" class="forgot-pass">Sign Up</a></span>
              </div>

              <input type="submit" name="login-btn" value="Let Me in!" class="btn btn-primary btn-block">

            </form>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
