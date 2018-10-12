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
             <h2 class="heading"><b><i class="fas fa-user-plus"></i> Enter User's Details</b></h2><hr><br>   
            
             <?php 
              if(isset($_POST['add_user'])){
                  
                  $firstname = $_POST['firstname'];
                  $lastname = $_POST['lastname'];
                  $username = $_POST['username'];
                  $email = $_POST['email'] ;
                  $password = $_POST['password'];
                  $role = $_POST['role'];
                  $user_image = $_FILES['image']['name'];
                  $user_image_tmp = $_FILES['image']['tmp_name'] ;
                 
                  
                  move_uploaded_file($user_image_tmp , "../img/$user_image") ;
                  
                  if(empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($username)){
                  echo "<div class='alert alert-danger' style='margin-bootom:20px; border-radius:0;' role='alert'><b>Enter Required Fields..!</b></div>";
                                 
                  }
                  
                  else{
                  
                  $add_query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_role, user_image) VALUES ('{$username}', '{$password}', '{$firstname}', '{$lastname}', '{$email}', '{$role}', '{$user_image}') ";
                  
                  $add_result = mysqli_query($connect, $add_query) ;
                      
                   if(!$add_result){
                       die("QUERY FAILED...!!".mysqli_error($connect));
                   }      
                  
                else{
                  echo "<div class='alert alert-success' style='margin-bootom:20px; border-radius:0;' role='alert'><b>User Added Successfully</b></div>";
                      }
                  }
              }
             
             ?>
             
             <!-- FORM -->
         <form class="container" action="" method="post" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="firstname"><b>First Name</b></label>
              <input type="text" class="form-control" placeholder="First Name" name="firstname">
            </div>
            <div class="form-group col-md-6">
                <label for="lastname"><b>Last Name</b></label>
              <input type="text" class="form-control" placeholder="Last Name" name="lastname">
            </div>
          </div>
                 
          <div class="form-row">
              
            <div class="form-group col-md-6">
                <label for="username"><b>Username</b></label>
              <input type="text" class="form-control" name="username">
            </div>
              
             <div class="form-group col-md-6">
                <label for="role"><b>Role</b></label>
                <select class="form-control" name="role">
                <option value="Subscriber">Select Option</option>    
                 <option>Subscriber</option>
                 <option>Admin</option>   
                </select>
            </div>   
<!--
            <div class="form-group col-md-6">
                <label for="status"><b>Post Status</b></label>
              <input type="text" class="form-control" placeholder="status" name="status">
            </div>
-->
          </div>
                
           <div class="form-group">
            <label for="image"><b>Image</b></label>
            <input type="file" class="form-control-file" name="image" >
          </div>     
         <br>     
                 
          <div class="form-row">
             <div class="form-group col-md-6">
              <label for="Email"><b>Email</b></label>
              <input type="email" class="form-control" name="email">
            </div>
              
            <div class="form-group col-md-6">
              <label for="password"><b>Password</b></label>
              <input type="password" class="form-control" name="password">
            </div>
              
          </div>
             
         <br>
             
          <button type="add" class="btn btn-primary d-block mx-auto btn-block" style="border-radius:0;" name="add_user">Add User</button>
        </form>
           
        </div>    
         
            
        </div> <!-- ROW END -->
      
      
      <!-- FOOTER -->
    <?php include "includes/footer.php" ; ?>
      
      
