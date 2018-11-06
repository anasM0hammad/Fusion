<?php include "includes/connection.php" ;?>


<?php include "includes/links.php" ; ?>



    <title>Fusion</title>

    <style type="text/css">
       
     </style>


  </head>

  <body>


    <?php 

     if(isset($_SESSION['username'])){
      header("Location: index.php");
     }

   ?>

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


<?php 

 if(isset($_POST['reset'])){

  $username = $_POST['username'];
  $username = mysqli_real_escape_string($connect , $username);

  if(empty($username)){
    echo"<div class='alert alert-danger' role='alert'  style='margin-top:20px;'><b>Enter Username</b></div>" ;
  }
 
  else{


  //CHECKING DETAILS OF USER
      $user_query = "SELECT * FROM users WHERE username = '$username' " ;
      $user_result = mysqli_query($connect, $user_query);
      $user = mysqli_num_rows($user_result);

      if($user == 0){
        echo "<div class='alert alert-danger' role='alert'  style='margin-top:20px;'><b>Invalid Username</b></div>" ;
      }

      else{
         
         $row = mysqli_fetch_assoc($user_result) ;
         $email = $row['user_email'];

          $number = rand(0,1000000);
          $new_password = $username.$number ;
          $en_password = $username.$number ;

          //ENCRYPTING NEW GENERATED PASSWORD ;
           $hash = "$2y$10$" ;
           $salt="Sde4Fg67Yhnaf2dhr5jQv5" ;
           $hash_salt = $hash.$salt ;

           $en_password = crypt($en_password , $hash_salt);

         // SETTING DEFAULT PASSWORD
          $reset_query = "UPDATE users SET user_password = '$en_password' WHERE username = '$username' ";
          $reset_result = mysqli_query($connect , $reset_query);

            if(!$reset_result){
              die("FAILED");
            }
            else{
               //mail 
              $to = $email ;
              $subject = "Reset Password of your Fusion Account";
              $msg = "           Greetings From Fusion

                                          Your Password has been Reset, you can login with Your Default credentials given Below.
                                          Thank You.

                                          New Password = {$new_password} 

                                          We Strongly Recommend You to Change your default password after Login Successfully  " ;
                                        
                                        $header = "From: noreply@fusion.in";

                mail($to , $subject, $msg , $header);

                echo "<div class='alert alert-success' role='alert' style='margin-top:20px;'><b>Your Password has been Reset Please Check Your Email.</b></div>" ;


              }
          }

      }

  }
      

 


?>








  
    <!-- LOGIN FORM -->

  <br><br>
   <h3 class="text-center">Reset Password Form</h3>

   
    <div class="card" style="margin-top: 50px; margin-bottom: 20px;">
       <div class="card-body">
          <form method="post" action="forgot_password.php">
              
                <div class="form-group ">
                    <label for="username"><b>Enter Username</b></label>
                  <input type="text" class="form-control" name="username" id="username">
                </div>
                <br><br> 
              
              <button type="submit" class="btn btn-primary btn-sm btn-block" name="reset">Reset Password</button>
            </form>
        </div>
    </div>

    <div class="col-sm-3"></div>



  </div>
  

</div>
</div>
   







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>