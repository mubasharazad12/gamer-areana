<?php
include ("../includes/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include ("../includes/meta-tags.php");
    ?>
    <title>Games List</title>
</head>
<body>
<?php
include("../includes/header.php");
?>
<section>
        <div class="centerimg2">  </div>
        <div class="centerlogo"> <img src="../graphics/qwe.png" alt=""> </div>
        
    
    </section>
<section>
<?php include("../products_database_table.php");
            if((isset($_GET['game_id_status']))){
                $game_id = $_GET['game_id_status'];
                $values = search_specific_game($game_id);
            }
            
        ?>
 <form class="form-style" action="<?php echo $path."order.php?product_id=". $game_id?>" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label >Gamm Name : </label>
                <label> <?php echo $values[0] ;?></label>
            </li>
            <li>
                <label >Price :  </label>
                <label> <?php echo $values[1] ;?></label>
            </li>
            <li>
                <label >Size :  </label>
                <label> <?php echo $values[2] ;?></label>
            </li>
            <li>
                <label >Company : </label>
                <label> <?php echo $values[3] ;?></label>
            </li>

            <?php if(!isset($_SESSION["loggedIn"])) { ?>
                    <li class="field-center">
                    <input class="setbutton" type="submit" value="Click To Buy!!" />
                     </li>
               <?php }?>
               <?php if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) { ?>
                <?php if ($_SESSION["type"] == 'U') {?>
                    <li class="field-center">
                    <!-- <input class="setbutton" type="submit" value="Click To Buy!!" /> -->
                    <a class="setbutton a-set"  href="<?php echo $path."order.php?product_id=". $game_id?>">Click to buy</a>
                     </li>
                <?php }?>
               <?php }?>
        </ul>
    </form>
</section>

<?php
include("../includes/footer.php");
?>
</body>
</html>
