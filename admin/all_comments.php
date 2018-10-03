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
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-clipboard"></i> Posts</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="add_post.php">Add Post</a>
                  <a class="dropdown-item" href="all_post.php">All Post</a>
                </div>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="all_comments.php"><i class="far fa-comments"></i> Comments</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-users"></i> Users</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Add Comment</a>
                  <a class="dropdown-item" href="#">All Comment</a>
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
             <h2 class="heading"><b><i class="far fa-comments"></i> Comments</b></h2><hr><br> 
             
             
             
             <!-- TABLE -->
             <table class="table table-striped table-hover table-bordered">
              <thead>
                 <tr>
                   <th>Id</th>
                   <th>Author</th>     
                   <th>Comment</th>
                   <th>Email</th>
                   <th>Status</th>
                   <th>Post</th> 
                   <th>Date</th>
                   <th>Approve?</th>
                   <th>Delete</th>     
                 </tr>
              </thead>
              <tbody>
                  <?php // SHOW ALL DATA 
                  
                   $show_query = "SELECT * FROM comments" ;
                   $show_result = mysqli_query($connect , $show_query) ;
                   
                   while($row = mysqli_fetch_assoc($show_result)){
                       
                       $comment_id = $row['comment_id'];
                       $comment_post_id = $row['comment_post_id'];
                       $comment_email = $row['comment_email'];
                       $comment_author = $row['comment_author'];
                       $comment_date = $row['comment_date'];
                       $content = $row['comment_content'];
                       $comment_status = $row['comment_status'];
                       
                       // QUERY TO SELECT POST FROM POST COMMENT ID
                       
                       $post_query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
                       $post_result = mysqli_query($connect, $post_query);
                       $post_row = mysqli_fetch_assoc($post_result);
                       $post_title = $post_row['post_title'];
                       
                       
                        echo "<tr>" ;
                        echo "<td>$comment_id</td>" ;
                        echo "<td>$comment_author</td>" ;
                        echo "<td>$content</td>" ;
                        echo "<td>$comment_email</td>" ;
                        echo "<td>$comment_status</td>" ;
                        echo "<td>$post_title</td>" ;
                        echo "<td>$comment_date</td>"   ;  
                        echo "<td><a href=''>Yes  </a>/<a href=''> No</a></td>"   ;  
                        echo "<td style='text-align:center;'><a href=''><i class='far fa-times-circle'></i></a>"   ;  
                        echo"</tr>";
                   }
                  
                  ?>
                
             </tbody>     
             </table>
            
        </div>    
            
        </div> <!-- ROW END -->
      
      
      <!-- FOOTER -->
    <?php include "includes/footer.php" ; ?>
      
      
