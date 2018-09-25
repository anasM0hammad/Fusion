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
             
             
             <!-- CATEGORY BOX -->
            <div class="col-md-6">
                <h5 class="mb-2"><b>Add Category</b></h5>
                
                <form action="" method="" class="form-inline">
                  <div class="form-group ">
                    <input type="text" class="form-control" placeholder="Category" name="cat-title">
                  </div>
                  <button type="submit" class="btn btn-primary" style="margin-left:5px; border-radius:0;" name="add">Add</button>
                </form>
            </div>
             
             <!-- TABLE -->
             
             <div class="col-md-6" style="margin-top: 40px;">
             
             <table class="table table-striped table-hover table-bordered">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Category Title</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Javascript</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Python</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Ruby</td>
                </tr>
              </tbody>
            </table>
             
             </div> 
                 
        </div>    
        </div> <!-- ROW DIV -->
      
      
      <!-- FOOTER -->
    <?php include "includes/footer.php" ; ?>
      
      