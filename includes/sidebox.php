

          <div class="col-md-4" style="margin-top:60px;">
             <!-- BLOG SEARCH BOX -->
              
              
            <div class="card bg-light side_box">
              <div class="card-body">
                <h5 class="text-muted">BLOG SEARCH</h5>
                <form action="search.php" method ="post">  
                 <div class="input-group">
                    
                  <input type="text" name="search" class="form-control">
                    <span class="input-group-btn">
                       <button class="btn btn-default search_icon" type="submit" name="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </span>
                  </div>   
                </form>    
              </div>
            </div>
              
              
              <?php 
              //VALIDATION OF LOGIN FORM
              
              if(isset($_GET['empty_login'])){
                  
                  if($_GET['empty_login']=='yes'){
                   echo "<div class='alert alert-danger' style='margin-bottom:10px; margin-top:10px; border-radius:0;' role='alert'><b>Enter Fields.</b></div>"; 
                  }
              }
              
              
              //LOGINN FAILED MESSAGE
               if(isset($_GET['login'])){
                  
                  if($_GET['login']=='fail'){
                   echo "<div class='alert alert-danger' style='margin-bottom:10px; margin-top:10px; border-radius:0;' role='alert'><b>Invalid Credentials</b></div>"; 
                  }
              }
              
              
              
              
              ?>
              
            <!-- PHP FOR SHOWING LOGIN BOX ONLY WHEN SESSION IS UNSET -->
              
              <?php 
              if(!isset($_SESSION['username'])){
              ?>
              
              
            <!-- LOGIN BOXX -->
              <div class="card bg-light side_box">
              <div class="card-body">
                <h5 class="text-muted">LOGIN</h5>
                <form action="includes/login.php" method ="post">  
                 <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Username" name="username">
                </div> 
                
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
                  </div>
                  <input type="password" class="form-control" placeholder="Password" name="password">
                </div> 
                
                <button type="submit" class="btn btn-primary btn-md btn-block" style="border-radius: 0" name="login">Login</button>    
                </form>    
              </div>
            </div>
              
              <?php } ?>
              
              
             
            <!-- CATEGORY BOX -->
              <div class="card bg-light side_box">
              <div class="card-body">
                <h5 class="text-muted">WHAT'S NEW</h5>
                  
                 <?php 
                 
                    $query = "SELECT * FROM category" ;
                    $cat_result = mysqli_query($connect , $query);
                  
                      $i = 0;
                      while($i<4){
                       $row = mysqli_fetch_assoc($cat_result);
                      $cat_title = $row['cat_title'];
                      $cat_id = $row['cat_id'];
                      echo "<a href='category_link.php?cat_id=$cat_id' class='cat_link'>{$cat_title}</a>" ;
                      
                      $row = mysqli_fetch_assoc($cat_result);
                      $cat_title = $row['cat_title'];
                      $cat_id = $row['cat_id'];      
                      echo "<a href ='category_link.php?cat_id=$cat_id' class ='cat_link float-right'> {$cat_title} </a><br> ";
                      
                      $i++ ;
                   }
                  
                  
                  ?>
                
<!--
                <a href="">Category</a> <a href="" class="float-right">Category</a><br>
                <a href="">Category</a> <a href="" class="float-right">Category</a><br>
                <a href="">Category</a> <a href="" class="float-right">Category</a><br>
                <a href="">Category</a> <a href="" class="float-right">Category</a><br>      
-->
                  
              </div>
            </div>
         </div> 