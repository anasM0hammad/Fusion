<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="index.php">Admin</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav container justify-content-end nav-links">
                  
            <li class="nav-item dropdown">
                <a class="nav-link" href="../index.php"><i class="fas fa-home"></i> </a>
              </li>      
               
                
                <!-- MESSAGE DROPDOWN -->

                <?php

                //COUNTING NUMBER OF UNREAD MESSAGES
                $username = $_SESSION['username'];
                $unread = "SELECT * FROM message WHERE message_receiver = '$username' AND message_read = 0 " ;
                $unread_result = mysqli_query($connect, $unread) ;
                $count = mysqli_num_rows($unread_result);


                ?>


                <?php if($count>0){ ?>
                  <style type="text/css">
                    #mes_alert{
                      color: white;
                    }
                    #mes_count{
                      color: white;
                    }
                  </style>
                <?php } else{ ?>
                  <style type="text/css">
                    #mes_alert{
                      color: #CCCECF;
                    }
                    #mes_count{
                      color: #CCCECF ;
                    }
                  </style>
                <?php }?>

                 <?php if(isset($_SESSION['username'])){

                  echo " <li class='nav-item ''>
                <a class='nav-link' href='../message.php' id='mes_alert'><span class='badge badge-secondary' id='mes_count'><i class='fas fa-envelope'></i> {$count}</span></a>
                  </li>" ;

                } ?>
 

              
                
                <!-- USER DROPDOWN -->
               <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="far fa-user"></i> <?php echo $_SESSION['firstname']; ?></a>
                <div class="dropdown-menu drop-link">
                  <a class="dropdown-item" href="../profile.php"><i class="far fa-user"></i> Profile</a>
                  <a class="dropdown-item" href="../profile.php?settings=1"><i class="fas fa-cog"></i> Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../includes/logout.php"><i class="fas fa-power-off"></i> Log Out</a>
                </div>
              </li>    
            </ul>
          </div>
        </nav>