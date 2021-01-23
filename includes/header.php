<!-- Background , overlay , backtotop  -->
<header>
<!-- <video class="video" src="videos/video2.mp4" autoplay loop></video> -->
      
        <a id="back2Top" title="Back to top" href="#">&#10148;</a>   
        <div id="myNav" class="overlay">
            <p class="closebtn" onclick="closeNav()">&times;</p>  
            <ul>
                <li class="overlay-specific-margin"> <a class="link" href="<?php echo $path?>index.php">  Home </a>  </li>
                <li class="overlay-specific-margin"><a class="link" href="<?php echo $path?>shop.php">  Games </a>  </li>

            <?php if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) { ?>
                    <li class="overlay-specific-margin">  <a class="link" href="<?php echo $path?>update-profile.php">Update Profile</a>  </li>
                     <?php }?>
            </ul>
           
       </div>
       <div id="myNav2" class="overlay">
            <p class="closebtn" onclick="closeNav2()">&times;</p>  
            <div class="flex-button user-button">

            <?php if(!isset($_SESSION["loggedIn"])) { ?>
               <a class=" setbutton a-set" href="<?php echo $path?>login.php">  <i class="fas fa-user-clock"></i>  Login </a>
               <a class=" setbutton a-set" href="<?php echo $path?>signup.php"> <i class="fas fa-user-clock"></i> Signup </a>
               <?php }?>
               <?php if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) { ?>
                <a class=" setbutton a-set" href="<?php echo $path?>login_database.php?status=LO"> <i class="fas fa-user-clock"></i> Logout </a>
                <?php if ($_SESSION["type"] == 'A') {?>
               <a class=" setbutton a-set" href="<?php echo $path?>admin-area.php"><i class="fas fa-user-clock"></i> Client Area </a>
                <?php }?>
               <?php }?>

               <?php if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) { ?>
                <?php if ($_SESSION["type"] == 'U' || $_SESSION["type"] == 'A') {?>
                    <a class=" setbutton a-set" href="<?php echo $path?>update-profile.php"><i class="fas fa-user-clock"></i> Update profile </a>
                <?php }?>
               <?php }?>
              
            </div>
         </div>
         
<!-- Top  header -->
       
    <div class="topheader" id="navbar" > 
           <div class="toplogo"> 
               <a href="<?php echo $path?>index.php"> 
                   <img src="<?php echo $path?>graphics/logo4.png"  alt=""> 
                </a> 
            </div>
            <span class="que-set" onclick="openNav2()"> <i class="fas fa-user-plus"></i> </span>
           <?php if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) { ?>
                <?php if ($_SESSION["type"] == 'U') {?>
                    <a href="<?php echo $path?>includes/order-data.php?status=SUP"><span class="que-set" > <i class="fas fa-cart-arrow-down"></i> </span> </a>
                <?php }?>
               <?php }?>
        </div>
<!-- main header -->
    <div class="header2 " id="head2">

<!-- nav -->
            <nav>
                <div class="logo">.</div>
                
                <ul>
                     <li>  <a class="link " href="<?php echo $path?>index.php">Home</a>  </li>
                     <li>  <a class="link " href="<?php echo $path?>shop.php">Games</a>  </li>
                    
                    
                </ul>
               
                <div class="responsive-button " onclick="openNav()">
                        <div class="line1"></div>
                        <div class="line2"></div>
                        <div class="line3"></div>
            
                </div>
            </nav>
        </div>
    </header>