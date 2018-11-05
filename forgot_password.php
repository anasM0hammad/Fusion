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
    <!-- LOGIN FORM -->

  <br><br>
   <h3 class="text-center">Reset Password Form</h3>


    <div class="card" style="margin-top: 50px; margin-bottom: 20px;">
       <div class="card-body">
          <form method="post" action="includes/login.php">
              
                <div class="form-group ">
                    <label for="username"><b>Username</b></label>
                  <input type="text" class="form-control" name="username" id="username">
                </div>
                <div class="form-group ">
                  <label><b>Email</b></label>
                  <input type="email" class="form-control" name="email" id="email">
                </div>
                 <div class="form-group ">
                  <label><b>New Password</b></label>
                  <input type="password" class="form-control" name="password" id="password">
                </div>
               
                <br><br> 
              
              <button type="submit" class="btn btn-primary btn-sm btn-block" name="Reset">Reset</button>
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