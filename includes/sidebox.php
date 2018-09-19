
<?php

$query = "SELECT * FROM category" ;
$cat_result = mysqli_query($connect , $query);
        
?>



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
                  
                 <?php 
                  
                  while($row = mysqli_fetch_assoc($cat_result)){
                      
                      $cat_title = $row['cat_title'];
                      echo "<a href=''>{$cat_title}</a> <br>" ;
                     
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