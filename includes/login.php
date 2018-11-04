<?php include "connection.php" ;?>
<?php session_start(); ?>


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
            $db_email = $row['user_email'];
            $db_image = $row['user_image'];
            
        }
        
        
        if($username !== $db_username && $password !== $db_password){
            header("Location: ../index.php?login=fail");
        }
        
        else if($username === $db_username && $password === $db_password){
            // USER LOGIN SUCCESSFULLY
            
             $_SESSION['username'] = $db_username ;
             $_SESSION['firstname'] = $db_firstname ;
             $_SESSION['lastname'] = $db_lastname ;
             $_SESSION['role'] = $db_role ;
             $_SESSION['email'] = $db_email ;
             $_SESSION['user_image'] = $db_image ;

             //QUERY TO MAKE USER ONLINE
             $online = "UPDATE users SET user_online =1 WHERE username = '$username' " ;
             $result = mysqli_query($connect,$online);
            
            header("Location: ../admin");
        }
        
        else{
            header("Location: ../index.php?login=fail");
        }
        
    }
    
    
}




?>