  <!-- HEADER -->
   <?php include "includes/header.php" ; ?>


  <!-- NAVBAR -->
  <?php include "includes/nav.php" ;?>
      
        <!--PAGE CONTENT -->
        <div class="row">
         <div class="col-md-2 side-bar">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark down-nav">
            
             <ul class="navbar-nav flex-column navbar-dark bg-dark">
                      
              <li class="nav-item">
                   <!-- PROFILE IMAGE --> 
                <img src="img/icon.png" class="rounded mx-auto d-none  d-sm-none d-md-block" >
                 <div class="img-space  d-none  d-sm-none d-md-block "></div>  
              </li>
                 
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="category.php"><i class="fas fa-chart-pie"></i> Categories</a>
              </li>
              <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-clipboard"></i> Posts</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="add_post.php">Add Post</a>
                  <a class="dropdown-item" href="all_post.php">All Post</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="far fa-comments"></i> Comments</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-users"></i> Users</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">user Post</a>
                  <a class="dropdown-item" href="#">user Post</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="far fa-user-circle"></i> Profile</a>
              </li>     
            </ul>
                
            <div class="space d-none  d-sm-none d-md-block"></div>    
            </nav>        
          
         </div>
            
        <!-- MAIN CONTENT -->
         <div class="col-md-10">
             <h2 class="heading"><b><i class="fas fa-pen"></i> Update Post Details</b></h2><hr><br>   
             
             
             <!-- CATCHING THE DATA -->
             
             <?php 
             
             if(isset($_GET['update'])){
                 
                 $post_id = $_GET['update'] ;
                 
                 $upd_query = "SELECT * FROM posts WHERE post_id = {$post_id}" ;
                 $upd_result = mysqli_query($connect, $upd_query);
                 
                 while($row = mysqli_fetch_assoc($upd_result)){
                   $post_id = $row['post_id'];
                   $post_cat_id = $row['post_category_id'];
                   $post_title = $row['post_title'];
                   $post_author = $row['post_author'];
                   $post_status = $row['post_status'];
                   $post_tags = $row['post_tags'];   
                   $post_content = $row['post_content'];     
                 }
             }
             
             else{
                 header("Location: all_post.php");
             }
             
             
             ?>
             
             
             
             <!-- FORM -->
         <form class="container" action="" method="post" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="title"><b>Title</b></label>
              <input type="text" class="form-control" placeholder="Title" name="title" value="<?php echo $post_title ;?>">
            </div>
            <div class="form-group col-md-6">
                <label for="author"><b>Author Name</b></label>
              <input type="text" class="form-control" placeholder="Author" name="author" value="<?php echo $post_author ;?>">
            </div>
          </div>
                 
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="tag"><b>Post Tags</b></label>
              <input type="text" class="form-control" placeholder="Tags" name="tags" value="<?php echo $post_tags ;?>">
            </div>
            <div class="form-group col-md-6">
                <label for="status"><b>Post Status</b></label>
              <input type="text" class="form-control" placeholder="status" name="status" value="<?php echo $post_status ;?>">
            </div>
          </div>
              
             <div class="form-group ">
                <label for="category"><b>Category</b></label>
              <input type="text" class="form-control" name="category" value="<?php echo $post_cat_id ;?>">
            </div>
                 
          <div class="form-row">
            <div class="form-group">
                  <label for="image"><b>Author Image</b></label>
                <input type="file" class="form-control-file" name="auth_image" >
              </div>
            <div class="form-group col-md-6">
              <div class="form-group">
                  <label for="image"><b>Image</b></label>
                <input type="file" class="form-control-file" name="image" >
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="content"><b>Content</b></label>
            <textarea class="form-control" rows="4" name="content"><?php echo $post_content ;?></textarea> 
          </div>         
          <button type="publish" class="btn btn-primary d-block mx-auto btn-block" style="border-radius:0;" name="publish">Publish</button>
        </form>
           
        </div>    
         
        </div> <!-- ROW END -->
      
      
      <!-- FOOTER -->
    <?php include "includes/footer.php" ; ?>
      
      
