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
               
                <!--NOTIFICATION DROPDOWN-->
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="far fa-bell"></i></a>
                <div class="dropdown-menu drop-link">
                  <a class="dropdown-item" href="#">Action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Separated link</a>
                </div>
              </li>
                
                <!-- MESSAGE DROPDOWN -->
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="far fa-envelope"></i></a>
                <div class="dropdown-menu drop-link">
                  <a class="dropdown-item" href="#">Message 1</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Read More</a>
                </div>
              </li>    
                
                <!-- USER DROPDOWN -->
               <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="far fa-user"></i> <?php echo $_SESSION['firstname']; ?></a>
                <div class="dropdown-menu drop-link">
                  <a class="dropdown-item" href="../profile.php"><i class="far fa-user"></i> Profile</a>
                  <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../includes/logout.php"><i class="fas fa-power-off"></i> Log Out</a>
                </div>
              </li>    
            </ul>
          </div>
        </nav>