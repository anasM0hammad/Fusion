<?php include "includes/connection.php" ; ?>

<?php 

if(isset($_GET['email']) && isset($_GET['hash'])){

  $email = $_GET['email'];
  $hash = $_GET['hash'];

   $email = mysqli_real_escape_string($connect , $email);


  $query = "SELECT * FROM users WHERE user_email = '$email' ";
  $result = mysqli_query($connect, $query) ;
  while($row = mysqli_fetch_assoc($result)){
     $db_hash = $row['user_hash'];
  }

		 if($hash == $db_hash){

		 	$success = "UPDATE users SET user_verified = 1 WHERE user_email = '$email' " ;
		 	$success_res = mysqli_query($connect, $success) ;

		 	header("Location: index.php?verified=yes");
		 }

		 else{
		 	header("Location: index.php?verified=no") ;
		 }


}
else{
	header("index.php");
}





?>