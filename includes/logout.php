<?php session_start(); ?>


<?php 


     //QUERY TO MAKE USER OFFLINE
     $offline_username = $_SESSION['username'];
     $offline = "UPDATE users SET user_online = 0 WHERE username = '$offline_username' " ;
     $result = mysqli_query($connect , $offline);

    // USER LOGOUT SUCCESSFULLY

     $_SESSION['username'] = NULL ;
     $_SESSION['firstname'] = NULL ;
     $_SESSION['lastname'] = NULL ;
     $_SESSION['role'] = NULL ;
     $_SESSION['email'] = NULL ;
     $_SESSION['user_image'] = NULL ;


    header("Location: ../index.php");





?>