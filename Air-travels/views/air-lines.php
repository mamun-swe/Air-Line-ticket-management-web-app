

<?php
    session_start();
    ob_start();
    if($_SESSION['PACKAGE_ID']){
      $packageId = $_SESSION['PACKAGE_ID'];
      include('../server/connect.php');
      $select_air_line = "SELECT * FROM air_lines WHERE package_id='$packageId'";
      $result = mysqli_query($conn, $select_air_line);
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet"> 
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/air-lines.css">
    <title>Booking</title>
  </head>
  <body>
    <header>
        <div class="main text-center flex-center mt-3">
            <h1 class="h1-responsive">Choose Your Dream Air-Line</h1>
        </div>
    </header>

    <div class="container bookCard py-3 py-sm-5">
      <div class="row">
      <?php
        while ($row = mysqli_fetch_assoc($result)){
      ?>
        <div class="col-12 col-sm-6 col-md-4 mb-2 mb-lg-4">
          <div class="card rounded-0 py-3">
            <div class="card-body border-0 text-center">
              <h4 class="h4-responsive"><?php echo $row['air_line_name']; ?></h4>
              <p>Start Time : <?php echo $row['start_time']; ?></p>
              <form method="post">
                <input type="hidden" name="airLineId" value="<?php echo $row['id']; ?>">
                <input type="submit" name="submitAirLine" class="btn btn-primary py-1 px-2 rounded-0 shadow-none" value="Check Booking">
              </form>
            </div>
          </div>
        </div>
      <?php
        }
        if(isset($_POST['submitAirLine'])){
          $_SESSION['air_line_ID'] = $_POST['airLineId'];
          header('location: booking.php');
          ob_flush();
        }
      ?>
      </div>
    </div>

    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>

<?php
    }else{
      header('location:  ../views/profile.php');
  }
?>
