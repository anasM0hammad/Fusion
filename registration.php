<?php include "includes/connection.php" ; ?>



<!doctype html>
<html lang="en">
  <head>
      
    <link rel="stylesheet" href =" https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
      
    <?php include "includes/links.php" ; ?>  
    
    <!-- EXTERNAL CSS FILE -->
     <link rel="stylesheet" type="text/css" href="css/home.css">
      <style>
          .head{
              text-align: center;
              margin-top: 20px;
          }
          
          .reg_option{
              text-align:center;
              cursor: pointer;
          }
          
          .reg_option:hover{
              color: blue;
          }
          
          .btn{
              border-radius: 0; 
              margin-bottom: 10px;
          }
      
      </style>
      
    <title>Fusion</title>
  </head>
  <body>
      
      
      <!-- NAVBAR  -->  
      
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php"><img src="img/icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Fusion</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav container justify-content-end list">
      <li class="nav-item ">
          <a class="nav-link" href="index.php"><i class ="fas fa-home"></i> Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="registration.php"><i class="fas fa-user-plus"></i> Register</a>
      </li>
           
    </ul>
  </div>
</nav>
      
      <!-- NAVBAR ENDS HERE -->
      
      
      
      
      
      <!--MAIN PAGE HEADER-->
      
<!--
      <div class="header">
      
        <img src="img/icon2.png" class="rounded mx-auto d-block">
        <h2>Welcome to Fusion</h2>
        <p>Fusion is a combination of a blog and a social platform <br><span class = "d-none d-sm-block"> for Developers, Technology enthusiast, students and anyone who loves technology and Science.</span></p>  
      
      
      </div>
