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
                <img src="../img/<?php echo $_SESSION['user_image'];?>" class=" mx-auto d-none  d-sm-none d-md-block" height="70" width="70" style="border-radius:50%;" >
                 <div class="img-space  d-none  d-sm-none d-md-block "></div>  
              </li>
                 
              <li class="nav-item">
                <a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="category.php"><i class="fas fa-chart-pie"></i> Categories</a>
              </li>
              <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-clipboard"></i> Posts</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="add_post.php">Add Post</a>
                  <a class="dropdown-item" href="all_post.php">All Post</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="all_comments.php"><i class="far fa-comments"></i> Comments</a>
              </li>
              <li class="nav-item dropdown active">
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
             <h2 class="heading"><b><i class="fas fa-pen"></i> Update User Details</b></h2><hr><br>   
             
             
             <!-- CATCHING THE DATA -->
             
             <?php 
             if(isset($_GET['status'])){
                 if($_GET['status']=='success'){
                   echo "<div class='alert alert-success' style='margin-bootom:20px; border-radius:0;' role='alert'><b>User Updated Succesfully</b></div>";
                    
                 }
             }
             
             
             
             if(isset($_GET['update'])){
                 
                 $user_id = $_GET['update'] ;
                 
                 $show_query = "SELECT * FROM users WHERE user_id = {$user_id}" ;
                 $show_result = mysqli_query($connect, $show_query);
                 
                 while($row = mysqli_fetch_assoc($show_result)){
                   $user_id = $row['user_id'];
                   $username = $row['username'];
                   $firstname = $row['user_firstname'];
                   $lastname = $row['user_lastname'];
                   $user_image = $row['user_image'];
                   $email = $row['user_email'];   
                   $password = $row['user_password'];     
                 }
                 
                 
                 
                 // UPDATING THE USER
                 
                 if(isset($_POST['upd_user'])){
                     
                     $upd_firstname = $_POST['firstname'] ;
                     $upd_lastname = $_POST['lastname'] ;
                     $upd_email = $_POST['email'] ;
                     $upd_password = $_POST['password'] ;
                     $upd_username = $_POST['username'] ;
                     $upd_image = $_FILES['image']['name'] ;
                     $upd_tmp_image = $_FILES['image']['tmp_name'];
                
                     move_uploaded_file($upd_tmp_image, "../img/$upd_image");
                     
                     
                     // TO FILL THE IMAGE IF NOT UPDATED
                     if(empty($upd_image)){
                         $img_query = "SELECT * FROM users WHERE user_id = $user_id";
                         $img_result = mysqli_query($connect, $img_query) ;
                         
                         while($row = mysqli_fetch_assoc($img_result)){
                             $upd_image = $row['user_image'];
                         }
                     }
                     
                     
                 //CONDITION FOR VALIDATION OF FIELDS
                 if(empty($upd_firstname) || empty($upd_lastname) || empty($upd_email) || empty($upd_password) || empty($upd_username)){
                         
                     echo "<div class='alert alert-danger' style='margin-bootom:20px; border-radius:0;' role='alert'><b>Enter The Required Fields</b></div>";
                 }
                     
                else{     
                     
                     $upd_query = "UPDATE users SET username = '{$upd_username}', user_password = '{$upd_password}', user_email = '{$upd_email}', user_firstname = '{$upd_firstname}', user_lastname = '{$upd_lastname}', user_image = '{$upd_image}' WHERE user_id = $user_id" ;
                     
                     $upd_result = mysqli_query($connect , $upd_query);
                     
                     if(!$upd_result){
                         die("QUERY FAILED..!!  ".mysqli_error($connect));
                     }
                     
                     
                     
                     else{
                         header("LOCATION: update_user.php?update={$user_id}&status=success");
                     }
                     
                 }
             }
             
          }
             
             else{
                 header("Location: all_user.php");
             }
             
             
             ?>
             
             
             
             <!-- FORM -->
             
        <form class="container" action="" method="post" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="firstname"><b>First Name</b></label>
              <input type="text" class="form-control" value="<?php echo $firstname; ?>" name="firstname">
            </div>
            <div class="form-group col-md-6">
                <label for="lastname"><b>Last Name</b></label>
              <input type="text" class="form-control" value="<?php echo $lastname ;?>" name="lastname">
            </div>
          </div>
                 
          <div class="form-row">
              
            <div class="form-group col-md-6">
                <label for="username"><b>Username</b></label>
              <input type="text" class="form-control" value="<?php echo $username; ?>" name="username">
            </div>
              
            <div class="form-group col-md-6">
            <label for="image"><b>Image</b></label>
            <img src="../img/<?php echo $user_image; ?>" height="40" width="50" style="margin-left: 40px; border-radius:50%;">        
            <input type="file" class="form-control-file" name="image" >
          </div> 
              
          </div> 
                 
          <div class="form-row">
             <div class="form-group col-md-6">
              <label for="Email"><b>Email</b></label>
              <input type="email" class="form-control" value="<?php echo $email; ?>" name="email">
            </div>
              
            <div class="form-group col-md-6">
              <label for="password"><b>Password</b></label>
              <input type="password" class="form-control" value="<?php echo $password; ?>" name="password">
            </div>
              
          </div>
             
         <br>
             
          <button type="update" class="btn btn-primary d-block mx-auto btn-block" style="border-radius:0;" name="upd_user">Update User</button>
        </form>
         
        </div>      
        </div> <!-- ROW END -->
      
      
      <!-- FOOTER -->
    <?php include "includes/footer.php" ; ?>
      
      
