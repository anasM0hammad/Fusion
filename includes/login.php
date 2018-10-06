<?php include "connection.php" ;?>


<?php 

if(isset($_POST['login'])){
    
     $username = $_POST['username'];
     $password = $_POST['password'];
    
    if(empty($username) || empty($password)){
         header("Location: ../index.php?empty_login=yes");
    }
    
    else{
        
    }
    
    
}




?>