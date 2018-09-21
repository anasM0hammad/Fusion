
<?php

$query = "SELECT * FROM category" ;
$cat_result = mysqli_query($connect , $query);
        
?>



          <div class="col-md-4">
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
              
              
             
            <!-- CATEGORY BOX -->
              <div class="card bg-light side_box">
              <div class="card-body">
                <h5 class="text-muted">WHAT'S NEW</h5>
                  
                 <?php 
                 
                  $i = 0;
                  while($i<4){
                       $row = mysqli_fetch_assoc($cat_result);
                      $cat_title = $row['cat_title'];
                      echo "<a href='' class='cat_link'>{$cat_title}</a>" ;
                      
                      $row = mysqli_fetch_assoc($cat_result);
                      $cat_title = $row['cat_title'];
                      echo "<a href ='' class ='cat_link float-right'> {$cat_title} </a><br> ";
                      
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