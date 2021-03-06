<?php include "includes/connection.php" ; ?>


<!doctype html>
<html lang="en">
  <head>
    
    <?php include "includes/links.php" ; ?>  
    
    <!-- JQUERY -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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


       #button{
        cursor: pointer;
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
              $verified = $row['user_verified'];
             
          }
          
      }
      else{
          header("Location: index.php");
      }



      if($verified == 0){
        header("Location: index.php?verify=no");
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

      <!-- PROFILE BAR -->
     <?php if(isset($_SESSION['username'])){ ?>  
    <ul  class="navbar-nav container justify-content-end " >
     <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="far fa-user"></i> <?php echo $firstname . " " . $lastname . " "; ?></a>
        <div class="dropdown-menu drop-link">
          <a class="dropdown-item" href="profile.php"><i class="far fa-user"></i> Profile</a>
          <a class="dropdown-item" href="profile.php?settings=1"><i class="fas fa-cog"></i> Settings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="includes/logout.php"><i class="fas fa-power-off"></i> Log Out</a>
        </div>
      </li> 
     </ul>  
      <?php } ?>
    
      
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
        <a class="nav-link" href="#"><i class="fas fa-users" id="online"></i> Online <span class='badge badge-secondary' id='online_count'></span></a>
      </li>
       <li class="nav-item ">
        <a class="nav-link" href="message.php" id="mes_alert"><i class="fas fa-envelope"></i> Messages <span class="badge badge-secondary" id="mes_count"></span></a>
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
        while($count<20){
 
        ?>
        
        <div class="sender container" id="<?php echo 'sender_div'.$count ; ?>" style="display: none;">
          <h5 id="<?php echo 'sender_name'.$count;?>"><span style="display: none;"></span></h5>
          <p><i><span id="<?php echo 'sender_date'.$count; ?>"></span><span id="<?php echo 'unread_mes'.$count; ?>"> Messages Unread</span></i></p>
          <hr>
        </div>
         
        <?php 
         $count++ ;
        }?>
             
       </div>

      <?php if(isset($_GET['sender'])){
        $sender = $_GET['sender'];
      } ?>

          
        <!-- MESSAGE -->  
      <div class="col-sm-8"  > 
      <div class="container">
       <div class="card message_card">
        <div class="card-header"><b><?php if(isset($_GET['sender'])){ echo "<i class='fas fa-circle dot'></i> ".$sender; }?></b></div>
        <div class="card-body message_box" id="here">

          <?php 

         if(isset($_GET['sender'])){
        
          $sender = $_GET['sender']; 

          if($sender == $username){
            header("Location: message.php");
          }

          //QUERY TO FETCH SENDER IMAGE
          $img_query = "SELECT * FROM users WHERE username = '$sender'" ;
          $img_result = mysqli_query($connect , $img_query);
          $img_row = mysqli_fetch_assoc($img_result);
          $sender_image = $img_row['user_image'];
          $sender_id = $img_row['user_id'];
          $sender_online = $img_row['user_online'];

          //SQL PROTECTION
          $sender = mysqli_real_escape_string($connect , $sender);
          $username = mysqli_real_escape_string($connect , $username);

          //QUERY TO MAKE ALL MESSAGE READ 
           $read_query = "UPDATE message SET message_read = 1 WHERE message_sender = '$sender' AND message_receiver = '$username'" ;
           $read_result = mysqli_query($connect , $read_query);
           if(!$read_result){
            die("ERROR ".mysqli_error($connect));
           }

      

          // QUERY TO SHOW MESSAGE
          $show_message = "SELECT * FROM message WHERE (message_sender = '$sender' AND message_receiver = '$username') OR (message_receiver = '$sender' AND message_sender='$username')" ;

          $show_result = mysqli_query($connect , $show_message) ;

           while($row = mysqli_fetch_assoc($show_result)){
            $message_content = $row['message_content'];
            $message_sender = $row['message_sender'];
            $message_receiver = $row['message_receiver'];
            $message_read = $row['message_read'];
          


       ?>
          


         <?php if($message_sender == $sender) { ?>
          <p><img src="img/<?php echo $sender_image; ?>" style="border-radius:50%;" width="25" height="25"> <?php echo $message_content ;?></p>
          <?php }?>

          <?php if($message_sender == $username){ ?>
          <p class="text-right"><img src="img/<?php echo $image; ?>" style="border-radius:50%;" width="25" height="25"> <?php echo $message_content ;?></p>


         <?php }?>

          

       <?php } ?>

           <?php } ?>
          </div>
    
      </div>
      
       
         <div class="row message_row">
          <div class="col-11 message_area">
             <div class="form-group">
              <textarea class="form-control " style="border-radius: 0; border-top: none;" placeholder="Enter Text" rows="2" id="content" name="message"></textarea>
             </div>
         </div>

         <div class=" col-1 message_area">
         <h1 class="text-center" id="button"><i class="fas fa-arrow-circle-right"></i></h1>
         </div>
        </div>
       

      </div>
    </div>
         
     </div>  <!-- MESSAGE ENDS -->  
      </div> <!-- MAIN ROW ENDS -->
      

      <style type="text/css">
         
         <?php if($sender_online == 1) { ?>
            .dot{
              color: green;
            }
         <?php }  else{?>
             
             .dot{
              color: grey;
             }

         <?php }?>


      </style>
      
      
     
          
    <br><br><br><br>      
      
      <!-- FOOTER GOES HERE -->
      <?php include "includes/footer.php" ?>


      <?php 

        if(isset($_GET['sender'])){

          echo "<script> var sender_id = $sender_id ;</script>" ;
        }
        else{
          echo "<script> var sender_id = 0 ; </script>" ;
        }


      ?>

      
      <script type="text/javascript">
        
          var receiver_id = <?php echo $user_id ; ?> ;

           const fetchSenders = async (user)=>{
       
           const call = await fetch(`async/show_senders.php?user_id=${user}`);
           const data = await call.json();

           return {data: data};

       }

       const showSenders = ()=>{

        fetchSenders(receiver_id).then((result)=>{
        
        var count = 0 ; 
       
        for(var i=0 ; i<result.data.length ; i++){
        
         var sender = result.data[i].sender ;

         document.querySelector("#sender_div"+i).style.display = "inherit";
         document.querySelector("#sender_name"+i).innerHTML = '<h5 id='+`sender_name${i}><a href='message.php?sender=${sender}'>${sender}</a></h5>`;
         document.querySelector("#sender_date"+i).innerHTML = "<span id="+`sender_date+${i}`+">"+result.data[i].date+"</span>" ;

         if(result.data[i].date > 0){
           document.querySelector("#sender_date"+i).style.fontWeight = "bold" ;
            document.querySelector("#unread_mes"+i).style.fontWeight = "bold" ;

            count++ ;
         }
       
        }

        if(count>0){
           document.querySelector("#mes_alert").style.color = "white" ;
            document.querySelector("#mes_count").textContent = count ;
        }
        else{
          document.querySelector("#mes_alert").style.color = "#CCCECF" ;
            document.querySelector("#mes_count").textContent = "0" ;
        }

       // console.log(result);
        //  console.log("Alright");
        }).catch(error=>error)
       }

    setInterval(showSenders, 500); 



  //  INPUT THE MESSAGE INTO DB

   if(sender_id !== 0){
     const content = document.querySelector("#content");
     const button = document.querySelector("#button");

     const sendMessage = async (sender , receiver , message)=>{
     
       const call_message = await fetch(`async/input_message.php?sender=${sender}&receiver=${receiver}&message=${message}`) ;
       const data = await call_message.json();

       return {data:data};

     } 

       const showMessage = ()=>{

        sendMessage(receiver_id , sender_id , content.value).then((result)=>{
           if(result.data == "true"){
             content.value = " ";
           }
      
        }).catch(error=>error)
       }

       document.getElementById("button").onclick = function(){
          showMessage();
       }

}



if(sender_id!== 0){

       //RELOADING THE MESSAGE BOX
          const updateMessage = async (sender, receiver)=>{
     
           const upd_message = await fetch(`async/update_message.php?sender=${sender}&receiver=${receiver}`) ;
           const data = await upd_message.json();

           return {data:data};

         } 

           const updMessage = ()=>{

            updateMessage(sender_id , receiver_id).then((result)=>{
              if(result.data == "true"){
                document.location.reload(true);
              }
          
            console.log(result);

            }).catch(error=>error)
           }
         
           setInterval(updMessage , 1000);
              
       

           function moveDiv(){
           var div = document.getElementById("here");
           div.scrollTop = div.scrollHeight - div.clientHeight;
        }
  

         moveDiv();

}

      </script>
       <script type="text/javascript" src="js/online.js"></script>
      
      
  </body>
</html>