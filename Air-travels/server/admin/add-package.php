
<?php
    $nameErr = $disciptionErr = "";
    $success = "";
    if(isset($_POST["savePackage"])){
        include ('connect.php');
    
        if(empty($_POST['packagename'])){
            $nameErr = "* Name is required";
        }else{
            $name = mysqli_real_escape_string($conn, $_POST['packagename']);
        }

        if(empty($_POST['discription'])){
            $disciptionErr = "* Discription is required";
        }else{
            $disciption = mysqli_real_escape_string($conn, $_POST['discription']);
        }

        // Insert Package
        if(!empty($_POST['packagename']) && !empty($_POST['discription'])){
        
            $inesrt = "INSERT INTO packages (package_name, package_text) VALUES ('$name', '$disciption')";
                if ($conn->query($inesrt) === TRUE) {
                    $success = "New package added successfull";
                } else {
                    echo "Error: ";
                }
		    $conn->close();
        }
    }
?>