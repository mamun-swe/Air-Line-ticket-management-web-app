
<?php
    $nameErr = $timeErr = "";
    $success = "";
    if(isset($_POST["saveBiman"])){
        include ('connect.php');
        $packageId = $_SESSION['PACKAGE_ID'];
    
        if(empty($_POST['airlinename'])){
            $nameErr = "* Name is required";
        }else{
            $name = mysqli_real_escape_string($conn, $_POST['airlinename']);
        }

        if(empty($_POST['st_time'])){
            $timeErr = "* Time is required";
        }else{
            $stTime = $_POST['st_time'];
        }

        // Insert Package
        if(!empty($_POST['airlinename']) && !empty($_POST['st_time'])){
        
            $inesrt = "INSERT INTO air_lines (package_id, air_line_name, start_time) VALUES ('$packageId', '$name', '$stTime')";
                if ($conn->query($inesrt) === TRUE) {
                    $success = "New air-line added successfull";
                } else {
                    echo "Error: ";
                }
		    $conn->close();
        }
    }
?>