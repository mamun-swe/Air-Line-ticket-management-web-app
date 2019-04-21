
<?php
    include('../server/user/login.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/registration.css">
    <title>Login Account</title>
  </head>
  <body>

  <div class="mainBox flex-center flex-column">
      <div class="card border-0 rounded-0 py-3">
        <div class="card-header border-0 text-center bg-white">
            <h4 class="h4-responsive card-title">Login Account</h4>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="form-group mb-3">
                    <small class="text-danger"><?php echo $error; ?></small>
                    <small class="text-danger"><?php echo $userMailErr;?></small>
                    <input type="email" name="logmail" class="form-control form-control-sm rounded-0 shadow-none px-1" placeholder="E-mail">
                </div>
                <div class="form-group mb-3">
                    <small class="text-danger"><?php echo $userPassErr;?></small>
                    <input type="password" name="logpassword" class="form-control form-control-sm rounded-0 shadow-none px-1" placeholder="Password">
                </div>
                <button type="submit" name="doLogin" class="btn btn-primary float-right py-1 px-3 rounded-0 shadow-none">Login</button>
            </form>
            <a href="registration.php">Have no account ?</a>
        </div>
      </div>
  </div>
    



    
  <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>