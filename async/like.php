<?php 
include "../includes/connection.php";

session_start() ;

$flag = "empty";

if(isset($_SESSION['username'])){
	$username = $_SESSION['username'];
	$flag = "true";


	if(isset($_GET['p_id'])){
	  $p_id = $_GET['p_id'];
	  
	  $show_query = "SELECT * FROM likes WHERE like_post_id = $p_id AND like_username = '$username' ";
	  $show_result = mysqli_query($connect, $show_query);
	  while($row=mysqli_fetch_assoc($show_result)){
	       $flag = "false";
	  }

		  if($flag=="false"){
            $dlt_query="DELETE FROM likes WHERE like_post_id = $p_id AND like_username = '$username' ";
            $dlt_result = mysqli_query($connect, $dlt_query);

		  }
		  else{
            $insert_query = "INSERT INTO likes (like_post_id , like_username, like_date) VALUES ($p_id , '$username', now())";
            $insert_result = mysqli_query($connect , $insert_query);
		  }
 
 

   }

}
   echo json_encode($flag) ;

?>