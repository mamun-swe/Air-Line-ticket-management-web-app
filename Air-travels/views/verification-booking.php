<?php
    session_start();
    ob_start();
    if($_SESSION['selected_seats']){
    //    $bimanId = $_SESSION['air_line_ID'];
    //    include('../server/connect.php');
    //    $select_series = "SELECT * FROM air_lines_seats WHERE air_line_id='$bimanId' AND seat_status=0";
    //     $result = mysqli_query($conn, $select_series);
        echo  $_SESSION['selected_seats'];
    }else{
        header('location:  booking.php');
    }
?>