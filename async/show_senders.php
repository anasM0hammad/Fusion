<?php 

include "../includes/connection.php" ;

 if(isset($_GET['user_id'])){

   $user_id = $_GET['user_id'];

   // QUERY TO FETCH USERNAME USING USER ID

   $user_query = "SELECT * FROM users WHERE user_id = $user_id ";
   $user_result = mysqli_query($connect , $user_query);
   $user_row = mysqli_fetch_assoc($user_result);
   $username = $user_row['username'] ;

   // QUERY TO SEND ALL THE SENDERS LISTS
   $sender = 0;

   $sender_query = "SELECT DISTINCT message_sender FROM message WHERE  message_receiver = '$username' ORDER BY message_sender DESC ";
   $sender_result = mysqli_query($connect, $sender_query);
   while($row=mysqli_fetch_assoc($sender_result)){
   	 $message_sender = $row['message_sender'];
     $sender_list[$sender]['sender'] = $row['message_sender'];

       $sender_list[$sender]['date'] = 0;

       $message_sender = $row['message_sender'];

   	//CALCULATING NUMBER OF UNREAD MESSAGES FOR PARTICULAR USER
   	$unread = "SELECT * FROM message WHERE message_read = 0 AND message_sender = '$message_sender' AND message_receiver = '$username' ";
   	$unread_res = mysqli_query($connect , $unread);
   	while($unread_row = mysqli_fetch_assoc($unread_res)){
      $sender_list[$sender]['date'] =  $sender_list[$sender]['date'] + 1 ;
   	}

   
    $sender++ ;

   }



  echo json_encode($sender_list);

 }

?>