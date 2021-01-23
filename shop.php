<?php
        include ("includes/config.php");
?> 
<!DOCTYPE html>
<html>
<head>
    <?php
        include ("includes/meta-tags.php");
    ?>  
    <title>Games</title>
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
<h2> Featured News</h2>

    <section> 
        <div class="br"></div> 
        <?php
            include("products_database_table.php");
            display_game_on_screen();
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