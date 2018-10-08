<?php session_start(); ?>


<?php 

    // USER LOGOUT SUCCESSFULLY

     $_SESSION['username'] = NULL ;
     $_SESSION['firstname'] = NULL ;
     $_SESSION['lastname'] = NULL ;
     $_SESSION['role'] = NULL ;
     $_SESSION['email'] = NULL ;
     $_SESSION['user_image'] = NULL ;

    header("Location: ../index.php");





?>