<?php
    session_start();
    ob_start();
    if($_SESSION['userid'] && $_SESSION['air_line_ID'] && $_SESSION['PACKAGE_ID'] && $_SESSION['air_line_ID']){
        $planeId = $_SESSION['air_line_ID'];
        include ('../server/admin/connect.php');
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> 
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/total-seat.css">
    <title>Seats</title>
  </head>
  <body>

        <div class="container">
            <div class="row">
                <div class="col-12 mt-3 text-center flex-center" style="height: 80vh;">
                    <div class="d-flex flex-wrap">
                    <?php
                        $select="SELECT * FROM air_lines_seats WHERE air_line_id='$planeId'";
                        $result = $conn->query($select);
                
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                if($row['seat_status'] == 1){
                    ?>
                        <div class='p-3 seats m-1' style='background: #fe5959;border: 1px solid #fe5959;color: #ffffff;'><?php echo $row['seat']; ?>-<?php echo $row['category']; ?></div>
                    <?php
                        }
                    ?>
                    <?php
                        if($row['seat_status'] == 0){
                    ?>
                        <div class="p-3 seats m-1" style="border: 1px solid #f1f1f1;"><?php echo $row['seat']; ?>-<?php echo $row['category']; ?></div>
                    <?php
                        }
                    ?>
                    
                    <?php
                            }
                        } else {
                    ?>
                    
                        <div class="text-center m-auto">
                            <h3 class="h3-responsive text-muted"><?php echo "No seats are added here !!"; ?></h3>
                        </div>
                        

                        <?php
                            }
                            $conn->close();
                        ?>
                    </div>
                </div>
            </div>
        </div>


        <!-- Seat Add Modal Start -->
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                <button type="button" class="btn btn-info shadow-none rounded-0 py-1 px-3 m-auto" data-toggle="modal" data-target="#seatadd">
                    Add New Seat
                </button>
                </div>
            </div>
        </div>

        <div class="modal fade" id="seatadd">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h5 class="h5-responsive modal-title mb-3">Add new seat</h5>
                        <form method="post">
                            <div class="form-group">
                                <select class="form-control form-control-sm rounded-0 shadow-none" name="seatType">
                                    <option class="selected">Select Seat Type</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control form-control-sm rounded-0 shadow-none" name="category">
                                    <option class="selected">Choose Category</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-info py-1 px-3 rounded-0 shadow-none float-right" data-dismiss="modal">Cancle</button>
                            <button type="submit" name="saveSeat" class="btn btn-primary py-1 px-3 mr-1 rounded-0 shadow-none float-right">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Seat Add Modal -->

    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>

<?php
    if(isset($_POST['saveSeat'])){
        $planeId;
        $type = $_POST['seatType'];
        $catg = $_POST['category'];
        // Insert New Seat
        include ('../server/admin/connect.php');
            $inesrt = "INSERT INTO air_lines_seats (air_line_id, seat, category, seat_status) VALUES ('$planeId', '$type', '$catg', 0)";
                if ($conn->query($inesrt) === TRUE) {
                    echo "New seat added successfull";
                } else {
                    echo "Error: ";
                }
		    $conn->close();
    }
    }else{
        header('location:  air-lines.php');
    }
?>