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
      
      
     <?php 
      //QUERY TO SHOW INFO OF USER IN PROFILE BAR
      
      if(isset($_SESSION['username'])){
        $username =  $_SESSION['username'] ;
          
          $prof_query = "SELECT * FROM users WHERE username = '$username' " ;
          $prof_result = mysqli_query($connect, $prof_query);
          
          while($row = mysqli_fetch_assoc($prof_result)){
              $firstname = $row['user_firstname'];
              $lastname = $row['user_lastname'];
              $image = $row['user_image'];
              $role = $row['user_role'];
          }
          
      }
      
      
      ?>
      
      
      <!-- NAVBAR  -->  
      
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php"><img src="img/icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Fusion</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
    <!-- PROFILE BAR -->  
    <?php if(isset($_SESSION['username'])){ ?>  
    <ul  class="navbar-nav container justify-content-end " >
     <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="far fa-user"></i> <?php echo $firstname . " " . $lastname . " "; ?></a>
        <div class="dropdown-menu drop-link">
          <a class="dropdown-item" href="profile.php"><i class="far fa-user"></i> Profile</a>
          <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Settings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="includes/logout.php"><i class="fas fa-power-off"></i> Log Out</a>
        </div>
      </li> 
     </ul>  
      <?php } ?>
      
    <ul class="navbar-nav container justify-content-end list">
      <li class="nav-item active">
          <a class="nav-link" href="index.php"><i class ="fas fa-home"></i> Home<span class="sr-only">(current)</span></a>
      </li>
        
        
        <?php if(isset($_SESSION['username'])){ 
              if($role == 'Admin'){   
          
            echo  "<li class='nav-item'>
                <a class='nav-link' href='admin/index.php'><i class='fas fa-globe'></i> Admin</a>
              </li>";  } 
        } ?>
        
        
        <?php if(!isset($_SESSION['username'])){ ?>
      <li class="nav-item">
        <a class="nav-link" href="registration.php"><i class="fas fa-user-plus"></i> Register</a>
      </li>
        <?php }?>
        
        
       <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-phone"></i> Contact</a>
      </li>

    </ul>
      
  </div>
</nav>
      
      
      
      
      
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
             
             if(isset($_POST['submit'])){
                 
                  $search = $_POST['search'] ;
                  $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'" ;
                 
                  $search_result = mysqli_query($connect , $query);
                 
                  if(!$search_result){
                      die("QUERY FAIL").mysqli_error($connect) ;
                  }
                 
                 
                  $count = mysqli_num_rows($search_result) ;
                 
                  if($count == 0){
                    echo "<div class='alert alert-danger' role='alert'>NO RESULT FOUND...!</div>" ;
                  }
                 
                 else{
                 
                 while($row = mysqli_fetch_assoc($search_result)){
                 $post_id = $row['post_id'];
                 $post_title = $row['post_title'];
                 $post_author = $row['post_author'] ;
                 $post_date = $row['post_date'] ;
                 $post_image = $row['post_image'] ;
                 $post_content = $row['post_content'];
                 $post_author_image = $row['post_author_image'];
                 $post_user_id = $row['post_user_id'];

                  //QUERY TO FETCH USERNAME USING USER ID
                 $username_query = "SELECT * FROM users WHERE user_id = $post_user_id ";
                 $username_result = mysqli_query($connect, $username_query);
                 $username_row = mysqli_fetch_assoc($username_result);
                 $post_username = $username_row['username'] ;
                 
                 
            ?>     
             
             
              <div class="blog">
             
                 <h2><a class="dec_link" href="<?php echo "post.php?p_id={$post_id} "?>"><?php echo $post_title ; ?></a></h2>
                 <h5 class="text-muted">  <img class="d-inline-block align-top auth_img" height="30" width="30" style="border-radius: 50%;" src="img/<?php echo $post_author_image ; ?>" ><a href="view_profile.php?username=<?php echo $post_username; ?>"><span class="name text-muted"><?php echo "  ".$post_author ; ?></span></a></h5>
                 
                 <p class="text-muted"><i class="far fa-clock"></i> Posted on <?php echo $post_date ; ?></p>
                 <hr>
                 <img src="img/<?php echo $post_image; ?>" class="img-fluid" alt="Responsive image">
                 <hr>
                 
                 <p class="text-muted"><?php echo $post_content ; ?> </p>
                 
                <a href="<?php echo "post.php?p_id={$post_id}"; ?>"><button class="button" style="vertical-align:middle"><span>Read More </span></button></a>
                 
                 <h5 class="float-right likes text-muted">100</h5>
                 <h4 class="float-right likes text-muted" data-toggle="tooltip" data-placement="bottom" title="Like"><i class="fas fa-thumbs-up"></i></h4>
                 
                 <hr><br><br><br>
                 
             </div>
               
             
             
                 
            <?php } ?>
             
                   <!-- PAGINATION -->
                <button type="button" class="btn btn-outline-info page-link float-left" tabindex="-1">&larr; Previous</button>
                  
                <button type="button" class="btn btn-outline-info page-link float-right">Next &rarr;</button> 
                 
            <?php } 
             
    }
            else{
                 echo "<div class='alert alert-danger' role='alert'>NO RESULT FOUND...!</div>" ;
            } 
             ?>
             
             
              <!-- END OF WHILE LOOP -->
             
             
             
             
             
             
         
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