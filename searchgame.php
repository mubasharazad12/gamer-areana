
<?php
        include ("includes/config.php");
?> 
<!DOCTYPE html>
<html>
<head>
    <?php
        include ("includes/meta-tags.php");
    ?>  
    <title>Search</title>
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
    <section>
        <div class="centerimg">  </div>
       
    </section>
<!-- second section -->
<div class="br"></div> 
<h2> Search Results!!</h2>

    <section> 
        <div class="br"></div> 
        <?php 

    include("products_database_table.php");
    if(isset($_POST["search_game"])){
        search_product();
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
    
