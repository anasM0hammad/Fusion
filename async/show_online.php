<?php 
include "../includes/connection.php";

$count = 0 ;

$count_online = "SELECT * FROM users WHERE user_online = 1 ";
$count_result = mysqli_query($connect , $count_online);

if(!$count_result){
	$count = mysqli_error($connect);
}

while($row = mysqli_fetch_assoc($count_result)){
    $count++ ;
}

if($count>0){
 $count = $count-1 ;   // NOT COUNTING THE USER USING WEBSITE RIGHT NOW
}

echo json_encode($count);

?>