<?php include "connection.php" ;?>


<?php 

if(isset($_POST['login'])){
    
     $username = $_POST['username'];
     $password = $_POST['password'];
    
    if(empty($username) || empty($password)){
         header("Location: ../index.php?empty_login=yes");
    }
    
    else{
        
        $username = mysqli_real_escape_string($connect, $username);
        $password = mysqli_real_escape_string($connect, $password);
        
        $comp_query = "SELECT * FROM users WHERE username = '$username'" ;
        $comp_result = mysqli_query($connect , $comp_query);
        
        if(!$comp_query){
            die("QUERY FAILED ".mysqli_error($connect));
        }
        
        
        while($row = mysqli_fetch_assoc($comp_result)){
            
            $db_id = $row['user_id'];
            $db_firstname = $row['user_firstname'];
            $db_lastname = $row['user_lastname'];
            $db_role = $row['user_role'];
            $db_password = $row['user_password'];
            $db_username = $row['username'];
            
        }
        
        
        if($username !== $db_username && $password !== $db_password){
            header("Location: ../index.php?login=fail");
        }
        
        else if($username == $db_username && $password == $db_password){
            
            header("Location: ../admin");
        }
        
        else{
            header("Location: ../index.php");
        }
        
    }
    
    
}




?>