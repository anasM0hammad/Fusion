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
             <h2 class="heading"><b><i class="fas fa-database"></i> Enter Post Details</b></h2><hr><br>   
            
             
             <!-- FORM -->
             <form class="container">
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="title"><b>Title</b></label>
              <input type="text" class="form-control" placeholder="Title">
            </div>
            <div class="form-group col-md-6">
                <label for="author"><b>Author Name</b></label>
              <input type="text" class="form-control" placeholder="Author">
            </div>
          </div>
                 
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="tag"><b>Post Tags</b></label>
              <input type="text" class="form-control" placeholder="Tags">
            </div>
            <div class="form-group col-md-6">
                <label for="status"><b>Post Status</b></label>
              <input type="text" class="form-control" placeholder="status">
            </div>
          </div>
                 
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="category"><b>Category</b></label>
              <input type="text" class="form-control">
            </div>
            <div class="form-group col-md-6">
              <div class="form-group">
                  <label for="image"><b>Image</b></label>
                <input type="file" class="form-control-file" >
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="content"><b>Content</b></label>
            <textarea class="form-control" rows="4"></textarea>
          </div>         
          <button type="publish" class="btn btn-primary" style="border-radius:0;">Publish</button>
        </form>
           
        </div>    
         
        </div> <!-- ROW END -->
      
      
      <!-- FOOTER -->
    <?php include "includes/footer.php" ; ?>
      
      