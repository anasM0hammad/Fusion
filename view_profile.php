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

        .post_box{
            margin-bottom: 20px;
            line-height: 10px;
        }

        .post_box span {
          float: right;
          color: blue;
        }

        .heading{
          text-align: center;
        }
        
        .set_bar a{
          cursor: pointer;
        }


    </style>  
      
    <title>Fusion</title>
  </head>
  <body>
      
      <?php 
      //QUERY TO FETCH INFO OF VISITOR
      $session_set = 0 ;

      if(isset($_SESSION['username'])){
        $session_set = 1;
        $username =  $_SESSION['username'] ;
          
          $prof_query = "SELECT * FROM users WHERE username = '$username' " ;
          $prof_result = mysqli_query($connect, $prof_query);
          
          while($row = mysqli_fetch_assoc($prof_result)){
              $user_id = $row['user_id'];
              $firstname = $row['user_firstname'];
              $lastname = $row['user_lastname'];
              $image = $row['user_image'];
              $role = $row['user_role'];
             
          }
          
      }
      // else{
      //     header("Location: index.php");
      // }
      
      
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



      <!-- QUERY TO FETCH DATA OF PROFILE OWNER -->
      <?php 

         if(isset($_GET['username'])){

          $pro_username = $_GET['username'];
          
          //IF VISITOR AND PROFILE PERSON IS SAME GO TO PROFILE PAGE 
          if($session_set==1 && $pro_username === $username){
            header("Location: profile.php");
          }
         else{
          // QUERY TO FETCH DATA OF PROFILE OWNER
          $pro_query = "SELECT * FROM users WHERE username = '{$pro_username}' " ;
          $pro_result = mysqli_query($connect, $pro_query);

          while($row = mysqli_fetch_assoc($pro_result)){
            $pro_firstname = $row['user_firstname'];
            $pro_lastname = $row['user_lastname'];
            $pro_role = $row['user_role'];
            $pro_image = $row['user_image'];
            $pro_email = $row['user_email'];
            $pro_user_id = $row['user_id'];
          }
         }


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

         <?php if(isset($_SESSION['username'])){

          echo " <li class='nav-item ''>
        <a class='nav-link' href='message.php' id='mes_alert'><i class='fas fa-envelope'></i> Messages <span class='badge badge-secondary' id='mes_count'>{$count}</span></a>
          </li>" ;

        } ?>
        
        
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
          <img src="img/<?php echo $pro_image; ?>" class=" mx-auto d-block" height="110" width="110" style="border-radius:50%;"><br>
           <h3 class="text"><?php echo $pro_firstname . " " . $pro_lastname ; ?></h3>
           <h5 class="text-muted text"><?php echo $pro_username; ?></h5><br><br>
           <h5 class="text-muted text"><i class="fas fa-briefcase"></i> <?php echo " ".$pro_role; ?></h5>
           <h5 class="text-muted text"><i class="fas fa-envelope"></i> <?php echo " ".$pro_email; ?></h5><br>
           
            <br><br>
           <a href="message.php?sender=<?php echo $pro_username; ?>"><button type="button" class="btn btn-primary btn-md mx-auto d-block mybtn" > <b>Message</b></button></a>
           <br>
       </div>
          
          
        <!-- MAIN CONTENT -->  
      <div class="col-sm-9">       



        <!-- ALL POST STARTS HERE -->

             <div class="row text-muted container">

                  <?php
                 
                  // SHOW ALL POST OF USER
                  
                   $show_query = "SELECT * FROM posts WHERE post_user_id = $pro_user_id" ;
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
                       
                      //  QUERY TO SHOW NUMBER OF COMMENTS
                         $count_query = "SELECT * FROM comments WHERE comment_post_id=$post_id";
                         $count_result = mysqli_query($connect, $count_query);
                         $count = mysqli_num_rows($count_result);
                       
                       
                        //GETTING CAT_TITLE USING CAT_ID
                       
                        $cat_query = "SELECT * FROM category WHERE cat_id = {$post_cat_id}" ;
                        $cat_result = mysqli_query($connect, $cat_query);
                        while($row = mysqli_fetch_assoc($cat_result)){
                           $cat_title = $row['cat_title'];

                       }
                  
                  
                  ?>

    
            
           

            <div class="col-sm-6 "> 
             <div class="card post_box">
               <div class="card-header" style="text-align: center;"><b><a href="post.php?p_id=<?php echo $post_id ;?>"><?php echo $post_title ; ?></a></b></div>
              <div class="card-body">
                <img src="img/<?php echo $post_image; ?>" class="img-fluid mx-auto d-block" style="height: 120px; width: 100%;"><br><br>

                <p><b>Category  : <span><?php echo $cat_title; ?></span></b></p>
                <p><b>Status    : <span><?php echo $post_status; ?></span> </b></p>
                <p><b>Comments  : <span><?php echo $count ; ?></span></b></p>
                <p><b>Date      : <span><?php echo $post_date ; ?></span></b></p>
                <p><b>Tags      : <span><?php echo $post_tags ?></span></b></p>

               
              </div>
            </div>
          </div>


          <!-- QUERY TO FETCH ANOTHER POST DETAILS IN SINGLE LOOP-->


         <?php $row = mysqli_fetch_assoc($show_result); ?>
         <?php   if($row){

                 $post_id = $row['post_id'];
                 $post_cat_id = $row['post_category_id'];
                 $post_title = $row['post_title'];
                 $post_date = $row['post_date'];
                 $post_image = $row['post_image'];
                 $post_status = $row['post_status'];
                 $post_tags = $row['post_tags'];
                

                  //GETTING CAT_TITLE USING CAT_ID
                 
                  $cat_query = "SELECT * FROM category WHERE cat_id = {$post_cat_id}" ;
                  $cat_result = mysqli_query($connect, $cat_query);
                  while($row = mysqli_fetch_assoc($cat_result)){
                     $cat_title = $row['cat_title'];

                 }

                  //  QUERY TO SHOW NUMBER OF COMMENTS
                     $count_query = "SELECT * FROM comments WHERE comment_post_id=$post_id";
                     $count_result = mysqli_query($connect, $count_query);
                     $count = mysqli_num_rows($count_result);

             ?>
          


           <div class="col-sm-6 "> 
             <div class="card post_box">
               <div class="card-header" style="text-align: center;"><b><a href="post.php?p_id=<?php echo $post_id ;?>"><?php echo $post_title ; ?></a></b></div>
              <div class="card-body">
                <img src="img/<?php echo $post_image; ?>" class="img-fluid mx-auto d-block" style="height: 120px; width: 100%;"><br><br>

                <p><b>Category  : <span><?php echo $cat_title; ?></span></b></p>
                <p><b>Status    : <span><?php echo $post_status; ?></span> </b></p>
                <p><b>Comments  : <span><?php echo $count ; ?></span></b></p>
                <p><b>Date      : <span><?php echo $post_date ; ?></span></b></p>
                <p><b>Tags      : <span><?php echo $post_tags ?></span></b></p>

               
              </div>
            </div>
          </div>

   <?php   } // IF CONDITION ENDS
          } ?>

           </div> <!-- POST BOX ROW ENDS -->


        

         
     </div>  <!-- MAIN CONTENT ENDS -->  
      </div> <!-- MAIN ROW ENDS -->
      
      
      
     
          
    <br><br><br><br>      
      
      <!-- FOOTER GOES HERE -->
      <?php include "includes/footer.php" ?>
      
      
      
      
  </body>
</html>