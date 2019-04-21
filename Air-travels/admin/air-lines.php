

<?php
    session_start();
    ob_start();
    if($_SESSION['PACKAGE_ID'] && $sessionId = $_SESSION['userid']){
      $packageId = $_SESSION['PACKAGE_ID'];
      include('../server/admin/connect.php');
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/air-lines.css">
    <title>Air-lines</title>
  </head>
  <body>

    <?php
        include('nav.php');
    ?>

    <div class="container-fluid bookCard py-3">
      <div class="row">
      <?php
        while ($row = mysqli_fetch_assoc($result)){
      ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-2 mb-md-4">
          <div class="card rounded-0 py-3">
            <div class="card-body border-0 text-center">
              <h4 class="h4-responsive"><?php echo $row['air_line_name']; ?></h4>
              <p>Start Time : <?php echo $row['start_time']; ?></p>
              <form method="post">
                <input type="hidden" name="airLineId" value="<?php echo $row['id']; ?>">
                <input type="submit" name="submitAirLine" class="btn btn-primary py-1 px-3 rounded-0 shadow-none" value="Edit Seats">
              </form>
            </div>
          </div>
        </div>
      <?php
        }
        if(isset($_POST['submitAirLine'])){
          $_SESSION['air_line_ID'] = $_POST['airLineId'];
          header('location: total-seat.php');
          ob_flush();
        }
      ?>
      </div>
    </div>

    <!-- <form method="post"> -->
      <div class="float-button">
        <!-- <input type="hidden" name="uniquePackageId" value="<?php echo $packageId ?>"> -->
        <!-- <button type="submit" name="goadd" class="btn btn-info rounded-circle"><i class="fas fa-plus"></i></button> -->
        <a href="add-air-lines.php" class="btn btn-info rounded-circle"><i class="fas fa-plus"></i></a>
      </div>
    <!-- </form> -->

    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>

<?php
    // if(isset($_POST['goadd'])){
    //   $_SESSION['myId']=$_POST['uniquePackageId']
    // }
    }else{
      header('location:  ../views/profile.php');
  }
?>
