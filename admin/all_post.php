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
                  <a class="dropdown-item" href="#">Add Post</a>
                  <a class="dropdown-item" href="all_post.php">All Post</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="far fa-comments"></i> Comments</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-users"></i> Users</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Add Post</a>
                  <a class="dropdown-item" href="#">All Post</a>
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
             <h2 class="heading"><b>Welcome to Admin Page</b></h2><hr><br>   
             
             <!-- TABLE -->
             <table class="table table-striped table-hover table-bordered">
              <thead>
                 <tr>
                   <th>Id</th>
                   <th>Author</th>
                   <th>Title</th>
                   <th>Category</th>
                   <th>Status</th> 
                   <th>Image</th>
                   <th>Tags</th>
                   <th>Comment</th>
                   <th>Date</th>     
                 </tr>
              </thead>
              <tbody>
                  <?php // SHOW ALL DATA 
                  
                   $show_query = "SELECT * FROM posts" ;
                   $show_result = mysqli_query($connect , $show_query) ;
                   
                   while($row = mysqli_fetch_assoc($show_result)){
                       
                       $post_id = $row['post_id'];
                       $post_cat_id = $row['post_category_id'];
                       $post_title = $row['post_title'];
                       $post_author = $row['post_author'];
                       $post_date = $row['post_date'];
                       $post_image = $row['post_image'];
                       $post_comment = $row['post_comment_count'];
                       $post_status = $row['post_status'];
                       $post_tags = $row['post_tags'];
                       
                       
                        echo "<tr>" ;
                        echo "<td>$post_id</td>" ;
                        echo "<td>$post_author</td>" ;
                        echo "<td>$post_title</td>" ;
                        echo "<td>$post_cat_id</td>" ;
                        echo "<td>$post_status</td>" ;
                        echo "<td><img src='../img/$post_image' height ='50' width='100'></td>" ; 
                        echo "<td>$post_tags</td>" ;
                        echo "<td>$post_comment</td>" ;
                        echo "<td>$post_date</td>"   ;   
                         echo"</tr>";
                   }
                  
                  ?>
                
             </tbody>     
             </table>
            
        </div>    
            
            
        </div> <!-- ROW END -->
      
      
      <!-- FOOTER -->
    <?php include "includes/footer.php" ; ?>
      
      
