<?php 

include "includes/connection.php" ;




?>




<!-- WELCOME MOHAMMAD ANAS -->

<!-- Lets code -->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      
      <!--Font Awesome -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link href="img/icon.png" rel="icon" type ="image/gif" sizes="any"> 
      
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
        <a class="nav-link" href="#"><i class="fas fa-globe"></i> About</a>
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
         
             <!--FIRST POST -->
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
             
             <!-- SECOND BLOG -->
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
             
             
             <!-- PAGINATION -->
            
                <button type="button" class="btn btn-outline-info page-link float-left" tabindex="-1">&laquo Previous</button>
                  
                <button type="button" class="btn btn-outline-info page-link float-right">Next &raquo</button>  
                
                <br><br><br><br>
                
                  
            
            
         </div>
            
            
            
        <!-- SIDE BOXES OF PAGES -->    
         <div class="col-md-4">
             <!-- BLOG SEARCH BOX -->
            <div class="card bg-light side_box">
              <div class="card-body">
                <h5 class="text-muted">BLOG SEARCH</h5>
                 <div class="input-group">
                  <input type="text" class="form-control">
                    <span class="input-group-btn">
                       <button class="btn btn-default search_icon" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </span>
                  </div>  
              </div>
            </div>
             
            <!-- CATEGORY BOX -->
              <div class="card bg-light side_box">
              <div class="card-body">
                <h5 class="text-muted">WHAT'S NEW</h5>
                <a href="">Category</a> <a href="" class="float-right">Category</a><br>
                <a href="">Category</a> <a href="" class="float-right">Category</a><br>
                <a href="">Category</a> <a href="" class="float-right">Category</a><br>
                <a href="">Category</a> <a href="" class="float-right">Category</a><br>      
                  
              </div>
            </div>
            
         </div>    
            
            
            
            
        </div>
      </div>
      
      
      <!-- FOOTER GOES HERE -->
      <div class="footer">
       <div class = "container">
          <h4><img src="img/icon2.png" height="50" width="50"> Fusion</h4>
          <p>All Rights Reserved <i class="far fa-copyright"></i> 2018</p>   
       </div>     
      </div>
      
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>