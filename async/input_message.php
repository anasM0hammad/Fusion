<?php 

include "../includes/connection.php" ;


if(isset($_GET['sender'])){
  
  $sender_id = $_GET['sender'] ;
  $receiver_id = $_GET['receiver'];
  $message = $_GET['message'];

  if(empty($message)){
  	echo json_encode("false");
  }else{

  //QUERY TO FETCH USERNAME OF SENDER

  $sender_query = "SELECT * FROM users WHERE user_id = $sender_id";
  $sender_result = mysqli_query($connect , $sender_query);
  $sender_row = mysqli_fetch_assoc($sender_result);
  $sender = $sender_row['username'];


 //QUERY TO FETCH USERNAME OF RECEIVER
  $receiver_query = "SELECT * FROM users WHERE user_id = $receiver_id";
  $receiver_result = mysqli_query($connect , $receiver_query);
  $receiver_row = mysqli_fetch_assoc($receiver_result);
  $receiver = $receiver_row['username'];



  //QUERY TO INSERT MESSAGE INTO TABLE
  $message_query = "INSERT INTO message (message_content , message_sender , message_receiver , message_date , message_time) VALUES ('{$message}' , '{$sender}' , '{$receiver}' , now() , current_time())" ;
  $message_result = mysqli_query($connect , $message_query) ;
  if(!$message_result){
  	echo json_encode("false");
  }else{
    echo json_encode("true");
  }

   }
}




?>