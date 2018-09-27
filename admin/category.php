 <!-- HEADER -->
   <?php include "includes/header.php" ; ?>
      
 <style>
     .margin_link{
         margin-right: 10px;
     }
 
 </style>      


  <!-- NAVBAR -->
  <?php include "includes/nav.php" ;?>
      
        <!--PAGE CONTENT -->
        <div class="row">
         <div class="col-md-2 side-bar">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark down-nav">
            
             <ul class="navbar-nav flex-column navbar-dark bg-dark">
                      
              <li class="nav-item">
                   <!-- PROFILE IMAGE --> 
                <img src="img/icon.png" class="rounded mx-auto d-none  d-sm-none d-md-block" >
                 <div class="img-space  d-none  d-sm-none d-md-block "></div>  
              </li>
                 
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="category.php"><i class="fas fa-chart-pie"></i> Categories</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-clipboard"></i> Posts</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Add Post</a>
                  <a class="dropdown-item" href="#">All Post</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="far fa-comments"></i> Comments</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-users"></i> Users</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Add Post</a>
                  <a class="dropdown-item" href="#">All Post</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="far fa-user-circle"></i> Profile</a>
              </li>     
            </ul>
                
            <div class="space d-none  d-sm-none d-md-block"></div>    
            </nav>        
          
         </div>
            
        <!-- MAIN CONTENT -->
         <div class="col-md-10">
             
             <h2 class="heading"><b>Welcome to Admin Page</b></h2><hr><br>
             
             
            <div class="row container">
            
            <!-- ADD CATEGORY BOX -->    
            <div class="col-md-6" style="margin-top: 10px;">
                
                <?php 
                
                // TO INSERT THE CATEGORY
                
                if(isset($_POST['add'])){
                    
                    $cat_title = $_POST['cat_title'] ;
                    
                    if($cat_title == "" || empty($cat_title)){
                        
                        echo "<div class='alert alert-danger' style='margin-bootom:20px; border-radius:0;' role='alert'><b>Enter the Category..!</b></div>";
                    }
                    
                    else{
                        
                     $cat_send_query = "INSERT INTO category(cat_title) VALUES ('{$cat_title}')" ;
                     $cat_query_result = mysqli_query($connect, $cat_send_query) ;
                        
                        if(!$cat_query_result){
                            die("QUERY FAILED").mysqli_error($connect);
                        }
                        
                        else{
                         echo "<div class='alert alert-success' style='margin-bootom:20px; border-radius:0;' role='alert'><b>Category Added</b></div>";
                           
                        }
                        
                    }
                    
                }
    
                
                ?>
    
                
                <h5 class="mb-2"><b>Add Category</b></h5>
                
                <form action="category.php" method="post" class="form-inline">
                  <div class="form-group ">
                    <input type="text" class="form-control" placeholder="Category" name="cat_title">
                  </div>
                  <button type="submit" class="btn btn-primary" style="margin-left:5px; border-radius:0;" name="add">Add</button>
                </form>
            </div>
            
            <!-- EDIT CATEGORY BOX -->    
            <div class="col-md-6" style="margin-top: 10px;">
               
                <?php // EDIT AND UPDATING
                if(isset($_GET['edit'])){
                    
                    $upd_cat_id = $_GET['edit'] ;
                    
                    include "includes/edit_cat.php";
                    
                }
                
                else{
                    ?>
                    <h5 class="mb-2"><b>Edit Category</b></h5>
                
                <form action="category.php" method="post" class="form-inline">
                  <div class="form-group ">
                   <input type="text" class="form-control" placeholder="Category" name="cat_title" value="">
                  </div>
                  <button type="submit" class="btn btn-primary" style="margin-left:5px; border-radius:0;" name="update">Update</button>
                </form>
             <?php }// if ?>
            </div>  
        </div>        
             
             <!-- TABLE -->
             
             <div class="col-md-8" style="margin-top: 40px;">
             
             <table class="table table-striped table-hover table-bordered">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Category Title</th>
                </tr>
              </thead>
              <tbody>
                
                <?php  
                // SHOW CATEGORIES
                  
                 $query = "SELECT * FROM category" ;
                 $cat_result = mysqli_query($connect , $query);
                 
                while($row = mysqli_fetch_assoc($cat_result)){      

                $cat_title = $row['cat_title'] ;
                $cat_id = $row['cat_id'];    

                echo "<tr>" ;
                echo  "<th scope='row'>{$cat_id}</th>" ;
                echo  "<td>{$cat_title}<span class='float-right'><a href='category.php?edit={$cat_id}' class='margin_link'><i class='fas fa-pencil-alt'></i></a>
                <a href='category.php?delete={$cat_id}'><i class='far fa-times-circle'></i></a></span></td>" ;
                echo "</tr>" ;

                }
                    
                ?>      
                  
                  
                <?php 
                // TO DELETE CATEGORIES
                  
                  if(isset($_GET['delete'])){
                      
                  $del_cat_id = $_GET['delete'] ;
                  $query_delete = "DELETE FROM category WHERE cat_id = {$del_cat_id}" ;
                  $del_query_result = mysqli_query($connect , $query_delete) ;
                  header("Location: category.php") ;
                      
                  }
                  
                  
                 ?>  
                  
              </tbody>
            </table>
             
             </div> 
                 
        </div>    
        </div> <!-- ROW DIV -->
      
      
      <!-- FOOTER -->
    <?php include "includes/footer.php" ; ?>
      
      
