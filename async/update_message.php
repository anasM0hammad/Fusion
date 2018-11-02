<?php 

include "../includes/connection.php" ;

if(isset($_GET['sender'])){

$sender_id = $_GET['sender'];
$receiver_id = $_GET['receiver'];

//FETCHING RECEIVER USERNAME
$r_query = "SELECT * FROM users WHERE user_id = $receiver_id ";
$r_result = mysqli_query($connect , $r_query) ;
$r_row = mysqli_fetch_assoc($r_result);
$receiver = $r_row['username'];


//FETCHING SENDER USERNAME
$s_query = "SELECT * FROM users WHERE user_id = $sender_id ";
$s_result = mysqli_query($connect , $s_query) ;
$s_row = mysqli_fetch_assoc($s_result);
$sender = $s_row['username'];


//FETCHING MESSAGE
$flag = "false" ;

 $m_query = "SELECT * FROM message WHERE ( message_sender = '$receiver' AND message_receiver = '$sender') AND message_read = 0 ";
 $m_result = mysqli_query($connect , $m_query);

 while($m_row = mysqli_fetch_assoc($m_result)){
   $flag = "true" ;    
 }

 echo json_encode($flag);

}





?>