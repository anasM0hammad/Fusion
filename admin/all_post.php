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
                <img src="../img/<?php echo $_SESSION['user_image'];?>" class=" mx-auto d-none  d-sm-none d-md-block" height="70" width="70" style="border-radius:50%;">
                 <div class="img-space  d-none  d-sm-none d-md-block "></div>  
              </li>
                 
              <li class="nav-item">
                <a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
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
                  <a class="dropdown-item" href="add_user.php">Add Users</a>
                  <a class="dropdown-item" href="all_user.php">All Users</a>
                </div>
              </li>
                  
            </ul>
                
            <div class="space d-none  d-sm-none d-md-block"></div>    
            </nav>        
          
         </div>
            
        <!-- MAIN CONTENT -->
         <div class="col-md-10">
             <h2 class="heading"><b><i class="far fa-arrow-alt-circle-down"></i> Post Table</b></h2><hr><br> 
             
             <!-- TO DELETE A POST -->
             
             <?php 
              
            if(isset($_GET['delete'])){
                
                if($_GET['delete']=='success'){
                 echo "<div class='alert alert-success' style='margin-bottom:20px; border-radius:0;' role='alert'><b>Post Deleted Succesfully.</b></div>"; 
                }
                
                else{
                    $del_post_id = $_GET['delete'];
                    $del_query = "DELETE FROM posts WHERE post_id = {$del_post_id}" ;
                    $del_result = mysqli_query($connect, $del_query);

                    //DELETING ALL COMMENTS IN THE POST
                    $del_com_query = "DELETE FROM comments WHERE comment_post_id = {$del_post_id}" ;
                    $del_comm_result = mysqli_query($connect, $del_com_query); 

                
                if(!$del_result){
                    die("QUERY FAILED..!!  ").mysqli_error($connect) ;
                }
                 else{
                        header("Location: all_post.php?delete=success");
                    }
             }
                
                
            }
            
            
            ?>
             
             
             
             <?php
             //CATCHING THE DATA OF CHECK BOX
             
             if(isset($_POST['checkArr'])){
                 
                $checkArr =  $_POST['checkArr'] ;
                $operation = $_POST['operation'] ;
                 
                $flag = 1; 
                 
            foreach($checkArr as $check){     
                 
                if($operation === 'Publish selected Post' ) {
                    // MAKE SELECTED POST PUBLISHED
                    $query = "UPDATE posts SET post_status = 'Published' WHERE post_id = $check " ;
                    $result = mysqli_query($connect , $query);
                    
                }
                 
                else if($operation === 'Draft selected Post') {
                     // MAKE SELECTED POST DRAFT
                    $query = "UPDATE posts SET post_status = 'Draft' WHERE post_id = $check " ;
                    $result = mysqli_query($connect , $query);
                     
                    
                }
                 
                 else if($operation === 'Delete Selected Post'){
                     // DELETE THE SELECTED POST
                     
                     $query = "DELETE FROM posts WHERE post_id = $check " ;
                     $result = mysqli_query($connect, $query);
                 }
                
                else{
                 echo "<div class='alert alert-danger' style='margin-bottom:20px; border-radius:0;' role='alert'><b>Please Select an Option.</b></div>"; 
                 $flag =0 ;       
                 break ;
                }
                
             }
                 
            if($flag){
                 echo "<div class='alert alert-success' style='margin-bottom:20px; border-radius:0;' role='alert'><b>Selected Post Updated.</b></div>";
            }         
                 
         }
               
               
            
             
             
             
             
             ?>
             
             
             
             <!-- BULK FORM -->
             <form class="form-inline col-md-6" method="post">
              <div class="form-group ">
                <select class="form-control" name="operation">
                 <option>Select Option</option>
                 <option>Publish selected Post</option> 
                 <option>Draft selected Post</option> 
                 <option>Delete Selected Post</option> 
                </select>
            <button type="submit" class="btn btn-primary " style="margin-left:7px;" name="apply">Apply</button>
            </div>     
           
             
             
             
             
             
             
             
             <!-- TABLE -->
             <table class="table table-striped table-hover table-bordered" style="margin-top:20px;">
              <thead>
                 <tr>
                   <th><div class="form-check"><input class="form-check-input" type="checkbox" value="" id="checkbox"><label></label></div></th>    
                   <th>Id</th>
                   <th>Profile</th>     
                   <th>Author</th>
                   <th>Title</th>
                   <th>Category</th>
                   <th>Status</th> 
                   <th>Image</th>
                   <th>Tags</th>
                   <th>Comments</th>     
                   <th>Date</th>
                   <th>Edit</th>     
                 </tr>
              </thead>
              <tbody>
                  <?php
                 
                  // SHOW ALL DATA 
                  
                   $show_query = "SELECT * FROM posts" ;
                   $show_result = mysqli_query($connect , $show_query) ;
                  
                   
                   while($row = mysqli_fetch_assoc($show_result)){
                       
                       $post_id = $row['post_id'];
                       $post_cat_id = $row['post_category_id'];
                       $post_title = $row['post_title'];
                       $post_author = $row['post_author'];
                       $post_date = $row['post_date'];
                       $post_image = $row['post_image'];
                       $post_status = $row['post_status'];
                       $post_tags = $row['post_tags'];
                       $post_author_image= $row['post_author_image'];
                       $post_comment_count = $row['post_comment_count'];
                       
//                       // QUERY TO SHOW NUMBER OF COMMENTS
//                       $count_query = "SELECT * FROM comments WHERE comment_post_id=$post_id";
//                       $count_result = mysqli_query($connect, $count_query);
//                       $count = mysqli_num_rows($count_result);
                       
                       
                        echo "<tr>" ;
                        echo "<td><div class='form-check'><input class='form-check-input check' type='checkbox' name='checkArr[]' value='$post_id'><label></label></div></td>" ;
                        echo "<td>$post_id</td>" ;
                        echo "<td><img src='../img/$post_author_image' height ='60' width='60' style='border-radius:50%;'></td>" ;   
                        echo "<td>$post_author</td>" ;
                        echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>" ;
                       
                        //GETTING CAT_TITLE USING CAT_ID
                       
                        $cat_query = "SELECT * FROM category WHERE cat_id = {$post_cat_id}" ;
                        $cat_result = mysqli_query($connect, $cat_query);
                        while($row = mysqli_fetch_assoc($cat_result)){
                            $cat_title = $row['cat_title'];

                        echo "<td>$cat_title</td>" ;
                        }
                        echo "<td>$post_status</td>" ;
                        echo "<td><img src='../img/$post_image' height ='50' width='100'></td>" ; 
                        echo "<td>$post_tags</td>" ;
                        echo "<td>$post_comment_count</td>"   ; 
                        echo "<td>$post_date</td>"   ;  
                        echo "<td><a href='all_post.php?delete={$post_id}'><i class='far fa-times-circle'></i></a> <a class='float-right' href='update.php?update={$post_id}'><i class='fas fa-pen'></i></a></td>"   ;  
                        echo"</tr>";
                       
                      
                   }
                  
                  
                  ?>
                
             </tbody>     
             </table>
             </form>
            
        </div>    
            
        </div> <!-- ROW END -->
   

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script type="text/javascript" src="js/all_post.js"></script>
      
      <!-- FOOTER -->
    <?php include "includes/footer.php" ; ?>
      
      
