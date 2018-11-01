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

        .message_box{
          height: 350px;
          overflow: auto;
        }

        .message_card{
          border-radius: 0;

        }

        .message_area{
          border-radius: 0;
          margin: 0;
          padding: 0;

        }

        .message_row{
          margin:0;
          padding: 0;
        }


    </style>  
      
    <title>Fusion</title>
  </head>
  <body>
      
      <?php 
      //QUERY TO SHOW INFO OF USER IN PROFILE BAR
      
      if(isset($_SESSION['username'])){
        $username =  $_SESSION['username'] ;
          
          $prof_query = "SELECT * FROM users WHERE username = '$username' " ;
          $prof_result = mysqli_query($connect, $prof_query);
          
          while($row = mysqli_fetch_assoc($prof_result)){
              $user_id = $row['user_id'];
              $firstname = $row['user_firstname'];
              $lastname = $row['user_lastname'];
              $image = $row['user_image'];
              $role = $row['user_role'];
              $email = $row['user_email'];
              $password = $row['user_password'];
          }
          
      }
      else{
          header("Location: index.php");
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
        
        
        <?php if(isset($_SESSION['username'])){ 
              if($role == 'Admin'){   
          
            echo  "<li class='nav-item'>
                <a class='nav-link' href='admin/index.php'><i class='fas fa-globe'></i> Admin</a>
              </li>";  } 
        } ?>
        
        
        <?php if(!isset($_SESSION['username'])){ ?>
      <li class="nav-item">
        <a class="nav-link" href="registration.php"><i class="fas fa-user-plus"></i> Register</a>
      </li>
        <?php }?>
        
        
       <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-phone"></i> Contact</a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="message.php"><i class="fas fa-envelope"></i> Messages <span class="badge badge-secondary">1</span></a>
      </li>

    </ul>
      
  </div>
</nav>
      
       <!-- NAVBAR ENDS HERE -->

      

  
      
      
      <!--PAGE CONTENT STARTS -->
      <div class="row ">

        <!-- ALL MESSAGE PANEL -->  
       <div class="col-sm-4 background">

        <?php 
         // LOOP TO SHOW ALL SENDERS
        $count = 0;
        while($count<3){
 
        ?>
        
        <div class="sender container">
          <h5 id="<?php echo 'sender_name'.$count;?>"></h5>
          <p><i>Sends you a Message on <span id="<?php echo 'sender_date'.$count; ?>"></span></i></p>
          <hr>
        </div>
         
        <?php 
         $count++ ;
        }?>
             
       </div>
          
          
        <!-- MESSAGE -->  
      <div class="col-sm-8" > 
      <div class="container">
       <div class="card message_card">
        <div class="card-header"><b>Zainul Abedin</b></div>
        <div class="card-body message_box">
          <p><img src="img/aru.jpg" style="border-radius:50%;" width="30" height="30"> Hello Bro</p>
          <p><img src="img/aru.jpg" style="border-radius:50%;" width="30" height="30"> Wassup</p>

          <p class="text-right"><img src="img/icon.png" style="border-radius:50%;" width="30" height="30"> Nothing Much</p>
           <p class="text-right"><img src="img/icon.png" style="border-radius:50%;" width="30" height="30"> You tell</p>
        </div>
      </div>

         <div class="row message_row">
          <div class="col-11 message_area">
             <div class="form-group">
              <textarea class="form-control " style="border-radius: 0; border-top: none;" placeholder="Enter Text" rows="2"></textarea>
             </div>
         </div>

         <div class="col-1 message_area">
           <h1 class="text-center"><i class="fas fa-arrow-circle-right"></i></h1>
         </div>
        </div>
       

      </div>
    </div>
         
     </div>  <!-- MESSAGE ENDS -->  
      </div> <!-- MAIN ROW ENDS -->
      
      
      
     
          
    <br><br><br><br>      
      
      <!-- FOOTER GOES HERE -->
      <?php include "includes/footer.php" ?>

      
      <script type="text/javascript">
        
          var receiver_id = <?php echo $user_id ; ?> ;

           const fetchSenders = async (user)=>{
       
           const call = await fetch(`async/show_senders.php?user_id=${user}`);
           const data = await call.json();

           return {data: data};

       }

       const showSenders = ()=>{

        fetchSenders(receiver_id).then((result)=>{
       
        for(var i=0 ; i<result.data.length ; i++){

         document.querySelector("#sender_name"+i).textContent =  result.data[i].sender;
         document.querySelector("#sender_date"+i).textContent = result.data[i].date ;
          

         }

         

          
        console.log(result.data.length);
        //  console.log("Alright");
        }).catch(error=>error)
       }

    showSenders(); 
   



      </script>
      
      
  </body>
</html>