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
<img class="front-img" src="graphics/main-cover.jpg" alt="image">
<!-- first section -->
    <section>
        <div class="centerimg">  </div>
        <div class="centerlogo"> <img src="graphics/qwe.png" alt=""> </div>
    </section>
<!-- second section -->
<div class="br"></div> 
<h2> Order History</h2>

    <section> 
        <div class="br"></div> 
        <?php
        include("order_database.php");
        
        
if(isset($_GET["status"])){
    if($_GET["status"] == "SUP"){
        display_user_order();
    }
}
        
         ?>
    </section>

</main>
<div class="clear"></div>
<div class="centerimg2">  </div>
<!-- footer -->
<?php
        include ("includes/footer.php");
    ?>  
    
</body>
</html>