-->
      <!--HEADER ENDS HERE -->
      
      
      <h1 class="head"> Membership Form </h1>
      <h4 class="text-muted" style="text-align:center;"><i>It is free for everyone</i></h4>
      
    
        <?php 
          // QUERY FOR REGISTER A NEW MEMBER
          
          if(isset($_POST['register'])){
              
              $firstname = $_POST['firstname'];
              $lastname = $_POST['lastname'] ;
              $username = $_POST['username'] ;
              $email = $_POST['email'] ;
              $password = $_POST['password'] ;
              $image = $_FILES['image']['name'];
              $tmp_image = $_FILES['image']['tmp_name'];
              
              move_uploaded_file($tmp_image , "img/$image");
              
              
              if(empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($password)){
                 echo "<div class='alert alert-danger container' style='margin-top: 40px; border-radius:0; text-align:center;' role='alert'><b>Enter Required Fields.</b></div>"; 
              }
              
              //ALL FIELDS ARE FILLED
              else{
                  
                  $unique = true ;  // FLAG FOR CHECKING THE FIELDS ARE UNIQUE OR NOT
                  
                  // CHECKING FOR UNIQUE USERNAME AND EMAIL
                  $check_query = "SELECT * FROM users" ;
                  $check_result = mysqli_query($connect , $check_query);
                  
                  while($row = mysqli_fetch_assoc($check_result)){
                      
                      $db_username = $row['username'];
                      $db_email = $row['user_email'] ;
                      
                      if($db_username === $username || $db_email === $email){
                         echo "<div class='alert alert-danger container' style='margin-top: 40px; border-radius:0; text-align:center;' role='alert'><b>Username or Email is already Taken.</b></div>"; 
                          
                          $unique = false ;
                      }   
                  }
                      
                      // NOW ALL DATA IS UNIQUE AND FILLED
                      if($unique){
                          
                          $firstname = mysqli_real_escape_string($connect , $firstname);
                          $lastname = mysqli_real_escape_string($connect , $lastname);
                          $username = mysqli_real_escape_string($connect , $username);
                          $email = mysqli_real_escape_string($connect , $email);
                         

                          //PASSWORD ENCRYPTION
                           $hash = "$2y$10$" ;
                           $salt="Sde4Fg67Yhnaf2dhr5jQv5" ;
                           $hash_salt = $hash.$salt ;

                           $password = crypt($password , $hash_salt);
                          
                          //QUERY TO SEND THE DATA IN DATABSE
                          $reg_query = "INSERT INTO users(username , user_password, user_firstname, user_lastname, user_email, user_role , user_image) VALUES ('{$username}' , '{$password}' , '{$firstname}' , '{$lastname}' , '$email' , 'Subscriber', '$image')";
                          
                          $reg_result = mysqli_query($connect , $reg_query) ;
                          
                          //CHECKING QUERY ID SEND OR NOT
                          if(!$reg_result){
                              die("QUERY FAILED  " . mysqli_error($connect));
                          }
                          
                          //QUERY SEND SUCCESSFULLY
                          else{

                              //EMAIL VERIFICATION PHP CODE
                              $hash = md5(rand(0,1000));
                              $to = $email ;
                              $subject = "Signup || Verification of Account";
                              $msg = "           Welcome to Fusion

                                      Thanks for signing up!
                                      Your account has been created, you can login with Your submitted credentials after you have activated your account by pressing the url below.

                                      Please click this link to activate your account:
                                      http://www.fusion.in/verify.php?email={$email}&hash={$hash}" ;
                                    
                                    $header = "From: noreply@fusion.in";

                                    mail($to , $subject, $msg , $header);

                                    //INSERTING THE HASH INTO THE USERS DATABASE
                                    $hash_query = "UPDATE users SET user_hash = '{$hash}' WHERE username = '$username' ";
                                    $hash_result = mysqli_query($connect , $hash_query);


                              echo "<div class='alert alert-success container' style='margin-top: 40px; border-radius:0; text-align:center;' role='alert'><b>Registration Successful. Go to your Email to verify your Account</b></div>";
                          }
                          
                      }
                  
              }
              
              
              
              
              
          } //  ./isset
          
          
          ?>    




           <!-- CATCHING REQUEST TO BE ADMIN -->

        <?php 

          if(isset($_POST['request'])){

            echo "<div class='alert alert-success container' style='margin-top: 40px; border-radius:0; text-align:center;' role='alert'><b>Admin Request Will Be open Soon. Stay Tuned for more Updates</b></div>" ;

          } //  ./ISSET POST OF ADMIN REQUEST



        ?>
                
     
      
     
      <div class="row" style="margin-top:4px;">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">
          
            <!-- FORM SELECTION OPTION -->
            <div class="row" >
                
            
             <!-- SUBSCRIBER OPTION -->    
             <div class="col-sm-6" >
                <p class="reg_option" id="subs_option" style="color:blue; text-decoration:underline;"><b>Subscriber Form</b></p>              
             </div>
                
              <!-- ADMIN OPTION --> 
             <div class="col-sm-6" >
                 <p class="reg_option" id="admin_option"><b>Admin Request</b></p>
             </div>    
                
          
            </div>
          
          
          
        <!-- SUBSCRIBER REGISTRATION FORM -->
        <div class="card bg-light fadeIn animated" id="subs_form">
          <div class="card-body">
           <form method="post" action="" enctype="multipart/form-data" onsubmit="return isEmpty()">
              
                <div class="form-group ">
                    <label for="firstname"><b>First Name</b></label>
                  <input type="text" class="form-control" name="firstname" id="firstname">
                </div>
                <div class="form-group ">
                  <label><b>Last Name</b></label>
                  <input type="text" class="form-control" name="lastname" id="lastname">
                </div>
               
              <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email"><b>Email</b></label>
                  <input type="email" class="form-control" placeholder="NoOne@example.com" name="email" id="email">
                </div>
                <div class="form-group col-md-6">
                  <label><b>Password</b></label>
                  <input type="password" class="form-control" name="password" id="password">
                </div>
              </div>
               
                <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="username"><b>Username</b></label>
                  <input type="text" class="form-control" name="username" id="username" onkeyup="checkUser()" autocomplete="off">
                  <p id="user_alert"></p>
                </div>
                 <div class="form-group col-md-6">
                    <label for="image"><b>Profile Image</b></label>
                    <input type="file" class="form-control-file" name="image" >
                  </div>
               </div>
               <br> 
              
              <button type="submit" class="btn btn-primary btn-sm btn-block" name="register">Register</button>
            </form>
          </div>
        </div>
          
          
          
          <!-- ADMIN REQUEST FORM -->
          <div class="card bg-light fadeIn animated" id="admin_form" style="display:none;">
          <div class="card-body">
           <form method="post" action="" enctype="multipart/form-data" onsubmit = "return isEmpty_req()">
    
               
              <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email"><b>Registered Email</b></label>
                  <input type="email" class="form-control" placeholder="NoOne@example.com" name="admin_email" id="l_email">
                </div>
                <div class="form-group col-md-6">
                  <label><b>Password</b></label>
                  <input type="password" class="form-control" name="admin_password" id="l_password">
                </div>
              </div>
               
                <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="username"><b>Registered Username</b></label>
                  <input type="text" class="form-control" name="admin_username" id="l_username">
                </div>
                 <div class="form-group col-md-6">
                    <label for="username"><b>Mobile Number</b></label>
                  <input type="tel" class="form-control" name="number" id="number" >
                </div>
                    
               </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                  <label><b>City</b></label>
                  <input type="text" class="form-control" name="city" id="city">
                </div>
                <div class="form-group col-md-4">
                  <label><b>State</b></label>
                    <input type="text" class="form-control" name="state" id="state">
                </div>
                <div class="form-group col-md-2">
                  <label ><b>Country</b></label>
                  <input type="text" class="form-control" name="country" id="country">
                </div>
              </div>
               
                <div class="form-group">
                <label ><b>Why do you want to be an Admin ?</b></label>
                <textarea class="form-control" name="reason" rows="3" id="reason"></textarea>
              </div>
               
               <br> 
              
              <button type="submit" class="btn btn-primary btn-sm btn-block" name="request">Send Request</button>
            </form>
          </div>
        </div>
          
          
      </div>
     <div class="col-sm-2"></div>      
    </div>
               

                <br><br><br><br>
      
      <script>
      
          var username = document.querySelector("#username");
          var user_alert = document.querySelector("#user_alert");
          
         const fetchUser = async (user)=>{
            
            const call = await fetch(`async/reg_user.php?isUnique=${user}`) ;
            const data = await call.json();
            
            return {data: data};
            
         }
        
        
        const checkUser = ()=>{
            
            fetchUser(username.value).then((result)=>{

              if(result.data=="false"){
                username.style.borderColor = "#DC3545";
                user_alert.textContent = "Username Already Taken";
                user_alert.style.color = "#DC3545";
              }
              else{
                 username.style.borderColor = "#green";
                user_alert.textContent = "Username Available";
                user_alert.style.color = "green";
              }
                
            }).catch(error=>error)
            
            
        }

      
      </script>
      
      
      <!-- EXTERNAL JS FILE -->
      <script src="js/registration.js" type="text/javascript"></script>
      
      <!-- FOOTER GOES HERE -->
      <?php include "includes/footer.php" ?>
      
      
      
  </body>
</html>