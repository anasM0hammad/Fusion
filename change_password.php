<?php include "includes/connection.php" ; ?>


<!doctype html>
<html lang="en">
  <head>
    
    <?php include "includes/links.php" ; ?>  

     <!-- EXTERNAL CSS FILE -->
     <link rel="stylesheet" type="text/css" href="css/home.css">  

     <style type="text/css">
     	.row{
     		margin-top: 10px;
     	}
     </style> 



     <title>Fusion</title>
  </head>
  <body>


  	

  	  
<!-- NAVBAR STARTS HERE -->

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php"><img src="img/icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Fusion</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
    <ul class="navbar-nav container justify-content-end list">
      <li class="nav-item active">
          <a class="nav-link" href="index.php"><i class ="fas fa-home"></i> Home<span class="sr-only">(current)</span></a>
      </li>
        
    </ul>
      
  </div>
</nav>

<!-- PAGE CONTENT STARTS -->
<div class="container">
<div class="row">
  <div class="col-sm-3 steps" ></div>

  <div class="col-sm-6">
  
 <!-- PHP QUERY -->
 <?php 

    if(isset($_SESSION['username'])){
    	$username = $_SESSION['username'] ;

       // CHANGING PASSWORD
    	if(isset($_POST['change'])){

    		$old_password = $_POST['old_password'];
    		$password1 = $_POST['password1'];
    		$password2 = $_POST['password2'];
           
            //CHECK WHETHER OLD PASSWORD IS CORRECT OR NOT
    		$check_query = "SELECT * FROM users WHERE username = '$username' " ;
    		$check_result = mysqli_query($connect , $check_query);
    		$row = mysqli_fetch_assoc($check_result);

    		$db_password = $row['user_password'];

        //FIELD VALIDATION 
    	 if(empty($password1) || empty($password2) || empty($old_password)){
    	 	echo "<div class='alert alert-danger' role='alert' style='margin-top:20px;'><b>Enter Empty Fields</b></div>" ;
    	 }

    	 else{

    	 	//ENCRYTING OLD PASSWORD ENTERED BY USER
    	   $hash = "$2y$10$" ;
           $salt="Sde4Fg67Yhnaf2dhr5jQv5" ;
           $hash_salt = $hash.$salt ;

           $old_password = crypt($old_password , $hash_salt);


            //IF PASSWORD IS INCORRECT
    		if($db_password !== $old_password){
    			echo "<div class='alert alert-danger' role='alert' style='margin-top:20px;'><b>Invalid password. Enter Correct Password</b></div>" ;
    		}

    		//PASSWORD IS CORRECT
    		else{
               
                if($password1 !== $password2){
                	echo "<div class='alert alert-danger' role='alert' style='margin-top:20px;'><b>Enter Same Password in Comfirm Field</b></div>" ;
                }
                else{

                

                   //ENCRYPTING NEW PASSWORD
                   $hash = "$2y$10$" ;
                   $salt="Sde4Fg67Yhnaf2dhr5jQv5" ;
                   $hash_salt = $hash.$salt ;

                   $password2 = crypt($password2 , $hash_salt);


                    //CHANGING THE USERS PASSWORD
                    $change_query = "UPDATE users SET user_password = '{$password2}' WHERE username = '$username' " ;
                    $change_result = mysqli_query($connect , $change_query);

                    if($change_result){
                    	echo "<div class='alert alert-success' role='alert' style='margin-top:20px;'><b>Your Password Has Been Changed.</b></div>" ;
                    }
                }



    		}

       }
    }




    }
    else{
    	header("Location: index.php") ;
    }


  	?> 






    <!--CHANGE PASSWORD FORM -->

  <br><br>
   <h3 class="text-center">Change Password</h3>

    <div class="card" style="margin-top: 20px;  margin-bottom: 20px;">
       <div class="card-body">
          <form method="post" action="change_password.php">
              
                <div class="form-group ">
                 <div class="form-group ">
                  <label for="old_password"><b>Old Password</b></label>
                  <input type="password" class="form-control" name="old_password" >
                </div>

                  <label for="password1"><b>New Password</b></label>
                  <input type="password" class="form-control" name="password1" >
                </div>
                <div class="form-group ">
                   <label for="password2"><b>Confirm Password</b></label>
                  <input type="password" class="form-control" name="password2" >
                </div>
                <br><br> 
              
              <button type="submit" class="btn btn-primary btn-sm btn-block" name="change">Change Password</button>
            </form>
        </div>
    </div>

    <div class="col-sm-3"></div>



  </div>
  

</div>
</div>
   


  	   <br><br><br><br>      
      
      <!-- FOOTER GOES HERE -->
      <?php include "includes/footer.php" ?>

        <!-- CKEDITOR -->
      
      
      
      
  </body>
</html>