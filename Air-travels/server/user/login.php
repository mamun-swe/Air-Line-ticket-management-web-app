

<?php

    session_start();
    ob_start();

    $error = "";
    $success = "";
    $userMailErr = $userPassErr = "";
    
    if(isset($_POST["doLogin"])) {
        include ('connect.php');
        
        if(empty($_POST['logmail'])){
            $userMailErr = "* E-mail is required";
        }else{
            $userMail = mysqli_real_escape_string($conn, $_POST['logmail']);
        }

        if(empty($_POST['logpassword'])){
            $userPassErr = "* Password is required";
        }else{
            $userPass = md5($_POST['logpassword']);
        }


        if(!empty($_POST['logmail']) && !empty($_POST['logpassword'])){
            
            $result = mysqli_query($conn, "SELECT * FROM regis_users WHERE user_mail='$userMail' AND user_pass='$userPass'");
            $row  = mysqli_fetch_array($result);

            if($row['user_mail'] == $userMail && $row['user_pass'] == $userPass){
                
                $_SESSION['userid']= $row['id'];
                $_SESSION['usermail']= $row['user_mail'];
                $success = "Login Success";
                header('Location: ../views/profile.php');
                ob_flush();
            }else{
                $error = "Username or Password incorrect, please enter correct Username Password";
            }
        }
    }
?>