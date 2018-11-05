<?php include "includes/connection.php" ;?>


<?php include "includes/links.php" ; ?>



    <title>Fusion</title>

    <style type="text/css">
       
       body {
        background-color: #46B3CE;
       }

       .steps{
        color: white;
       }

     .row{
      margin-top: 60px;
     }

     .myslide img{
        height: 300px;
     }

    

     a{
      margin-left: 10px;
      color: white;
     }

    </style>


  </head>

  <body>


    <?php 

      $_SESSION['visit'] = 1 ;

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
        
        
        <?php if(!isset($_SESSION['username'])){ ?>
      <li class="nav-item">
        <a class="nav-link" href="registration.php"><i class="fas fa-user-plus"></i> Register</a>
      </li>
        <?php }?>
        

    </ul>
      
  </div>
</nav>

<!-- PAGE CONTENT STARTS -->
<div class="container">
<div class="row">
  <div class="col-sm-6 steps" >
   <!-- MESSAGE AND COROUSAL CONTENT -->

   <h1><img src='img/icon2.png' width="70" height="70" > Fusion</h1><br>

   <h5>A combination of blog and a social networking Site<br>With Blog Posting and online chatting Features and<br> much more with easy User Interface.</h5>
   <br><br>
   <h5><u>How To start</u></h5><br>
   <h6>1. Register to Become a Member for Free.</h6>
   <h6>2. Click on the link Send to your mail for Verification</h6>
   <h6>3. Start Blogging and Posting </h6>
   <br>
   <h5><a href="index.php"><u>Home</u></a><a href="registration.php"><u>Signup</u></a></h5>
    
  </div>

 <div class="col-sm-2"></div>

  <div class="col-sm-4">
    <!-- LOGIN FORM -->



    <div class="card" style="margin-top: 40px; margin-bottom: 20px;">
       <div class="card-body">
          <form method="post" action="includes/login.php">
              
                <div class="form-group ">
                    <label for="username"><b>Username</b></label>
                  <input type="text" class="form-control" name="username" id="username">
                </div>
                <div class="form-group ">
                  <label><b>Password</b></label>
                  <input type="password" class="form-control" name="password" id="password">
                </div>
                <br>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input">
                    <label class="form-check-label" for="check" name="remember"><b>Remember Me</b></label>
                    <a href="" style="float: right; color: blue;">Forgot Password ?</a>
                 </div>

               <br> 
              
              <button type="submit" class="btn btn-primary btn-sm btn-block" name="login">Login</button>
            </form>
        </div>
    </div>


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