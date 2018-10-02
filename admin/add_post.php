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
                <a class="nav-link" href="all_comments.php"><i class="far fa-comments"></i> Comments</a>
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
             <h2 class="heading"><b><i class="fas fa-database"></i> Enter Post Details</b></h2><hr><br>   
            
             <?php 
              if(isset($_POST['publish'])){
                  
                  $post_title = $_POST['title'];
                  $post_author = $_POST['author'];
                  $post_tags = $_POST['tags'];
                  $post_status = $_POST['status'] ;
                  $post_cat = $_POST['post_category'];
                  $post_content = $_POST['content'];
                  $post_image = $_FILES['image']['name'];
                  $post_image_tmp = $_FILES['image']['tmp_name'] ;
                  $post_author_image = $_FILES['auth_image']['name'];
                  $post_author_image_tmp = $_FILES['auth_image']['tmp_name'];
                  $post_date = date('d-m-y');
                  $post_comment_count = 1 ;
                  
                  move_uploaded_file($post_image_tmp , "../img/$post_image") ;
                  move_uploaded_file($post_author_image_tmp , "../img/$post_author_image") ;
                  
                  if(empty($post_title) || empty($post_author) || empty($post_content) || empty($post_cat)){
                  echo "<div class='alert alert-danger' style='margin-bootom:20px; border-radius:0;' role='alert'><b>Enter Required Fields..!</b></div>";
                                 
                  }
                  
                  else{
                  
                  $publish_query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_comment_count, post_content,     post_tags, post_status, post_author_image) VALUES ({$post_cat}, '{$post_title}', '{$post_author}', now(), '{$post_image}', {$post_comment_count}, '{$post_content}', '{$post_tags}', '{$post_status}', '{$post_author_image}') ";
                  
                  $publish_result = mysqli_query($connect, $publish_query) ;
                  
                  echo "<div class='alert alert-success' style='margin-bootom:20px; border-radius:0;' role='alert'><b>Post Published</b></div>";
                      
                  }
              }
             
             ?>
             
             <!-- FORM -->
         <form class="container" action="" method="post" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="title"><b>Title</b></label>
              <input type="text" class="form-control" placeholder="Title" name="title">
            </div>
            <div class="form-group col-md-6">
                <label for="author"><b>Author Name</b></label>
              <input type="text" class="form-control" placeholder="Author" name="author">
            </div>
          </div>
                 
          <div class="form-row">
              
            <div class="form-group col-md-6">
                <label for="category"><b>Category</b></label>
                <select class="form-control" name="post_category">
                <?php
                    
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
                <label for="status"><b>Post Status</b></label>
              <input type="text" class="form-control" placeholder="status" name="status">
            </div>
          </div>
              
             <div class="form-group ">
                <label for="category"><b>Tags</b></label>
              <input type="text" class="form-control" name="tags">
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
            <textarea class="form-control" rows="4" name="content"></textarea>
          </div>         
          <button type="publish" class="btn btn-primary d-block mx-auto btn-block" style="border-radius:0;" name="publish">Publish</button>
        </form>
           
        </div>    
         
        </div> <!-- ROW END -->
      
      
      <!-- FOOTER -->
    <?php include "includes/footer.php" ; ?>
      
      
