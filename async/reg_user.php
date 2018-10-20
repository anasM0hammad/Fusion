<?php 
include "../includes/connection.php";

if(isset($_GET['isUnique'])){
    
  //  $flag = "false" ;
    
    $username = $_GET['isUnique'];
    
    // $query = "SELECT * FROM users WHERE username = '{$username}' ";
    // $result = mysqli_query($connect, $query) ;
    
  // $flag = mysqli_num_rows($result);

   // if($flag){
   // 	$flag="true";
   //  }

    echo json_encode($_GET['isUnique']) ;
    
    
}






?>