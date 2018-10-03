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
             
             <?php
             
             //QUERY TO DELETE COMMENTS
             
             if(isset($_GET['delete'])){
                 
                 
                if($_GET['delete']=='success'){
                      echo "<div class='alert alert-success' style='margin-top:10px;' role='alert'><b>Comment Deleted.</b></div>" ;
                 }
                 
                 else{
                 
                 $comment_id = $_GET['delete'];
                 $del_query = "DELETE FROM comments WHERE comment_id = $comment_id";
                 $del_result = mysqli_query($connect, $del_query);
                 
                 if(!$del_query){
                     die("QUERY FAILED..").mysqli_error($connect);
                 }
                 
                else{
                     header("Location: all_comments.php?delete=success");
                 }
             }        
        }
             
             
             //CATCHING THE STATUS CHANGED REQUEST
             if(isset($_GET['status'])){
                 
                 $status = $_GET['status'];
                 if($status=='changed'){
                      echo "<div class='alert alert-success' style='margin-top:10px;' role='alert'><b>Status Updated.</b></div>" ;
                 }
                 
                 else{
                     header("Location: all_comments.php");
                 }
             }
              
             
             
             
             ?>
             
             
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
                        echo "<td><a href='../post.php?p_id={$comment_post_id}'>$post_title</a></td>" ;
                        echo "<td>$comment_date</td>"   ;  
                        echo "<td><a href='all_comments.php?approve={$comment_id}'>Yes  </a>/<a href='all_comments.php?unapprove={$comment_id}'> No</a></td>"   ;  
                        echo "<td style='text-align:center;'><a href='all_comments.php?delete={$comment_id}'><i class='far fa-times-circle'></i></a>"   ;  
                        echo"</tr>";
                   }
                  
                  ?>
                
             </tbody>     
             </table>
             
             
             <?php
             
             // CHANGING THE STATUS OF COMMENT
             
             //APPROVING QUERY
             if(isset($_GET['approve'])){
                 
                 $comment_id = $_GET['approve'];
                 $upd_query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = $comment_id";
                 $upd_result = mysqli_query($connect, $upd_query);
                 
                 if(!$upd_result){
                     die("QUERY FAILED...... ").mysqli_error($connect);
                 }
                 
                 else{
                     header("Location: all_comments.php?status=changed");
                 }
                 
             }
             
             //UNAPPROVING QUERY
              if(isset($_GET['unapprove'])){
                 
                 $comment_id = $_GET['unapprove'];
                 $upd_query = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id = $comment_id";
                 $upd_result = mysqli_query($connect, $upd_query);
                 
                 if(!$upd_result){
                     die("QUERY FAILED...... ").mysqli_error($connect);
                 }
                 
                 else{
                     header("Location: all_comments.php?status=changed");
                 }
                 
             }
             
             
             
             ?>
             
            
        </div>    
            
        </div> <!-- ROW END -->
            
      
      
      <!-- FOOTER -->
    <?php include "includes/footer.php" ; ?>
      
      
