<?php 
include "../includes/connection.php";

if(isset($_GET['p_id'])){

  $flag = "anas";

  echo json_encode($flag);

}

?>