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
              $password = $row['user_password'];
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

      

      <!-- QUERY TO DELETE USER -->
      <?php 
       if(isset($_GET['delete_acc'])){

          if($_GET['delete_acc']=='success'){

            ?>

            <script type="text/javascript">
             var confirm = confirm("Are You Sure You Want to Delete your Account? All Your Posts Will be Deleted!");
             
             window.location.href=`profile.php?confirm=${confirm}`;

            </script>

            <?php

          }
         } 



       
          // CATCHING THE CONFIRM DELETE REQUEST
         if(isset($_GET['confirm'])){

          if($_GET['confirm']==true){

            $query = "DELETE FROM users WHERE user_id = $user_id ";
            $result = mysqli_query($connect, $query);

            $post_dlt_q = "DELETE FROM posts WHERE post_user_id = $user_id";
            $post_result = mysqli_query($connect, $post_dlt_q);

            if(!$result){
              die("QUERY FAILED");
            }
            else{
             header("Location: includes/logout.php");  
            }
  
      }
          
           else{
             header("Location: profile.php");
           }

    
    }

      ?>


      
      
      <!--PAGE CONTENT STARTS -->
      <div class="row ">

        <!-- SIDE PANEL -->  
       <div class="col-sm-3 background">
          <img src="img/<?php echo $image; ?>" class=" mx-auto d-block" height="110" width="110" style="border-radius:50%;"><br>
           <h3 class="text"><?php echo $firstname . " " . $lastname ; ?></h3>
           <h5 class="text-muted text"><?php echo $username; ?></h5><br><br>
           <h5 class="text-muted text"><i class="fas fa-briefcase"></i> <?php echo " ".$role; ?></h5>
           <h5 class="text-muted text"><i class="fas fa-envelope"></i> <?php echo " ".$email; ?></h5><br>
           <p class="text-muted text"><a href="profile.php?delete_acc=success" ><b><i class="fas fa-trash-alt"></i> Delete Account</b></a></p>
            <br><br>
           <button type="button" class="btn btn-success btn-md mx-auto d-block mybtn"><i class="fab fa-github"></i> <b>Connect</b></button><br>
       </div>
          
          
        <!-- MAIN CONTENT -->  
      <div class="col-sm-9">

        <div class="card" >
          <div class="card-body">
         <h2 class="heading"><b><i class="fas fa-pen"></i> Update Post Details</b></h2><hr><br> 
            
        <form class="container" action="" method="post" enctype="multipart/form-data">
         
            <div class="form-group">
             <label for="title"><b>Title</b></label>
             <input type="text" class="form-control" placeholder="Title" name="title">
            </div>
                 
          <div class="form-row">
              
            <div class="form-group col-md-6">
                <label for="category"><b>Category</b></label>
                <select class="form-control" name="post_category">
                  <?php
                  // QUERY TO SHOW ALL AVAILABLE CATEGORY
                    
                 $cat_query = "SELECT * FROM category";
                 $cat_result = mysqli_query($connect, $cat_query);
                    
                 while($row = mysqli_fetch_assoc($cat_result)){
                     $cat_id = $row['cat_id'];
                     $cat_title = $row['cat_title'];
                     
                     echo " <option value='{$cat_id}'>{$cat_title}</option>" ;
                 }    
                  ?>
                </select>
            </div> 
              
             <div class="form-group col-md-6">
                <label for="category"><b>Status</b></label>
                <select class="form-control" name="status">
                 <option selected>Draft</option>
                 <option>Published</option>   
                </select>
            </div>   

          </div>
              
             <div class="form-group ">
                <label for="category"><b>Tags</b></label>
              <input type="text" class="form-control" name="tags">
            </div>
                 
            <div class="form-group col-md-6">
              <div class="form-group">
               <label for="image"><b>Image</b></label>
               <input type="file" class="form-control-file" name="image" >
              </div>
            </div>
            <br>
          <div class="form-group">
            <label for="content"><b>Content</b></label>
            <textarea class="form-control"  rows="4" name="content"></textarea>
          </div>         
          <button type="publish" class="btn btn-primary d-block mx-auto btn-block" style="border-radius:0;" name="publish">Publish</button>
        </form>


          </div>
        </div>
       </div>


      




       


         
     </div>  <!-- MAIN CONTENT ENDS -->  
      </div> <!-- MAIN ROW ENDS -->
      
      
      
     
          
    <br><br><br><br>      
      
      <!-- FOOTER GOES HERE -->
      <?php include "includes/footer.php" ?>

        <!-- CKEDITOR -->
   <script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
        
   <script>CKEDITOR.replace( 'content' ); </script>

   
      
      
      
      
  </body>
</html>