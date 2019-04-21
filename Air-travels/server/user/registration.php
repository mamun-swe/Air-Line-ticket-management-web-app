

<?php
    $check_email_result = "";
    $success = "";
    $userNameErr = $userMailErr = $userPassErr = "";
    
    if(isset($_POST["doRegistration"])) {
        include ('connect.php');

        if(empty($_POST['username'])){
            $userNameErr = "* Username is required";
        }else{
            $userName = mysqli_real_escape_string($conn, $_POST['username']);
        }
        
        if(empty($_POST['usermail'])){
            $userMailErr = "* E-mail is required";
        }else{
            $userMail = mysqli_real_escape_string($conn, $_POST['usermail']);
        }

        if(empty($_POST['password'])){
            $userPassErr = "* Password is required";
        }else{
            $userPass = md5($_POST['password']);
        }
        if(!empty($_POST['username']) && !empty($_POST['usermail']) && !empty($_POST['password'])){
            $check_email = "SELECT * FROM regis_users WHERE user_mail='$userMail'";
            $result_email = mysqli_query($conn, $check_email);

            if (mysqli_num_rows($result_email) > 0) {
                $check_email_result = "This E-mail already taken, please enter another e-mail";
            }else{
                $inesrt = "INSERT INTO regis_users (user_name, user_mail, user_pass) VALUES ('$userName', '$userMail', '$userPass')";
                    if ($conn->query($inesrt) === TRUE) {
                        $success = "Your registration successfull";
                    } else {
                        echo "Error: ";
                    }
		        $conn->close();
            } 
        }
    }
?>