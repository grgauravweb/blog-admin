<?php
// session_start();
// echo phpinfo();
//login page
isset($_SESSION['_admin']) ? header("Location:"."/admin/dashboard") : '';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login to Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
  
</head>
<body>
    <div class="container">
    <div class="row">
    <div class="col-md-12">
        <div class="login">
            <h1>Login to Admin Panel</h1>
            <img src="image/logo.png">
            <form action="" method="POST">
                <div class="form-group">
                   <input type="text" name="username" class="form-control" placeholder="username" required />
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="password" required />
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary btn-block" value="Login" />
                </div>
            </form>
        </div>
        </div>
        </div>
    </div>
</body>
</html> 