<?php include "includes/connection.php" ; ?>


<!doctype html>
<html lang="en">
  <head>
    
    <?php include "includes/links.php" ; ?>  
    
    <!-- EXTERNAL CSS FILE -->
     <link rel="stylesheet" type="text/css" href="css/home.css">   
      
    <style>
      
        .text{
            text-align: center;
        }
        
    </style>  
      
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
      else{
          header("Location: index.php");
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
    <ul  class="navbar-nav container justify-content-end" >
     <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="far fa-user"></i> <?php echo $firstname . " " . $lastname . " "; ?></a>
        <div class="dropdown-menu drop-link">
          <a class="dropdown-item" href="#"><i class="far fa-user"></i> Profile</a>
          <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Settings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="includes/logout.php"><i class="fas fa-power-off"></i> Log Out</a>
        </div>
      </li> 
     </ul>  
      <?php } ?>
      
    <ul class="navbar-nav container justify-content-end list">
      <li class="nav-item">
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
        
        
       <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-phone"></i> Contact</a>
      </li>

    </ul>
      
  </div>
</nav>
      
      <!-- NAVBAR ENDS HERE -->
     
      
      <!--PAGE CONTENT STARTS -->
      <div class="row">
        <!-- SIDE PANEL -->  
       <div class="col-sm-3">
          <img src="img/<?php echo $image; ?>" class=" mx-auto d-block" height="110" width="110" style="border-radius:50%;"><br>
           <h3 class="text"><?php echo $firstname . " " . $lastname ; ?></h3>
           <h5 class="text-muted text"><?php echo $role; ?></h5>
       </div>
          
        <hr style="transform:rotate(90deg); ">
          
        <!-- MAIN CONTENT -->  
      <div class="col-sm-9">
      
     </div>      
      </div>
      
      
      
     
          
    <br><br><br><br>      
      
      <!-- FOOTER GOES HERE -->
      <?php include "includes/footer.php" ?>
      
      
      
  </body>
</html>