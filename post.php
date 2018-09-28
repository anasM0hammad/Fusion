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
      
      
      
<!-- BLOG CONTENT -->      
    <div class="container">
     <div class="row">
      <div class="col-md-8">    
        <h1 class="title">BLOG TITLE</h1>
        <h5 class="text-muted"> by    <img class="d-inline-block align-top" height="30" width="30" src="img/icon.png"><a href=""><span class="name text-muted">BLOGGER NAME</span></a></h5>
        <hr> 
        <img src="img/post.svg" class="img-fluid" alt="Responsive image">
        <hr><br>  
        <p class="text-muted"><i class="far fa-clock"></i> Posted on 10 september 2018</p>    
       
        <p class="text-muted">The emergence and growth of blogs in the late 1990s coincided with the advent of web publishing tools that facilitated the posting of content by non-technical users who did not have much experience with HTML The emergence and growth of blogs in the late 1990s coincided with the advent of web publishing tools that facilitated the posting of content by non-technical users who did not have much experience with HTML The emergence and growth of blogs in the late 1990s coincided with the advent of web publishing tools that facilitated the posting of content by non-technical users who did not have much experience with HTML </p>
        
                 
         <img src="img/like.png" class="rounded likes" data-toggle="tooltip" data-placement="bottom" title="Like">
                 
         <img src="img/heart.png" class="rounded likes" data-toggle="tooltip" data-placement="bottom" title="Love">
          
         <img src="img/confused.png" class="rounded likes" data-toggle="tooltip" data-placement="bottom" title="Not Good">  
          
         <!--COMMENT BOX -->
          <div class="card bg-light comment_box">
           <div class="card-body">
             <h5 class="text-muted"> Leave a Comment</h5>
             <form>
               <div class="form-group">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>   
             </form>  
               
            <button type="button" class="btn btn-primary mybutton">Submit</button>
               
           </div>
         </div>
          
          <br><br><hr>
          
          <!-- COMMENTS -->
          
          <!-- FIRST COMMENT -->
           <div class="comment text-muted">
          <img src="img/comment.svg" class=" float-left comment_profile">
           <h5><a href="" >NAME </a><small class="text-muted"> October 19, 2018</small></h5>    
           <p>The emergence and growth of blogs in the late 1990s coincided with the advent of web publishing tools that facilitated the posting of content by non-technical users who did not have much experience with HTML      
              
           </p>
     
              
             <img src="img/like.png" class="comment_like rounded float-right" data-toggle="tooltip" data-placement="bottom" title="Like">

             <img src="img/heart.png" class="comment_like rounded float-right" data-toggle="tooltip" data-placement="bottom" title="Love">

             <img src="img/confused.png" class="comment_like rounded float-right" data-toggle="tooltip" data-placement="bottom" title="Not Good">  
               
            <h6 class="r float-right" style="margin-right: 20px; color:#C03A2B; margin-top:5px;"><a href="">Reply</a></h6>
            
            <br>   
               
          </div>
          
          <hr><br>
          
          <!-- SECOND COMMENT -->
           <div class="comment text-muted">
          <img src="img/comment.svg" class=" float-left comment_profile">
           <h5><a href="" >NAME </a><small class="text-muted"> October 19, 2018</small></h5>    
           <p>The emergence and growth of blogs in the late 1990s coincided with the advent of web publishing tools that facilitated the posting of content by non-technical users who did not have much experience with HTML      
              
           </p>
     
              
             <img src="img/like.png" class="rounded comment_like float-right" data-toggle="tooltip" data-placement="bottom" title="Like">

             <img src="img/heart.png" class="rounded comment_like  float-right" data-toggle="tooltip" data-placement="bottom" title="Love">

             <img src="img/confused.png" class="rounded comment_like  float-right" data-toggle="tooltip" data-placement="bottom" title="Not Good">  
               
            <h6 class="r float-right" style="margin-right: 20px; color:#C03A2B; margin-top:5px;"><a href="">Reply</a></h6>
                   
            <br>   
               
          </div>
          
          <hr><br>
          
          
          
          
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