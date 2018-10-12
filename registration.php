<?php include "includes/connection.php" ; ?>



<!doctype html>
<html lang="en">
  <head>
    
    <?php include "includes/links.php" ; ?>  
    
    <!-- EXTERNAL CSS FILE -->
     <link rel="stylesheet" type="text/css" href="css/home.css">
      <style>
          .head{
              text-align: center;
              margin-top: 30px;
          }
      
      </style>
      
    <title>Fusion</title>
  </head>
  <body>
      
      
      <!-- NAVBAR  -->  
      
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php"><img src="img/icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Fusion</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav container justify-content-end list">
      <li class="nav-item active">
          <a class="nav-link" href="index.php"><i class ="fas fa-home"></i> Home<span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-phone"></i> Contact</a>
      </li>    
    </ul>
  </div>
</nav>
      
      <!-- NAVBAR ENDS HERE -->
      
      
      
      
      
      <!--MAIN PAGE HEADER-->
      
<!--
      <div class="header">
      
        <img src="img/icon2.png" class="rounded mx-auto d-block">
        <h2>Welcome to Fusion</h2>
        <p>Fusion is a combination of a blog and a social platform <br><span class = "d-none d-sm-block"> for Developers, Technology enthusiast, students and anyone who loves technology and Science.</span></p>  
      
      
      </div>
-->
      <!--HEADER ENDS HERE -->
      
      
      <h1 class="head"> Membership Form </h1>
      <h4 class="text-muted" style="text-align:center;"><i>It is free for everyone</i></h4>
      
      <!-- REGISTRATION FORM -->
      <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">
        <div class="card bg-light">
          <div class="card-body">
           <form method="post" action="" enctype="multipart/form-data">
              
                <div class="form-group ">
                    <label for="firstname"><b>First Name</b></label>
                  <input type="text" class="form-control" name="firstname">
                </div>
                <div class="form-group ">
                  <label><b>Last Name</b></label>
                  <input type="text" class="form-control" name="lastname">
                </div>
               
              <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email"><b>Email</b></label>
                  <input type="email" class="form-control" placeholder="NoOne@example.com" name="email">
                </div>
                <div class="form-group col-md-6">
                  <label><b>Password</b></label>
                  <input type="password" class="form-control" name="password">
                </div>
              </div>
               
                <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="username"><b>Username</b></label>
                  <input type="text" class="form-control" name="username">
                </div>
                 <div class="form-group col-md-6">
                    <label for="image"><b>Profile Image</b></label>
                    <input type="file" class="form-control-file" name="image" >
                  </div>
               </div>
               <br> 
              
              <button type="submit" class="btn btn-primary btn-sm btn-block" name="register">Register</button>
            </form>
          </div>
        </div>
      </div>
     <div class="col-sm-2"></div>      
    </div>
      
      
      <!--PAGE CONTENT STARTS -->
      
      <div class="container">
        <div class="row">
         <div class="col-md-8">
             

             
             
             

                <br><br><br><br>
             
         </div>
            
            
            
        </div>  <!-- ROW END -->
      </div>    <!-- CONTAINER END -->
      
      
      <!-- FOOTER GOES HERE -->
      <?php include "includes/footer.php" ?>
      
      
      
  </body>
</html>