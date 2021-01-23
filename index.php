<?php
        include ("includes/config.php");
?> 
<!DOCTYPE html>
<html>
<head>
    <?php
        include ("includes/meta-tags.php");
    ?>  
    <title>Game Arena</title>
    <script>
</script>
</head>
<body >
<!-- Header -->
    <?php
        include("includes/header.php");
    ?>
<!-- main -->
<main > 
<!-- first section -->

<img class="front-img" src="graphics/main-cover.jpg" alt="image">

    <section>
        <div class="centerimg">  </div>
        <div class="centerlogo"> <img src="graphics/qwe.png" alt=""> </div>
        <div> 
            <h1>Welcome to Game Arena </h1>
        </div>
        <?php if(!isset($_SESSION["loggedIn"])) { ?>
        <div class="flex-button">
        <a class=" setbutton a-set" href="login.php">
         Login 
        </a>
        <a class=" setbutton a-set" href="signup.php">
         Register 
        </a>
        </div>
        <?php }?>
    
    </section>
<!-- second section -->
    <section> 

        <!--  transparent div -->
        <div class="transparent"> 
            <div class="para1"> <p>"Classic Battlefield, with big maps, vehicles, and a focus on teamplay" – PC GAMER</p> </div>
            <div class="para2"> <p>"Easily the best shooter of 2018" – SCREENRANT</p> </div>
            <div class="para3"> <p>"War Stories are back with a bang" – PAKGAMER</p> </div>
        </div>

        <div class="br"></div> 

        <h2> Featured News</h2>
        

        <section> 
            <div class="br"></div> 
            <?php
                include("products_database_table.php");
                display_game_on_screen();
            ?>
        </section>

         <div class="clear"></div>
         <div class="flex-button">
            <a class=" setbutton a-set" href="shop.php">
                 View More 
            </a>
        </div>

        
    </section>
   
</main>

<div class="centerimg2">  </div>

<!-- footer -->
<?php
        include ("includes/footer.php");
    ?>  
    
</body>
</html>