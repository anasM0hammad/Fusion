<?php 
include "../includes/connection.php";

session_start() ;

$like_obj['flag'] = "empty";


if(isset($_SESSION['username'])){
	$username = $_SESSION['username'];
	$like_obj['flag'] = "true";

	//CHECKING THE VERIFIED USER
	$verify_query = "SELECT * FROM users WHERE username = '$username' " ;
	$verify_result = mysqli_query($connect , $verify_query) ;
	$row = mysqli_fetch_assoc($verify_result);
	$verified = $row['user_verified'] ;




	if(isset($_GET['p_id']) && $verified == 1){
	  $p_id = $_GET['p_id'];
	  
	  $show_query = "SELECT * FROM likes WHERE like_post_id = $p_id AND like_username = '$username' ";
	  $show_result = mysqli_query($connect, $show_query);
	  while($row=mysqli_fetch_assoc($show_result)){
	  	   $liked = $row['liked'];
	       $like_obj['flag'] = "false";
	  }

		  if($like_obj['flag']=="false" && $liked==1 ){
            $upd_query="UPDATE likes SET liked = 0 WHERE like_post_id = $p_id AND like_username = '$username' ";
            $upd_result = mysqli_query($connect, $upd_query);

		  }
		  else if($like_obj['flag']=="false" && $liked == 0){
            $upd_query="UPDATE likes SET liked = 1 WHERE like_post_id = $p_id AND like_username = '$username' ";
            $upd_result = mysqli_query($connect, $upd_query);
            $like_obj['flag']="true";
		  }
		  else{
            $insert_query = "INSERT INTO likes (like_post_id , like_username, like_date, liked) VALUES ($p_id , '$username', now() , 1)";
            $insert_result = mysqli_query($connect , $insert_query);
		  }
        
        $like_obj['noOfLike'] = 0;
        $like_query = "SELECT * FROM likes WHERE like_post_id = $p_id AND liked = 1 ";
        $like_result = mysqli_query($connect , $like_query);
        while($row=mysqli_fetch_assoc($like_result)){
        	$like_obj['noOfLike'] = $like_obj['noOfLike']+1 ;
        }    

 
   }

   if($verified == 0){
   	$like_obj['flag']="not_verified";
   }

}
   echo json_encode($like_obj) ;

?>