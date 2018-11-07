<?php include "includes/connection.php" ; ?>


<!doctype html>
<html lang="en">
  <head>
    
    <?php include "includes/links.php" ; ?>  
    
    <!-- EXTERNAL CSS FILE -->
     <link rel="stylesheet" type="text/css" href="css/home.css">    
      
    <title>Fusion</title>
  </head>
  <body>
      
      
     <?php 
      //QUERY TO SHOW INFO OF USER IN PROFILE BAR
      
      if(isset($_SESSION['username'])){
        $username =  $_SESSION['username'] ;
          
          $prof_query = "SELECT * FROM users WHERE username = '$username' " ;
          $prof_result = mysqli_query($connect, $prof_query);
          
          while($row = mysqli_fetch_assoc($prof_result)){
              $firstname = $row['user_firstname'];
              $lastname = $row['user_lastname'];
              $image = $row['user_image'];
              $role = $row['user_role'];
          }
          
      }
      
      
      ?>



        <?php
     if(isset($_SESSION['username'])){
      //COUNTING NUMBER OF UNREAD MESSAGES
      $unread = "SELECT * FROM message WHERE message_receiver = '$username' AND message_read = 0 " ;
      $unread_result = mysqli_query($connect, $unread) ;
      $count = mysqli_num_rows($unread_result);


      ?>


      <?php if($count>0){ ?>
        <style type="text/css">
          #mes_alert{
            color: white;
          }
          #mes_count{
            color: white;
          }
        </style>
      <?php } else{ ?>
        <style type="text/css">
          #mes_alert{
            color: #CCCECF;
          }
          #mes_count{
            color: #CCCECF ;
          }
        </style>
      <?php }
       }
      ?>
      
      
      <!-- NAVBAR  -->  
      
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php"><img src="img/icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Fusion</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
    <!-- PROFILE BAR -->  
    <?php if(isset($_SESSION['username'])){ ?>  
    <ul  class="navbar-nav container justify-content-end " >
     <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="far fa-user"></i> <?php echo $firstname . " " . $lastname . " "; ?></a>
        <div class="dropdown-menu drop-link">
          <a class="dropdown-item" href="profile.php"><i class="far fa-user"></i> Profile</a>
          <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Settings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="includes/logout.php"><i class="fas fa-power-off"></i> Log Out</a>
        </div>
      </li> 
     </ul>  
      <?php } ?>
      
    <ul class="navbar-nav container justify-content-end list">
      <li class="nav-item active">
          <a class="nav-link" href="index.php"><i class ="fas fa-home"></i> Home<span class="sr-only">(current)</span></a>
      </li>
        
        
        <?php if(isset($_SESSION['username'])){ 
              if($role == 'Admin'){   
          
            echo  "<li class='nav-item'>
                <a class='nav-link' href='admin/index.php'><i class='fas fa-globe'></i> Admin</a>
              </li>";  } 
        } ?>
        
        
        <?php if(!isset($_SESSION['username'])){ ?>
      <li class="nav-item">
        <a class="nav-link" href="registration.php"><i class="fas fa-user-plus"></i> Register</a>
      </li>
        <?php }?>

          <?php if(isset($_SESSION['username'])){

          echo " <li class='nav-item ''>
        <a class='nav-link' href='message.php' id='mes_alert'><i class='fas fa-envelope'></i> Messages <span class='badge badge-secondary' id='mes_count'>{$count}</span></a>
          </li>" ;

        } ?>
        
        
       <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-users" id="online"></i> Online <span class='badge badge-secondary' id='online_count'></span></a>
      </li>

    </ul>
      
  </div>
</nav>
      
      
      
      
      
      <!--MAIN PAGE HEADER-->
      
      <div class="header">
      
        <img src="img/icon2.png" class="rounded mx-auto d-block">
        <h2>Welcome to Fusion</h2>
        <p>Fusion is a combination of a blog and a social platform <br><span class = "d-none d-sm-block"> for Developers, Technology enthusiast, students and anyone who loves technology and Science.</span></p>  
      
      
      </div>
      <!--HEADER ENDS HERE -->
      


      
      
      
      
      <!--PAGE CONTENT STARTS -->
      
      <div class="container">
        <div class="row">
         <div class="col-md-8">
             
         <div class="user_box">
          <hr>
           <div class="row" style="margin: 0;">
            <div class="col-sm-2"> 
             <img src="img/aru.jpg" style="border-radius: 50% ;" width="80" height="80" class="mx-auto d-block">
            </div>
            

            <div class="col-sm-4" style="text-align: center;">
              <a href="view_profile.php?username="><h4 class="text-muted"> Areesha Fatima</h4></a>
              <h5 class="text-muted"> aruu123</h5>
            </div>
           
           <div class="col-sm-6"></div>
           
         </div><br>
         </div>

         
          
             
             
                
                <br><br><br><br>
                
                  
            
            
        
          </div>  
            
            
        <!-- SIDE BOXES OF PAGES -->    
        <?php include "includes/sidebox.php" ;  ?>   
            
            
            
            
        </div>  <!-- ROW END -->
      </div>    <!-- CONTAINER END -->
      
      
      <!-- FOOTER GOES HERE -->
      <?php include "includes/footer.php" ?>
      
       <script type="text/javascript" src="js/online.js"></script>
      
      
  </body>
</html>