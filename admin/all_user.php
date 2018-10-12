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
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-clipboard"></i> Posts</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="add_post.php">Add Post</a>
                  <a class="dropdown-item" href="all_post.php">All Post</a>
                </div>
              </li>
              <li class="nav-item ">
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
             <h2 class="heading"><b><i class="fas fa-users"></i> All Users</b></h2><hr><br> 
             
             <?php
             
             //QUERY TO DELETE COMMENTS
             
             if(isset($_GET['delete'])){
                 
                 
                if($_GET['delete']=='success'){
                      echo "<div class='alert alert-success' style='margin-top:10px;' role='alert'><b>User Deleted.</b></div>" ;
                 }
                 
                 else{
                 
                 $user_id = $_GET['delete'];
                 $del_query = "DELETE FROM users WHERE user_id = $user_id";
                 $del_result = mysqli_query($connect, $del_query);
                 
                 if(!$del_query){
                     die("QUERY FAILED..".mysqli_error($connect));
                 }
                 
                else{
                     header("Location: all_user.php?delete=success");
                 }
             }        
        }
             
             
             //CATCHING THE STATUS CHANGED REQUEST
             if(isset($_GET['role'])){
                 
                 $role = $_GET['role'];
                 if($role=='changed'){
                      echo "<div class='alert alert-success' style='margin-top:10px;' role='alert'><b>Role Updated.</b></div>" ;
                 }
                 
                 else{
                     header("Location: all_user.php");
                 }
             }
              
             
             
             
             ?>
             
             
             <!-- TABLE -->
             <table class="table table-striped table-hover table-bordered">
              <thead>
                 <tr>
                   <th>Id</th>
                   <th>Image</th>      
                   <th>Username</th>     
                   <th>Email</th>
                   <th>First Name</th>
                   <th>Last Name</th>
                   <th>Role</th> 
                   <th>Edit Role</th>
                   <th>Edit</th>     
                 </tr>
              </thead>
              <tbody>
                  
                  
                  <?php // SHOW ALL DATA 
                  
                   $show_query = "SELECT * FROM users" ;
                   $show_result = mysqli_query($connect , $show_query) ;
                   
                   while($row = mysqli_fetch_assoc($show_result)){
                       
                       $user_id = $row['user_id'];
                       $username = $row['username'];
                       $user_email = $row['user_email'];
                       $first_name = $row['user_firstname'];
                       $last_name = $row['user_lastname'];
                       $role = $row['user_role'];
                       $user_image = $row['user_image'];
                       
                       
                        echo "<tr>" ;
                        echo "<td>$user_id</td>" ;
                        echo "<td><img src='../img/$user_image' height ='50' width='50' style='border-radius:50%;'></td>" ;
                        echo "<td>$username</td>" ;
                        echo "<td>$user_email</td>" ;
                        echo "<td>$first_name</td>" ;
                        echo "<td>$last_name</td>" ;
                        echo "<td>$role</td>"   ;
                       
                        if($role!=='Admin')
                        echo "<td><a href='all_user.php?r_admin=$user_id'>Make Admin</td>"   ; 
                       
                        else
                        echo "<td><a href='all_user.php?r_subs=$user_id'>Remove admin</td>"   ; 
                       
                        echo "<td><a href='all_user.php?delete=$user_id'><i class='far fa-times-circle'></i></a>
                        <a href='update_user.php?update=$user_id' class='float-right'><i class='fas fa-pen'></i></a></td>"   ;  
                        echo"</tr>";
                   }
                  
                  ?>
                
             </tbody>     
             </table>
             
             
             <?php
             
             // CHANGING THE STATUS OF COMMENT
             
             //APPROVING QUERY
             if(isset($_GET['r_admin'])){
                 
                 $user_id = $_GET['r_admin'];
                 $upd_query = "UPDATE users SET user_role = 'Admin' WHERE user_id = $user_id";
                 $upd_result = mysqli_query($connect, $upd_query);
                 
                 if(!$upd_result){
                     die("QUERY FAILED...... ".mysqli_error($connect));
                 }
                 
                 else{
                     header("Location: all_user.php?role=changed");
                 }
                 
             }
             
             //UNAPPROVING QUERY
              if(isset($_GET['r_subs'])){
                 
                 $user_id = $_GET['r_subs'];
                 $upd_query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = $user_id";
                 $upd_result = mysqli_query($connect, $upd_query);
                 
                 if(!$upd_result){
                     die("QUERY FAILED...... ".mysqli_error($connect));
                 }
                 
                 else{
                     header("Location: all_user.php?role=changed");
                 }
                 
             }
             
             
             
             ?>
             
            
        </div>    
            
        </div> <!-- ROW END -->
            
      
      
      <!-- FOOTER -->
    <?php include "includes/footer.php" ; ?>
      
      
