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
              $user_verified = $row['user_verified'];
          }
          
      }
      
      
      ?>


      <?php
     if(isset($_SESSION['username'])){
      //COUNTING NUMBER OF UNREAD MESSAGES
      $unread = "SELECT * FROM message WHERE message_receiver = '$username' AND message_read = 0 " ;
      $unread_result = mysqli_query($connect, $unread) ;
      $count = mysqli_num_rows($unread_result);


      ?>


      <?php if($count>0){ ?>
        <style type="text/css">
          #mes_alert{
            color: white;
          }
          #mes_count{
            color: white;
          }
        </style>
      <?php } else{ ?>
        <style type="text/css">
          #mes_alert{
            color: #CCCECF;
          }
          #mes_count{
            color: #CCCECF ;
          }
        </style>
      <?php }
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
          <a class="dropdown-item" href="profile.php?settings=1"><i class="fas fa-cog"></i> Settings</a>
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

        <?php if(isset($_SESSION['username'])){

          echo " <li class='nav-item ''>
        <a class='nav-link' href='message.php' id='mes_alert'><i class='fas fa-envelope'></i> Messages <span class='badge badge-secondary' id='mes_count'>{$count}</span></a>
          </li>" ;

        } ?>
        
        
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-users" id="online"></i> Online <span class='badge badge-secondary' id='online_count'></span></a>
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
      
      
      <?php

         if(isset($_GET['verify'])){

            if($_GET['verify']=='no'){
              echo "<div class='alert alert-danger container text-center' style='margin-top:30px;' role='alert'><b>Please Verify Your Email Account First</b></div>" ;
            }
            else{
              header("Location: index.php");
            }

         }



       ?>


       <div class='alert alert-danger container text-center' id='verify_alert' style='margin-top:30px; display: none;' role='alert'><b>Please Verify Your Email Account First</b></div>
      
      
      <!--PAGE CONTENT STARTS -->
      
      <div class="container">
        <div class="row">
         <div class="col-md-8">
             
             <!-- PHP QUERY -->
             
             <?php 



             //QUERY TO COUNT NUMBER OF POST
             $page_query = "SELECT * FROM posts" ;
             $page_result = mysqli_query($connect , $page_query);
             $page_count = mysqli_num_rows($page_result);

             $no_of_post = 5 ;

             $page_count = ceil($page_count/$no_of_post);

             if(isset($_GET['page'])){
              $page_no = $_GET['page'];
              $page = ($page_no-1)*$no_of_post;
             }
              else{
              $page = 0 ;
             }


               if(isset($_GET['page'])){

                $page_no = $_GET['page'];
                if($page_no < 1 || $page_no > $page_count){
                   header("Location: index.php");
                }


             }else{
              $page=0;
              $page_no =1;
             }



            

             
             $query = "SELECT * FROM posts WHERE post_status = 'published' LIMIT $page , $no_of_post" ;
             $post_result = mysqli_query($connect , $query) ;
             
             while($row = mysqli_fetch_assoc($post_result)){
                 
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

                 //QUERY TO FETCH NUMBER OF LIKES
                 $likes_query = "SELECT * FROM likes WHERE like_post_id = $post_id AND liked = 1";
                 $likes_result = mysqli_query($connect, $likes_query);
                 $noOfLike = mysqli_num_rows($likes_result);

             //   TO FIND WHETHER USER LIKED THIS POST OR NOT
                if(isset($_SESSION['username'])){
                  $like_username = $_SESSION['username'];
                  $find_islike_query = "SELECT * FROM likes WHERE like_post_id = $post_id AND like_username = '$like_username' AND liked = 1 ";
                  $islike_result = mysqli_query($connect , $find_islike_query);
                  $isLike = mysqli_num_rows($islike_result);
                } 
               
                 
            ?>     


           <!-- STYLING THE COLOR OF LIKE -->
             <style type="text/css">
      
               <?php if($isLike>0){ ?>
                #like<?php echo $post_id ?>{
                  color: blue ;
                }
               <?php }?> 

             </style>


             
             
              <div class="blog">
                 
            
                 <h2><a class="dec_link" href="<?php echo "post.php?p_id={$post_id}"; ?>"><?php echo $post_title ; ?></a></h2>
                 <h5 class="text-muted">  <img class="d-inline-block align-top auth_img" height="30" width="30" style="border-radius: 50%;" src="img/<?php echo $post_author_image ; ?>" ><a href="view_profile.php?username=<?php echo $post_username ; ?>"><span class="name text-muted"><?php echo "  ".$post_author ; ?></span></a></h5>
                 
                 <p class="text-muted"><i class="far fa-clock"></i> Posted on <?php echo $post_date ; ?></p>
                 <hr>
                 <img src="img/<?php echo $post_image; ?>" class="img-fluid" alt="Responsive image">
                 <hr>
                 
                 <p class="text-muted"><?php echo $post_content ; ?> </p>

                  <div class='alert alert-danger' id="<?php echo 'like_alert'.$post_id; ?>" style='margin-top:50px; display: none;' role='alert'><b>Please Register <span style="color:blue;"><a href='registration.php'>Here</a></span>.</b></div>

                 
                  <a href="<?php echo "post.php?p_id={$post_id}"; ?>"><button class="button" style="vertical-align:middle"><span>Read More </span></button></a>
                 
                 <h5 class="float-right likes text-muted" id="<?php echo 'noOfLike'.$post_id; ?>"><?php echo $noOfLike ;?></h5>
                 
                 <h4 class="float-right likes text-muted" onclick="liked(<?php echo $post_id ;?>)" data-toggle="tooltip" data-placement="bottom" title="Like"><i class="fas fa-thumbs-up" id="<?php echo 'like'.$post_id ;?>" ></i></h4>

                 <hr><br><br><br>
                 
             </div>
               
             
             
                 
            <?php } ?>    <!-- END OF WHILE LOOP -->
             
             
             
             <!-- PAGINATION -->
            
              <nav aria-label="Page navigation example container" >
                <ul class="pagination justify-content-center" >
                  <li class="page-item">
                    <a class="page-link" href="index.php?page=<?php echo ($page_no-1); ?>" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <?php for($i=1; $i<=$page_count; $i++){ ?>

               <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $i; ?>" style="margin-left: 3px; margin-right: 3px;"><?php echo $i ?></a></li>
                 
                  <?php }?>

                  <li class="page-item">
                      <a class="page-link" href="index.php?page=<?php echo ($page_no+1); ?>" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
                
                <br><br><br><br>
                
                  
            
            
         </div>
            
            
            
        <!-- SIDE BOXES OF PAGES -->    
        <?php include "includes/sidebox.php" ;  ?>   
            
            
            
            
        </div>  <!-- ROW END -->
      </div>    <!-- CONTAINER END -->
      
      
      <!-- FOOTER GOES HERE -->
      <?php include "includes/footer.php" ?>

      <!--EXTERNAL JS FILE -->
      <script type="text/javascript" scr="js/index.js"></script>
      <script type="text/javascript">
        
        
      

       const sendLike = async (id)=>{
       
           const call = await fetch(`async/like.php?p_id=${id}`);
           const data = await call.json();

           return {data: data};

       }

       const liked = (id)=>{

        sendLike(id).then((result)=>{
         
         if(result.data.flag==="true"){
          document.getElementById(`like${id}`).style.color = "blue" ;
          document.querySelector(`#like_alert${id}`).style.display = "none";
           document.querySelector(`#noOfLike${id}`).textContent = result.data.noOfLike ;
            document.querySelector(`#verify_alert`).style.display = "none";
          
         }

         else if(result.data.flag === "false"){
         document.getElementById(`like${id}`).style.color = "#6C757D";
           document.querySelector(`#like_alert${id}`).style.display = "none";
           document.querySelector(`#noOfLike${id}`).textContent = result.data.noOfLike ;
            document.querySelector(`#verify_alert`).style.display = "none";
          
         }
         
         else if(result.data.flag === "not_verified"){
           document.querySelector(`#verify_alert`).style.display = "block";
         }

          else {
            document.querySelector(`#like_alert${id}`).style.display = "block";
            document.querySelector(`#verify_alert`).style.display = "none";
          
         }
        
         // console.log(result);
        }).catch(error=>error)
       }

   

      </script>
      
      
       <script type="text/javascript" src="js/online.js"></script>
      
      
  </body>
</html>