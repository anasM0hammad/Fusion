              <?php
                      //UPDATING
                       if(isset($_POST['update'])){
                            $upd_cat = $_POST['cat_title'] ;
                            $upd_query = "UPDATE category SET cat_title = '{$upd_cat}' WHERE cat_id = {$upd_cat_id}" ;
                            $upd_query_result = mysqli_query($connect , $upd_query) ;
                            
                            if(!$upd_query_result){
                                die("QUERY FAILED").mysqli_error($connect);
                            }
                
                         else{
                          echo "<div class='alert alert-success' style='margin-bootom:20px; border-radius:0;' role='alert'><b>Category Updated</b></div>";
                          
                      }
                    }
                ?>

                <h5 class="mb-2"><b>Edit Category</b></h5>
                
                <form action="" method="post" class="form-inline">
                  <div class="form-group ">
                      
                      <?php 
                      // CATCHING THE CATEGORY INTO FORM
                 
                       if(isset($_GET['edit'])){
                           
                           $edit_cat = $_GET['edit'];
                           $edit_query = "SELECT * FROM category WHERE cat_id = {$edit_cat}" ;
                           $edit_query_result = mysqli_query($connect , $edit_query) ;
                           
                           while($row = mysqli_fetch_assoc($edit_query_result)){
                            $cat_title = $row['cat_title'];
                            $cat_id = $row['cat_id'];   
                        ?>
                      <input type="text" class="form-control" placeholder="Category" name="cat_title" value="<?php echo $cat_title ; ?>">
                        
                               
                          <?php } //while
                      
                       } ?>
                      
                  </div>
                  <button type="submit" class="btn btn-primary" style="margin-left:5px; border-radius:0;" name="update">Update</button>
                </form>
            