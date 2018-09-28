<?php

function add_cat(){
    global $connect ;
    
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
}



function show_cat(){
     global $connect ;    
      
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
                    
}


function delete_cat(){
    
    global $connect ;
    
     if(isset($_GET['delete'])){

      $del_cat_id = $_GET['delete'] ;
      $query_delete = "DELETE FROM category WHERE cat_id = {$del_cat_id}" ;
      $del_query_result = mysqli_query($connect , $query_delete) ;
      header("Location: category.php") ;

      }

}


?>