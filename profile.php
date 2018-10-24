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
        
        .background{
            border-right: solid #CCC4B4 1px;
            margin-bottom: 80px;
        }
        
        .mybtn{
            border-top-left-radius: 30px;
            border-top-right-radius: 30px;
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
            width: 60%;
        }

        .set_bar{
           border-top-left-radius: 40px;
            border-top-right-radius: 40px;
            border-bottom-left-radius: 40px;
            border-bottom-right-radius: 40px;
            width: 50%;
            background-color: #55B8D2;
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
              $user_id = $row['user_id'];
              $firstname = $row['user_firstname'];
              $lastname = $row['user_lastname'];
              $image = $row['user_image'];
              $role = $row['user_role'];
              $email = $row['user_email'];
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
    <?php //if(isset($_SESSION['username'])){ ?>  
<!--
    <ul  class="navbar-nav container justify-content-end" >
     <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="far fa-user"></i> <?php// echo $firstname . " " . $lastname . " "; ?></a>
        <div class="dropdown-menu drop-link">
          <a class="dropdown-item" href="#"><i class="far fa-user"></i> Profile</a>
          <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Settings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="includes/logout.php"><i class="fas fa-power-off"></i> Log Out</a>
        </div>
      </li> 
     </ul>  
-->
      <?php// } ?>
      
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
      <div class="row ">

        <!-- SIDE PANEL -->  
       <div class="col-sm-3 background">
          <img src="img/<?php echo $image; ?>" class=" mx-auto d-block" height="110" width="110" style="border-radius:50%;"><br>
           <h3 class="text"><?php echo $firstname . " " . $lastname ; ?></h3>
           <h5 class="text-muted text"><?php echo $username; ?></h5><br><br>
           <h5 class="text-muted text"><i class="fas fa-briefcase"></i> <?php echo " ".$role; ?></h5>
           <h5 class="text-muted text"><i class="fas fa-envelope"></i> <?php echo " ".$email; ?></h5><br>
           <p class="text-muted text"><a href=""><i class="fas fa-cog"></i> <b>Edit Profile</b></a></p>
            <br><br>
           <button type="button" class="btn btn-success btn-md mx-auto d-block mybtn"><i class="fab fa-github"></i> <b>Connect</b></button><br>
       </div>
          
          
        <!-- MAIN CONTENT -->  
      <div class="col-sm-9">

        <!-- SETTING BAR -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary mx-auto d-block set_bar" >
       <!--  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
          <ul class="navbar-nav container justify-content-center">
            <li class="nav-item active">
              <a class="nav-link" href="#"><b><i class="fas fa-paste"></i> Posts</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><b><i class="far fa-plus-square"></i> Add Post</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><b><i class="fas fa-cog"></i> Settings</b></a>
            </li>
          </ul>
       <!--  </div> -->
      </nav>

         
        <!-- SETTING BAR ENDS -->



         <!-- USERS ALL POST --> 
         <!-- TABLE -->
             <table class="table table-striped table-hover table-bordered" style="margin-top:50px;">
              <thead>
                 <tr>
                   <th>Title</th>
                   <th>Category</th>
                   <th>Status</th> 
                   <th>Image</th>
                   <th>Tags</th>
                   <th>Comments</th>     
                   <th>Date</th>
                   <th>Edit</th>     
                 </tr>
              </thead>
              <tbody>
                  <?php
                 
                  // SHOW ALL POST OF USER
                  
                   $show_query = "SELECT * FROM posts WHERE post_user_id = $user_id" ;
                   $show_result = mysqli_query($connect , $show_query) ;
                  
                   
                   while($row = mysqli_fetch_assoc($show_result)){
                       
                       $post_id = $row['post_id'];
                       $post_cat_id = $row['post_category_id'];
                       $post_title = $row['post_title'];
                       $post_date = $row['post_date'];
                       $post_image = $row['post_image'];
                       $post_status = $row['post_status'];
                       $post_tags = $row['post_tags'];
                       $post_comment_count = $row['post_comment_count'];
                       
//                       // QUERY TO SHOW NUMBER OF COMMENTS
//                       $count_query = "SELECT * FROM comments WHERE comment_post_id=$post_id";
//                       $count_result = mysqli_query($connect, $count_query);
//                       $count = mysqli_num_rows($count_result);
                       
                       
                        echo "<tr>" ;
                        echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>" ;
                       
                        //GETTING CAT_TITLE USING CAT_ID
                       
                        $cat_query = "SELECT * FROM category WHERE cat_id = {$post_cat_id}" ;
                        $cat_result = mysqli_query($connect, $cat_query);
                        while($row = mysqli_fetch_assoc($cat_result)){
                            $cat_title = $row['cat_title'];

                        echo "<td>$cat_title</td>" ;
                        }
                        echo "<td>$post_status</td>" ;
                        echo "<td><img src='img/$post_image' height ='50' width='100'></td>" ; 
                        echo "<td>$post_tags</td>" ;
                        echo "<td>$post_comment_count</td>"   ; 
                        echo "<td>$post_date</td>"   ;  
                        echo "<td><a href='profile.php?delete={$post_id}'><i class='far fa-times-circle'></i></a> <a class='float-right' href='update_post.php?update={$post_id}'><i class='fas fa-pen'></i></a></td>"   ;  
                        echo"</tr>";
                       
                      
                   }
                  
                  
                  ?>
                
             </tbody>     
             </table>  
       
         
     </div>      
      </div> <!-- MAIN ROW ENDS -->
      
      
      
     
          
    <br><br><br><br>      
      
      <!-- FOOTER GOES HERE -->
      <?php include "includes/footer.php" ?>
      
      
      
  </body>
</html>