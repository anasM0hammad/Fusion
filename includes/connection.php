<?php  

//connection variables
$db["db_host"] = "localhost";
$db["db_user"] = "root";
$db["db_pass"] = "";
$db["db_name"] = "blog" ;

//convert into constants and in uppercase
foreach($db as $key => $value){
    define(strtoupper($key), $value);
}

$connect = mysqli_connect(DB_HOST , DB_USER , DB_PASS , DB_NAME) ;

if(!$connect){
    die("Database is not Connected");
}





?>