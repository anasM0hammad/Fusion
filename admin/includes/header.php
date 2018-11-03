<?php ob_start(); ?>

<?php include "../includes/connection.php"; ?>
<?php session_start(); ?>
<?php include "functions.php" ?>

<?php 

if(!isset($_SESSION['role'])){
    header("Location: ../index.php");
}
 else{
   if($_SESSION['role']!=='Admin')
       header("Location: ../index.php");
}


$query = "SELECT * FROM users WHERE username = '{$_SESSION['username']}' ";
$result = mysqli_query($connect, $query);

while($row = mysqli_fetch_assoc($result)){
  $session_fistname = $row['user_firstname'];
  $session_lastname = $row['user_lastname'];
  $session_id = $row['user_id'];
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


   <!-- STYLE TO LOADING PAGE -->
      <style type="text/css">
        
        #load-screen{
          background-image: url('img/header-back.png');
          position: fixed;
          z-index: 10000 ;
          width: 100%;
          height: 1500px;
        }

        #loading{
          width: 400px;
          height: 400px;
          margin: 10% auto ;
          background-image :url('img/loader.gif') ;
          background-size: 40% ;
          background-repeat: no-repeat;
          background-position: center;
        }

      </style>     
      
   <title>Fusion | Admin</title> 
      
    <!-- GOOGLE CHARTS -->
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

   <!-- JQUERY -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      
    <!-- CKEDITOR -->
   <script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>

   <script type="text/javascript">
     
  //   var div_box = "<div id='load-screen'><div id='loading'></div></div>" ;

     $("body").prepend("hellooooooooooooooooooooooooooooooooooooooooooooooooooooo") ;

     // $("#load-screen").delay(5000).fadeOut(4000, function(){
     //   $(this).remove();

     // });

    


   </script>
   
    
  </head>
  <body>