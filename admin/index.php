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


     //CALCULATING DRAFT POST
     $draft_query = "SELECT * FROM posts WHERE post_status = 'Draft' ";
     $draft_result = mysqli_query($connect, $draft_query) ;
     $draft_count = mysqli_num_rows($draft_result);

     $pub_post_count = $post_count - $draft_count ;


    //CALCULATING APPROVED COMMENT
     $ap_com_query = "SELECT * FROM comments WHERE comment_status = 'Approved' ";
     $ap_com_result = mysqli_query($connect, $ap_com_query) ;
     $ap_com_count = mysqli_num_rows($ap_com_result);
     
     $unap_com_count = $com_count - $ap_com_count ;

     //CALCULATING NUMBER OF ADMINS
     $admin_query = "SELECT * FROM users WHERE user_role = 'Admin' ";
     $admin_result = mysqli_query($connect, $admin_query) ;
     $admin_count = mysqli_num_rows($admin_result);
     
     $subs_count = $user_count - $admin_count ;

     //CALCULATING VERIFIED USERS
     $verified_query = "SELECT * FROM users WHERE user_verified = 1 ";
     $verified_result = mysqli_query($connect , $verified_query) ;
     $verified_count = mysqli_num_rows($verified_result);

     $not_verfied_count = $user_count - $verified_count ;

    ?>
 
  
      
        <!--PAGE CONTENT -->
        <div class="row">
         <div class="col-md-2 side-bar" style="height:600px;overflow:auto;">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark down-nav">
            
             <ul class="navbar-nav flex-column justify-content-start  navbar-dark bg-dark">
                      
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
                   
            </ul>
                
            <div class="space d-none  d-sm-none d-md-block"></div>    
            </nav>        
          
         </div>
            
        <!-- MAIN CONTENT -->
         <div class="col-md-10" style="height:600px;overflow:auto;">
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
                    <h6>View Details <a href="all_post.php" class="float-right"><i class="fas fa-arrow-circle-right"></i></a></h6>
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
                    <h6>View Details <a href="all_comments.php" class="float-right"><i class="fas fa-arrow-circle-right"></i></a></h6>
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
                    <h6>View Details <a href="all_user.php" class="float-right"><i class="fas fa-arrow-circle-right"></i></a></h6>
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
                    <h6>View Details <a href="category.php" class="float-right"><i class="fas fa-arrow-circle-right"></i></a></h6>
                </div>     
                </div>
              </div>
                 
            </div> <hr><br> <!-- CARD ROW ENDS -->
            
             
             <!-- GOOGLE CHARTS -->
             <script type="text/javascript">
              google.charts.load('current', {'packages':['bar']});
              google.charts.setOnLoadCallback(drawChart);

              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Data', 'All', 'Approved', 'Unapproved', 'Admin', 'Subscriber'],
                    
                    <?php 
                    
//                    $element_post = ['Total Post', 'Draft ', 'Published'];
//                    $value_post = [$post_count , $draft_count, $pub_post_count] ;
//                    
//                    for($i = 0 ; $i < 3 ; $i++){
//                        
//                        echo "['{$element_post[$i]}'" . ",". "{$value_post[$i]}]," ;
//                        
//                    }
//                    
                    
                      echo "['Post', {$post_count}, {$pub_post_count}, {$draft_count}, 0, 0]," ;
                      echo "['Comments', {$com_count}, {$ap_com_count}, {$unap_com_count}, 0 , 0]," ;
                      echo "['Users', {$user_count},  {$verified_count} , {$not_verfied_count} , {$admin_count} , {$subs_count}]," ;
                    //  echo "['Categories', {$cat_count} , 0 , 0 , 0 , 0]" ;
                    
                    ?>
                    
                    
                    
//          ['Year', 'Sales', 'Expenses', 'Profit'],
//          ['2014', 1000, 400, 200],
//          ['2015', 1170, 460, 250],
//          ['2016', 660, 1120, 300],
//          ['2017', 1030, 540, 350]
                 
                ]);

                var options = {
                  chart: {
                    title: '',
                    subtitle: '',
                  }
                };

                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
              }
            </script>
             
             
             <div id="columnchart_material" style="width: 80%; height: 350px; margin-top: 50px;" class="container"></div>
             
             
            </div>    
        </div> <!-- MAIN ROW ENDS -->
      
      
      <!-- FOOTER -->
    <?php include "includes/footer.php" ; ?>
      
      
