<?php ob_start(); ?>

<?php include "../includes/connection.php"; ?>
<?php session_start(); ?>
<?php include "functions.php" ?>

<?php 

if(isset($_SESSION['role'])){
    
    if($_SESSION['role']!=='Admin'){
        header("Location: ../index.php");
    }
    
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      
    <!-- FONT AWESOME -->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">  

   <link href="img/icon.png" rel="icon" type="image/gif">

    <!-- EXTERNAL CSS FILE -->  
   <link href="admin.css" type="text/css" rel="stylesheet">      
      
   <title>Fusion | Admin</title> 
      
      
  </head>
  <body>