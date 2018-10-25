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
              <a class="nav-link" href="#" id="all_post_link"><b><i class="fas fa-paste"></i> Posts</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" id="add_post_link"><b><i class="far fa-plus-square"></i> Add Post</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" id="settings_link"><b><i class="fas fa-cog"></i> Settings</b></a>
            </li>
          </ul>
       <!--  </div> -->
      </nav>

         
        <!-- SETTING BAR ENDS -->

             <div class="row text-muted container" id="all_post" style="display: none;">

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

    
            
           

            <div class="col-sm-6"> 
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
                 $post_comment_count = $row['post_comment_count']; 

             ?>
          


           <div class="col-sm-6"> 
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





         <!-- ADD POST DIV -->
         <div class="container" style="margin-top: 40px;">

         <!-- QUERY TO INSERT THE POST -->
          <?php 
              if(isset($_POST['publish'])){
                  
                  $post_title = $_POST['title'];
                  $post_tags = $_POST['tags'];
                  $post_author = $firstname." ".$lastname ;
                  $post_status = $_POST['status'] ;
                  $post_cat = $_POST['post_category'];
                  $post_content = $_POST['content'];
                  $post_image = $_FILES['image']['name'];
                  $post_image_tmp = $_FILES['image']['tmp_name'] ;
                  $post_author_image = $image ;
                  $post_date = date('d-m-y');
                  $post_comment_count = 0 ;
                  
                  move_uploaded_file($post_image_tmp , "../img/$post_image") ;
                 
                  
                  if(empty($post_title)  || empty($post_content) || empty($post_cat)){
                  echo "<div class='alert alert-danger' style='margin-bootom:20px; border-radius:0;' role='alert'><b>Enter Required Fields..!</b></div>";
                                 
                  }
                  
                  else{
                  
                  $publish_query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_comment_count, post_content,     post_tags, post_status, post_author_image) VALUES ({$post_cat}, '{$post_title}', '{$post_author}', now(), '{$post_image}', {$post_comment_count}, '{$post_content}', '{$post_tags}', '{$post_status}', '{$post_author_image}') ";
                  
                  $publish_result = mysqli_query($connect, $publish_query) ;
                  
                  echo "<div class='alert alert-success' style='margin-bootom:20px; border-radius:0;' role='alert'><b>Post Published</b></div>";
                      
                  }
              }
             
             ?>




         <div class="card" >
          <div class="card-body">
         <h2 class="heading"><b><i class="fas fa-database"></i> Enter Post Details</b></h2><hr><br> 
            
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