<?php
    session_start();
    ob_start();
    if($_SESSION['air_line_ID']){
       $bimanId = $_SESSION['air_line_ID'];
       include('../server/connect.php');
       $select_series = "SELECT * FROM air_lines_seats WHERE air_line_id='$bimanId' AND seat_status=0";
        $result = mysqli_query($conn, $select_series);
                
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet"> 
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/booking.css">
    <title>Booking</title>
  </head>
  <body>

        <header>
            <div class="box text-center pt-5">
                <h1 class="h1-responsive">Select Your Lovely Seat</h1>
            </div>
        </header>

        <div class="container main">
            <div class="row">
                <div class="col-12 col-md-8 m-auto">
                    <div class="card">
                        <div class="card-body px-0 px-sm-3">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col text-center">
                                    <h5 class="h5-responsive mb-3">Avilable Seats</h5>
                                            
                                        <form method="post" style="width: 100%;">
                                            <div class="row">
                                                <?php 
                                                    while ($row = mysqli_fetch_assoc($result)){
                                                        $seatId = $row['id'];
                                                ?>
                                                <div class="col-6 col-md-2 text-center mb-2 px-2">
                                                    <div class="border p-2">
                                                        <h5 class="h5-responsive mb-0"><?php echo $row['seat'] ?>-<?php echo $row['category'] ?></h5>
                                                        <?php
                                                        echo "<input type='checkbox' name='seatValue[]' value='".$row['id']."' class='form-control'>";
                                                        ?>
                                                    </div>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                            <button type="submit" name="confirmSeat" class="btn btn-primary py-1 px-3 rounded-0 shadow-none mt-2">Confirm Booking</button>
                                        </form>
                                            
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- 
        <div class="modal fade" id="bookModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="confirmSeat" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
        </div> -->




    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>

<?php
    }else{
        header('location:  air-lines.php');
    }

    if(isset($_POST['confirmSeat'])){
        
        if(!empty($_POST['seatValue'])) {
            foreach($_POST['seatValue'] as $mySeatValue){
                $mySeatValue;
                $mail = $_SESSION['usermail'];

                include('../server/connect.php');
                $sql = "INSERT INTO requests (seatId, request_email) VALUES ('$mySeatValue', '$mail')";

                if ($conn->query($sql) === TRUE) {
                    echo "Your request pending to admin";
                } else {
                    echo "Error updating record: " . $conn->error;
                }

                $conn->close();
            }
        }
    }
?>