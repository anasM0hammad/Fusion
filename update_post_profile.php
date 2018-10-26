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


  <!-- BACK TO PROFILE OPTION -->
   <a href="profile.php"><p class="float-right" style="margin-top: 15px; margin-right: 20px;"><b><i class="fas fa-arrow-left"></i> BACK</b></p></a>
      
      
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

          
        <!-- QUERY TO FETCH DATA -->
        <?php 
             if(isset($_GET['status'])){
                 if($_GET['status']=='success'){
                   echo "<div class='alert alert-success' style='margin-top:20px; border-radius:0;' role='alert'><b>Post Updated Succesfully</b></div>";
                    
                 }
             }
             
             
             
             if(isset($_GET['p_id'])){
                 
                 $post_id = $_GET['p_id'] ;
                 
                 $upd_query = "SELECT * FROM posts WHERE post_id = {$post_id}" ;
                 $upd_result = mysqli_query($connect, $upd_query);
                 
                 while($row = mysqli_fetch_assoc($upd_result)){
                   $post_id = $row['post_id'];
                   $post_cat_id = $row['post_category_id'];
                   $post_title = $row['post_title'];
                   $post_status = $row['post_status'];
                   $post_tags = $row['post_tags'];   
                   $post_content = $row['post_content'];   
                   $post_image = $row['post_image'];    
                 }
                 
                 //QUERY TO FETCH DATA FROM CATEGORY
                 $cat_query = "SELECT * FROM category WHERE cat_id = $post_cat_id;";
                 $cat_result = mysqli_query($connect, $cat_query);
                 $row = mysqli_fetch_assoc($cat_result);
                 $post_cat_title = $row['cat_title'];

                 
                 // UPDATING THE POST
                 
                 if(isset($_POST['upd_post'])){
                     
                     $post_upd_title = $_POST['title'] ;
                     $post_upd_tags = $_POST['tags'] ;
                     $post_upd_status = $_POST['status'] ;
                     $post_upd_cat_id = $_POST['post_category'] ;
                     $post_upd_content = $_POST['content'] ;
                     $post_upd_image = $_FILES['image']['name'] ;
                     $post_upd_tmp_image = $_FILES['image']['tmp_name'];
                    
                     
                     move_uploaded_file($post_upd_tmp_image, "../img/$post_upd_image");
                    
                     
                     // TO FILL THE IMAGE IF NOT UPDATED
                     if(empty($post_upd_image)){
                         // $img_query = "SELECT * FROM posts WHERE post_id = $post_id";
                         // $img_result = mysqli_query($connect, $img_query) ;
                         
                         // while($row = mysqli_fetch_assoc($img_result)){
                             $post_upd_image = $post_image;
                        // }
                     }
                     
                     
                     $upd_query = "UPDATE posts SET post_title = '{$post_upd_title}', post_tags = '{$post_upd_tags}', post_status = '{$post_upd_status}', post_category_id = $post_upd_cat_id, post_content = '$post_upd_content', post_image = '{$post_upd_image}' WHERE post_id = $post_id" ;
                     
                     $upd_result = mysqli_query($connect , $upd_query);
                     
                     if(!$upd_result){
                         die("QUERY FAILED..!!  ".mysqli_error($connect));
                     }
                     
                     else{
                         header("LOCATION: update_post_profile.php?update={$post_id}&status=success");
                     }
                     
                 }
             }
             
             else{
                 header("Location: profile.php");
             }
             
             
             ?>

     

        <div class="card" >
          <div class="card-body">
         <h2 class="heading"><b><i class="fas fa-pen"></i> Update Post Details</b></h2><hr><br> 
            
        <form class="container" action="" method="post" enctype="multipart/form-data">
         
            <div class="form-group">
             <label for="title"><b>Title</b></label>
             <input type="text" class="form-control" placeholder="Title" name="title" value="<?php echo $post_title;?>">
            </div>
                 
          <div class="form-row">
              
            <div class="form-group col-md-6">
                <label for="category"><b>Category</b></label>
                <select class="form-control" name="post_category" >
                 <option value="<?php echo $post_cat_id; ?>"><?php echo $post_cat_title;?></option> 
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
                <select class="form-control" name="status" value="<?php echo $post_status;?>">
                <option selected><?php echo $post_status;?></option>
                 <option>Draft</option>
                 <option>Published</option>   
                </select>
            </div>   

          </div>
              
             <div class="form-group ">
                <label for="category"><b>Tags</b></label>
              <input type="text" class="form-control" name="tags" value="<?php echo $post_tags;?>">
            </div>
                 
            <div class="form-group col-md-6">
              <div class="form-group">
               <label for="image"><b>Image</b></label>
                <img src="img/<?php echo $post_image ; ?>" width="80" height="40" style=" margin-left:20px; margin-bottom:10px;">
               <input type="file" class="form-control-file" name="image" >
              </div>
            </div>
            <br>
          <div class="form-group">
            <label for="content"><b>Content</b></label>
            <textarea class="form-control"  rows="4" name="content" ><?php echo $post_content; ?></textarea>
          </div>         
          <button type="publish" class="btn btn-primary d-block mx-auto btn-block" style="border-radius:0;" name="upd_post">Update</button>
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