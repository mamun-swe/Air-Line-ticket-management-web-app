
<?php
    include('../server/admin/dashboard.php');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fugaz+One" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin-dashboard.css">
    <title>Welcome Admin</title>
</head>

<body>

    <?php
        include('nav.php');
    ?>

    <!-- Header -->
    <div class="container-fluid px-4 pt-0 headBoxs">
        <div class="row">
            <div class="col-12 col-md-6 py-lg-2 flex-center text-center flex-column">
                <div class="card rounded-0 border-0">
                    <div class="card-body text-center">
                        <h2 class="h2-responsive text-success">244</h2>
                        <h5 class="h5-responsive">Total Passengers</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 py-lg-2 flex-center text-center flex-column">
                <div class="card rounded-0 border-0">
                    <div class="card-body text-center">
                        <h2 class="h2-responsive text-warning">244</h2>
                        <h5 class="h5-responsive">Total Requests</h5>
                        <a href="requests.php" class="btn btn-outline-warning py-1 px-3 shadow-none rounded-0">View Requests</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Packages -->
    <div class="container-fluid py-4 packages mb-3">
        <div class="row">
            <?php
                include('../server/admin/connect.php');
                $select_package = "SELECT * FROM packages";
                $result = mysqli_query($conn, $select_package);
                    while ($row = mysqli_fetch_array($result)){
                    echo "<div class='col-12 col-sm-6 col-lg-3 mb-2 mb-md-4'>";
                        echo "<div class='card rounded-0 border-0 py-3'>";
                        echo "<div class='card-body text-center'>";
                            echo "<h4 class='h4-responsive'>".$row['package_name']."</h4>";
                            echo "<p>".$row['package_text']."</p>";
                            
                            $packageId = $row['id'];

                            echo "<form method='post'>";

                            echo "<input type='hidden' value='$packageId' name='packageId'>";
                            echo "<input type='submit' name='submitPackageId' value='View Travels' class='btn btn-primary py-1 px-3 shadow-none rounded-0'>";
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