<?php include "includes/connection.php" ; ?>


<!doctype html>
<html lang="en">
  <head>
    
    <?php include "includes/links.php" ; ?>  
    
    <!-- EXTERNAL CSS FILE -->
     <link rel="stylesheet" type="text/css" href="css/home.css">   
      
    <style>
      
        .text{
            text-align: center;
        }
        
        .background{
            border-right: solid #CCC4B4 1px;
            margin-bottom: 80px;
        }
        
        .mybtn{
            border-top-left-radius: 30px;
            border-top-right-radius: 30px;
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
            width: 60%;
        }

        .set_bar{
            border-top-left-radius: 40px;
            border-top-right-radius: 40px;
            border-bottom-left-radius: 40px;
            border-bottom-right-radius: 40px;
            width: 50%;
            background-color: #55B8D2;
        }

        .post_box{
            margin-bottom: 20px;
            line-height: 10px;
        }

        .post_box span {
          float: right;
          color: blue;
        }

        .heading{
          text-align: center;
        }
        
        .set_bar a{
          cursor: pointer;
        }


    </style>  
      
    <title>Fusion</title>
  </head>
  <body>


    <?php 

        $yes =0 ;

       if(isset($_SESSION['username'])){

         $yes =1 ;

        $username = $_SESSION['username'];
        $show_query = "SELECT * FROM users WHERE username = '$username' ";
        $show_result = mysqli_query($connect , $show_query);
        $row = mysqli_fetch_assoc($show_result);
        $name = $row['user_firstname']." ".$row['user_lastname'];
        $email = $row['user_email'];

       }


    ?>




  



   
      
      
      <!-- NAVBAR  -->  
      
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php"><img src="img/icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Fusion</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    
      
    <ul class="navbar-nav container justify-content-end list">
      <li class="nav-item">
          <a class="nav-link" href="index.php"><i class ="fas fa-home"></i> Home<span class="sr-only">(current)</span></a>
      </li>
  

    </ul>
      
  </div>
</nav>
      
       <!-- NAVBAR ENDS HERE -->
        
       
      
      
      <!--PAGE CONTENT STARTS -->
      <div class="row ">

        <!-- SIDE PANEL -->  
       <div class="col-sm-3 background">
          <img src="img/admin1122.jpg" class=" mx-auto d-block" height="110" width="110" style="border-radius:50%;"><br>
          <h3 class="text text-muted">Admin Info</h3><br>

         <h5 class="text text-muted"><i class="fas fa-phone-square"></i> 9891950609</h5>
          <h5 class="text text-muted"><i class="fas fa-envelope"></i> anas.1633.m@gmail.com</h5>
       
       </div>
          
          
        <!-- MAIN CONTENT -->  
      <div class="col-sm-9">   


       <?php 

         if(isset($_POST['submit'])){

           if($yes == 0 ){

            $name = mysqli_real_escape_string($connect , $_POST['name']);
            $email = mysqli_real_escape_string($connect , $_POST['email']);
            $number =  $_POST['number'];
            $msg = mysqli_real_escape_string($connect , $_POST['msg']); 

          }

          else{
            $number =  $_POST['number'];
            $msg = mysqli_real_escape_string($connect , $_POST['msg']); 
          }

          if(empty($name) || empty($number) || empty($email) || empty($msg)){
            echo"<div class='alert alert-danger' role='alert'><b>Please Enter all Fields</b></div>";
          }

          else{

         
          //QUERY TO INSERT IN DB
          $query = "INSERT INTO feedback (feedback_name , feedback_email , feedback_number , feedback_msg) VALUES ('{$name}' , '{$email}' , {$number}  , '{$msg}')" ;
          $result= mysqli_query($connect , $query);

          if($result){
            echo "<div class='alert alert-success' role='alert'><b>Your FeedBack Is Submitted. Thank You</b></div>" ;
          }

       }

     }





    ?>
      



  <div class="container">
      <form action="contact.php" method="post" autocomplete="off" >

        <?php if($yes == 0){ ?>
         <div class="form-group">
          <label ><b>Name</b></label>
          <input type="text" class="form-control" name="name" >
        </div>

         <div class="form-group">
          <label ><b>Email address</b></label>
          <input type="email" class="form-control" name="email" >
        </div>

      <?php }?>

        <div class="form-group">
          <label ><b>Number</b></label>
          <input type="tel" class="form-control" name="number" >
        </div>

        <div class="form-group">
          <label ><b>Message/Feedback</b></label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="msg"></textarea>
        </div>

        <button type="submit" class="btn btn-md btn-block btn-primary" name='submit'>Submit</button>

    </form>

</div>
        

         
     </div>  <!-- MAIN CONTENT ENDS -->  
      </div> <!-- MAIN ROW ENDS -->
      
      
      
     
          
    <br><br><br><br>      
      
      <!-- FOOTER GOES HERE -->
      <?php include "includes/footer.php" ?>
      
      
     
      
  </body>
</html>