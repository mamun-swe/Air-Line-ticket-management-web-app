
<?php
    include ('../server/admin/connect.php');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/request.css">
    <title>Requests</title>
</head>
<body>

    <?php
        include ('nav.php');
    ?>

    <div class="container">
        <div class="row">
            <?php
                $select = "SELECT * FROM requests WHERE status=0";
                $result = mysqli_query($conn, $select);
                    while ($row = mysqli_fetch_array($result)){
                        
            ?>
            <div class="col-12 mt-2">
                <div class="card">
                    <div class="card-body bg-white">
                        <div class="d-flex">
                            <div class="p-2"><?php echo $row['seatId']; ?></div>
                            <div class="p-2"><?php echo $row['request_email']; ?></div>
                            <div class="ml-auto p-2">
                                <form method="post">
                                    <input type="hidden" name="mySeat" value="<?php echo $row['seatId']; ?>">
                                    <button type="submit" name="bookseta" class="btn btn-warning py-0 px-2 rounded-0 shadow-none">Approve</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>


        </div>
    </div>




    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>

<?php
    if(isset($_POST['bookseta'])){
        $Id = $_POST['mySeat'];
        include ('../server/admin/connect.php');
        $sql = "UPDATE air_lines_seats SET seat_status=1 WHERE id='$Id'";

        if ($conn->query($sql) === TRUE) {
            $update = "UPDATE requests SET status=1 WHERE seatId='$Id'";
                if ($conn->query($update) === TRUE) {
                    echo "Request approved successfully";
                } else {
                    echo "Error approved request: " . $conn->error;
                }
        } else {
            echo "Error: " . $conn->error;
        }
    }
?>