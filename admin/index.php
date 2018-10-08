  <!-- HEADER -->
   <?php include "includes/header.php" ; ?>
      
      


  <!-- NAVBAR -->
  <?php include "includes/nav.php" ;?>

   <style>

       .user_image{
           border-radius: 50%;
       }
       
       .card{
           margin: 5px;
       }
       
       .card a {
           color: inherit;
       }

   </style>


   <?php 
    // CALCULATING NUMBER OF POSTS
     $post_query = "SELECT * FROM posts";
     $post_result = mysqli_query($connect, $post_query) ;
     $post_count = mysqli_num_rows($post_result);

    // CALCULATING COMMENTS
     $com_query = "SELECT * FROM comments";
     $com_result = mysqli_query($connect, $com_query) ;
     $com_count = mysqli_num_rows($com_result);


    // CALCULATING USERS
     $user_query = "SELECT * FROM users";
     $user_result = mysqli_query($connect, $user_query) ;
     $user_count = mysqli_num_rows($user_result);


    // CALCULATING CATEGORIES
     $cat_query = "SELECT * FROM category";
     $cat_result = mysqli_query($connect, $cat_query) ;
     $cat_count = mysqli_num_rows($cat_result);

    ?>
 
  
      
        <!--PAGE CONTENT -->
        <div class="row">
         <div class="col-md-2 side-bar">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark down-nav">
            
             <ul class="navbar-nav flex-column navbar-dark bg-dark">
                      
              <li class="nav-item">
                   <!-- PROFILE IMAGE --> 
                <img src="../img/<?php echo $_SESSION['user_image'] ?>" class=" mx-auto d-none  d-sm-none d-md-block" height="70" width="70" style="border-radius:50%;" >
                 <div class="img-space  d-none  d-sm-none d-md-block "></div>  
              </li>
                 
              <li class="nav-item active">
                <a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="category.php"><i class="fas fa-chart-pie"></i> Categories</a>
              </li>
              <li class="nav-item dropdown">
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
                  <a class="dropdown-item" href="add_user.php">Add Users</a>
                  <a class="dropdown-item" href="all_user.php">All Users</a>
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
              <h2 class="heading"><img src="../img/<?php echo $_SESSION['user_image']; ?>" class=" d-sm-none user_image" height="70" width="70"><b> <?php echo $_SESSION['firstname']." ".$_SESSION['lastname'] ; ?></b></h2>
             <hr><br>   
            
             
             <div class="row">
                 
             <!-- POST CARD -->     
              <div class="col-md-3 ">
                <div class="card text-white bg-primary">
                  <div class="card-body">
                   <div class="row">
                       <div class="col-sm-4">
                           <h1 class="display-3"><i class="fas fa-file-alt"></i></h1>
                       </div>
                       <div class="col-sm-8">
                           <div><h1 class="text-right"><?php echo $post_count ; ?></h1></div>
                           <div><h5 class="text-right">Post</h5></div>
                       </div>
                    </div>  
                  </div>
                <div class="card-header bg-light text-primary">
                    <h6>View Details <a href="" class="float-right"><i class="fas fa-arrow-circle-right"></i></a></h6>
                </div>     
                </div>
              </div>
                 
             <!-- COMMENTS CARD -->     
              <div class="col-md-3">
                <div class="card text-white bg-success">
                  <div class="card-body">     
                 <div class="row">
                       <div class="col-sm-4">
                           <h1 class="display-3"><i class="fas fa-comments"></i></h1>
                       </div>
                       <div class="col-sm-8">
                           <div><h1 class="text-right"><?php echo $com_count; ?></h1></div>
                           <div><h5 class="text-right">Comments</h5></div>
                       </div>
                    </div>  
                  </div>
                <div class="card-header bg-light text-success">
                    <h6>View Details <a href="" class="float-right"><i class="fas fa-arrow-circle-right"></i></a></h6>
                </div>     
                </div>
              </div>
                 
             <!-- USER CARD -->     
               <div class="col-md-3 ">
                <div class="card text-white bg-warning">
                  <div class="card-body">
                <div class="row">
                       <div class="col-sm-4">
                           <h1 class="display-3"><i class="fas fa-user"></i></h1>
                       </div>
                       <div class="col-sm-8">
                           <div><h1 class="text-right"><?php echo $user_count; ?></h1></div>
                           <div><h5 class="text-right">Users</h5></div>
                       </div>
                    </div>  
                  </div>
                <div class="card-header bg-light text-warning">
                    <h6>View Details <a href="" class="float-right"><i class="fas fa-arrow-circle-right"></i></a></h6>
                </div>     
                </div>
              </div>
                 
             <!-- CATEGORY CARDS -->     
              <div class="col-md-3 ">
                <div class="card text-white bg-danger">
                  <div class="card-body">
                <div class="row">
                       <div class="col-sm-4">
                           <h1 class="display-3"><i class="fas fa-chart-pie"></i></h1>
                       </div>
                       <div class="col-sm-8">
                           <div><h1 class="text-right"><?php echo $cat_count ; ?></h1></div>
                           <div><h5 class="text-right">Category</h5></div>
                       </div>
                    </div>  
                  </div>
                <div class="card-header bg-light text-danger">
                    <h6>View Details <a href="" class="float-right"><i class="fas fa-arrow-circle-right"></i></a></h6>
                </div>     
                </div>
              </div>
                 
            </div>  <!-- CARD ROW ENDS -->
            
             
            </div>    
        </div> <!-- MAIN ROW ENDS -->
      
      
      <!-- FOOTER -->
    <?php include "includes/footer.php" ; ?>
      
      
