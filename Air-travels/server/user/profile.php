

<?php
    session_start();
    ob_start();

    include('logout.php');
    $selected_user_name = "";
    $selected_user_mail = "";

    if($_SESSION['userid']){
        $sessionId = $_SESSION['userid'];
        include('connect.php');
        $select_user = "SELECT * FROM regis_users WHERE id='$sessionId'";
        $result = mysqli_query($conn, $select_user);
        while ($row = mysqli_fetch_array($result)){
           $selected_user_name = $row['user_name'];
           $selected_user_mail = $row['user_mail'];
        }
    }else{
        header('location:  ../views/index.html');
    }
?>