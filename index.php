<?php include "includes/connection.php" ; ?>


<!doctype html>
<html lang="en">
  <head>
    
    <?php include "includes/links.php" ; ?>  
    
    <!-- EXTERNAL CSS FILE -->
     <link rel="stylesheet" type="text/css" href="css/home.css">    
      
    <title>Fusion</title>
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
    <ul class="navbar-nav container justify-content-end list">
      <li class="nav-item active">
          <a class="nav-link" href="index.php"><i class ="fas fa-home"></i> Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin/index.php"><i class="fas fa-globe"></i> Admin</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-phone"></i> Contact</a>
      </li>    
    </ul>
  </div>
</nav>
      
      <!-- NAVBAR ENDS HERE -->
      
      
      
      
      
      <!--MAIN PAGE HEADER-->
      
      <div class="header">
      
        <img src="img/icon2.png" class="rounded mx-auto d-block">
        <h2>Welcome to Fusion</h2>
        <p>Fusion is a combination of a blog and a social platform <br><span class = "d-none d-sm-block"> for Developers, Technology enthusiast, students and anyone who loves technology and Science.</span></p>  
      
      
      </div>
      <!--HEADER ENDS HERE -->
      
      
      
      
      
      <!--PAGE CONTENT STARTS -->
      
      <div class="container">
        <div class="row">
         <div class="col-md-8">
             
             <!-- PHP QUERY -->
             
             <?php 
             
             $query = "SELECT * FROM posts" ;
             $post_result = mysqli_query($connect , $query) ;
             
             while($row = mysqli_fetch_assoc($post_result)){
                 
                 $post_title = $row['post_title'];
                 $post_author = $row['post_author'] ;
                 $post_date = $row['post_date'] ;
                 $post_image = $row['post_image'] ;
                 $post_content = $row['post_content'];
                 $post_author_image = $row['post_author_image'];
                 
                 
            ?>     
             
             
              <div class="blog">
             
                 <h2><a class="dec_link" href=""><?php echo $post_title ; ?></a></h2>
                 <h5 class="text-muted">  <img class="d-inline-block align-top auth_img" height="30" width="30" style="border-radius: 50%;" src="img/<?php echo $post_author_image ; ?>" ><a href=""><span class="name text-muted"><?php echo "  ".$post_author ; ?></span></a></h5>
                 
                 <p class="text-muted"><i class="far fa-clock"></i> Posted on <?php echo $post_date ; ?></p>
                 <hr>
                 <img src="img/<?php echo $post_image; ?>" class="img-fluid" alt="Responsive image">
                 <hr>
                 
                 <p class="text-muted"><?php echo $post_content ; ?> </p>
                 
                 <button class="button" style="vertical-align:middle"><span>Read More </span></button>
                 
                 <img src="img/confused.png" class="rounded float-right likes" data-toggle="tooltip" data-placement="bottom" title="Not Good">
                 
                 <img src="img/like.png" class="rounded float-right likes" data-toggle="tooltip" data-placement="bottom" title="Like">
                 
                 <img src="img/heart.png" class="rounded float-right likes" data-toggle="tooltip" data-placement="bottom" title="Love">
                 
                 <hr><br><br><br>
                 
             </div>
               
             
             
                 
            <?php } ?>    <!-- END OF WHILE LOOP -->
             
             
             
             
             
             
         
             <!--FIRST POST -->
<!--
             <div class="blog">
             
                 <h2><a class="dec_link" href="">BLOG TITLE</a></h2>
                 <h5 class="text-muted"> by    <img class="d-inline-block align-top" height="30" width="30" src="img/icon.png"><a href=""><span class="name text-muted">BLOGGER NAME</span></a></h5>
                 
                 <p class="text-muted"><i class="far fa-clock"></i> Posted on 10 september 2018</p>
                 <hr>
                 <img src="img/post.svg" class="img-fluid" alt="Responsive image">
                 <hr>
                 
                 <p class="text-muted">The emergence and growth of blogs in the late 1990s coincided with the advent of web publishing tools that facilitated the posting of content by non-technical users who did not have much experience with HTML </p>
                 
                 <button class="button" style="vertical-align:middle"><span>Read More </span></button>
                 
                 <img src="img/confused.png" class="rounded float-right likes" data-toggle="tooltip" data-placement="bottom" title="Not Good">
                 
                 <img src="img/like.png" class="rounded float-right likes" data-toggle="tooltip" data-placement="bottom" title="Like">
                 
                 <img src="img/heart.png" class="rounded float-right likes" data-toggle="tooltip" data-placement="bottom" title="Love">
                 
                 <hr><br><br><br>
                 
             </div>
-->
             
             <!-- SECOND BLOG -->
<!--
              <div class="blog">
             
                 <h2><a class="dec_link" href="">BLOG TITLE</a></h2>
                 <h5 class="text-muted"> by    <img class="d-inline-block align-top" height="30" width="30" src="img/icon.png"><a href=""><span class="name text-muted">BLOGGER NAME</span></a></h5>
                 
                 <p class="text-muted"><i class="far fa-clock"></i> Posted on 10 september 2018</p>
                 <hr>
                 <img src="img/post.svg" class="img-fluid" alt="Responsive image">
                 <hr>
                 
                 <p class="text-muted">The emergence and growth of blogs in the late 1990s coincided with the advent of web publishing tools that facilitated the posting of content by non-technical users who did not have much experience with HTML </p>
                 
                 <button class="button" style="vertical-align:middle"><span>Read More </span></button>
                 
                 <img src="img/confused.png" class="rounded float-right likes" data-toggle="tooltip" data-placement="bottom" title="Not Good">
                 
                 <img src="img/like.png" class="rounded float-right likes" data-toggle="tooltip" data-placement="bottom" title="Like">
                 
                 <img src="img/heart.png" class="rounded float-right likes" data-toggle="tooltip" data-placement="bottom" title="Love">
                 
                 <hr><br><br>
                 
             </div>
-->
             
             
             <!-- PAGINATION -->
            
                <button type="button" class="btn btn-outline-info page-link float-left" tabindex="-1">&larr; Previous</button>
                  
                <button type="button" class="btn btn-outline-info page-link float-right">Next &rarr;</button>  
                
                <br><br><br><br>
                
                  
            
            
         </div>
            
            
            
        <!-- SIDE BOXES OF PAGES -->    
        <?php include "includes/sidebox.php" ;  ?>   
            
            
            
            
        </div>  <!-- ROW END -->
      </div>    <!-- CONTAINER END -->
      
      
      <!-- FOOTER GOES HERE -->
      <?php include "includes/footer.php" ?>
      
      
      
  </body>
</html>