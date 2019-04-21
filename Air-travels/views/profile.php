
<?php
    include('../server/user/profile.php');
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
    <link rel="stylesheet" href="../css/profile.css">
    <title><?php echo $selected_user_name; ?></title>
  </head>
  <body>

    <header>
        <div class="headBox flex-center flex-column text-center">
            <img src="../images/avatar.png" class="img-fluid">
            <h4 class="h4-responsive text-white mb-0">Welcome <?php echo $selected_user_name; ?></h4>
            <p class="text-white mb-3"><?php echo $selected_user_mail; ?></p>
            <form method="post">
                <input type="submit" name="logout" value="Logout" class="btn btn-outline-dark px-3 py-1 rounded-0 shadow-none" />
            </form>
        </div>
    </header>


    <div class="container py-3 py-lg-5 packages">
      <div class="row">
        <div class="col-12 text-center mb-5">
          <h4 class="h4-responsive text-muted">Choose Package</h4>
        </div>


        <?php
          include('../server/connect.php');
          $select_package = "SELECT * FROM packages";
          $result = mysqli_query($conn, $select_package);
            while ($row = mysqli_fetch_array($result)){
              echo "<div class='col-12 col-sm-6 col-lg-3 mb-4'>";
                echo "<div class='card rounded-0'>";
                  echo "<div class='card-body text-center'>";
                    echo "<h5 class='h5-responsive'>".$row['package_name']."</h5>";
                    echo "<p>Hello user this is our 1st class Package</p>";
                    
                    $packageId = $row['id'];

                    echo "<form method='post'>";

                      echo "<input type='hidden' value='$packageId' name='packageId'>";
                      echo "<input type='submit' name='submitPackageId' value='Book Now' class='btn btn-outline-primary py-1 px-2 shadow-none rounded-0'>";
                        if(isset($_POST['submitPackageId'])){
                          $_SESSION['PACKAGE_ID'] = $_POST['packageId'];
                          header('location: air-lines.php');
                          ob_flush();
                        }

                    echo "</form>";
                  echo "</div>";
                echo "</div>";
              echo "</div>";
            }
        ?>

      </div>
    </div>

  <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>