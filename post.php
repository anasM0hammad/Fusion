<?php  
include "includes/connection.php" ;
?>

<!doctype html>
<html lang="en">
  <head>
    <?php include "includes/links.php" ; ?>
    
    <!-- EXTERNAL CSS FILE -->
    <link rel="stylesheet" href="css/post.css" type="text/css">  
      
      
    <title>Fusion | Blog Name</title>
  </head>
    
  <body>
      
       
      <!-- NAVBAR  -->  
      
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php"><img src="img/icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Fusion</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav container justify-content-end list ">
          <li class="nav-item ">
              <a class="dec_link nav-link " href="index.php"><i class ="fas fa-home"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="dec_link nav-link" href="admin/index.php"><i class="fas fa-globe"></i> Admin</a>
          </li>
           <li class="nav-item">
            <a class="dec_link nav-link" href="#"><i class="fas fa-phone"></i> Contact</a>
          </li>    
        </ul>
      </div>
    </nav>
  <!-- NAVBAR ENDS HERE -->
      
      <?php 
      
        if(isset($_GET['p_id'])){
            
            $post_id = $_GET['p_id'];
            
            $post_query = "SELECT * FROM posts WHERE post_id = {$post_id}" ;
            $post_result = mysqli_query($connect , $post_query) ;
            
            while($row = mysqli_fetch_assoc($post_result)){
                
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_image = $row['post_image'];
                $post_author_image = $row['post_author_image'];
                $post_date = $row['post_date'];
                $post_content = $row['post_content'];
           
                
            }
            
        }
      
      else{
          header("Location: index.php");
      }
      
      
      ?>
      
    
      
      
<!-- BLOG CONTENT -->      
    <div class="container">
     <div class="row">
      <div class="col-md-8">    
        <h1 class="title"><?php echo $post_title ; ?></h1>
        <h4 class="text-muted"><img class="d-inline-block align-top" height="40" width="40" style="border-radius:50%;" src="img/<?php echo $post_author_image;?>"><a href=""><span class="name text-muted"><?php echo "  ".$post_author ?></span></a></h4>
        <hr> 
        <img src="img/<?php echo $post_image;?>" class="img-fluid" alt="Responsive image">
        <hr><br>  
        <p class="text-muted"><i class="far fa-clock"></i> <?php echo " ".$post_date; ?></p>    
       
        <p class="text-muted"><?php echo $post_content; ?></p>
        
                 
         <img src="img/like.png" class="rounded likes" data-toggle="tooltip" data-placement="bottom" title="Like">
                 
         <img src="img/heart.png" class="rounded likes" data-toggle="tooltip" data-placement="bottom" title="Love">
          
         <img src="img/confused.png" class="rounded likes" data-toggle="tooltip" data-placement="bottom" title="Not Good">  
          
         <!--COMMENT BOX -->
          
          <?php 
          
            if(isset($_POST['submit'])){
               $comment_post_id = $_GET['p_id'];
               $comment_author = $_POST['comment_author'];
               $comment_email = $_POST['comment_email'];
               $comment = $_POST['comment'];
                
                if(empty($comment) || empty($comment_author) || empty($comment_email)){
                    echo "<div class='alert alert-danger' style='margin-top:30px;' role='alert'><b>Please Enter Required Fields.</b></div>" ;
                }
                
                //QUERY TO INSERT COMMENT
                else{
                    
                    $comment_query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) VALUES($comment_post_id, '{$comment_author}', '{$comment_email}', '{$comment}', 'Unapproved', now())";
                    
                    $comment_result = mysqli_query($connect, $comment_query) ;
                    
                    if(!$comment_result){
                        die("QUERY FAILED..! ".mysqli_error($connect));
                    }
                    
                    else{
                        
                        //QUERY TO INCREASE COMMENT COUNT
                        $count_query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = {$comment_post_id}";
                        $count_result = mysqli_query($connect, $count_query);

                        echo "<div class='alert alert-success' style='margin-top:30px;' role='alert'><b>Your Comment is posted.</b></div>" ;
                    }
                    
                }
            }
                
          
          ?>
          
          
          
          <div class="card bg-light comment_box">
           <div class="card-body">
            <form action="" method="post" >   
               <div class="form-group">
                <label for="name" class="text-muted"><b>Name</b></label>
                <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Name" name="comment_author">
              </div>
              <div class="form-group">
                  <label for="Email" class="text-muted"><b>Email</b></label>
                <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" name="comment_email">
              </div>   
               <h5 class="text-muted"> Leave a Comment</h5>
               <div class="form-group">
                <textarea class="form-control" name="comment" rows="3"></textarea>
              </div>   
             
               
            <button type="submit" class="btn btn-primary mybutton" name="submit" >Submit</button>
        </form>  
           </div>
         </div>
          
          <br><br><hr>
          
          <!-- COMMENTS -->
          
          
          
          <?php
                
                 //QUERY TO SHOW COMMENT      
          
                $post_id = $_GET['p_id'];
          
                $show_query = "SELECT * FROM comments WHERE comment_post_id = {$post_id}";
                $show_result = mysqli_query($connect, $show_query);

                
                while($show_row = mysqli_fetch_assoc($show_result)){
                    
                    $author = $show_row['comment_author'];
                    $comment = $show_row['comment_content'];
                    $date = $show_row['comment_date'];
                    $status = $show_row['comment_status'];
          
                
                    if($status=='Approved'){

                 echo "<div class='comment text-muted'>";
                 echo " <img src='img/comment.svg' class=' float-left comment_profile'>
                        <h5><a href='' >{$author} </a><small class='text-muted'> {$date}</small></h5>    
                        <p>{$comment}</p>
     
              
             <img src='img/like.png' class='comment_like rounded float-right' data-toggle='tooltip' data-placement='bottom' title='Like'>

             <img src='img/heart.png' class='comment_like rounded float-right' data-toggle='tooltip' data-placement='bottom' title='Love'>

             <img src='img/confused.png' class='comment_like rounded float-right' data-toggle='tooltip' data-placement='bottom' title='Not Good'>  
               
            <h6 class='float-right' style='margin-right: 20px; color:#C03A2B; margin-top:5px;'><a href=''>Reply</a></h6>
            
            <br>   
               
          </div>
          
          <hr><br>";
               
                    }//if
                }//while end
            
               
          ?>           
          
          
          
          
      </div>
         <!-- MAIN CONTENTS END -->
         
         
         <!-- SIDE BOXES -->
       
     <?php include "includes/sidebox.php" ; ?>
         
         
     </div>  <!-- ROW ENDS -->    
    </div>   <!-- CONTAINER ENDS -->
      
   <!-- FOOTER GOES HERE -->
      <?php include "includes/footer.php" ; ?>
      
  </body>
</html>