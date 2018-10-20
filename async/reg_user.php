<?php 
include "../includes/connection.php";

if(isset($_GET['isUnique'])){
    
    $flag = "true" ;
    
    $username = $_GET['isUnique'];
    
     $query = "SELECT * FROM users WHERE username = '{$username}' ";
     $result = mysqli_query($connect, $query) ;
    
    while($row = mysqli_fetch_assoc($result)){
    	$flag = "false";
    }

    echo json_encode($flag) ;
    
    
}






?>