<?php
        include("includes/config.php");
?> 
<!DOCTYPE html>
<html>
<head>
    <?php
        include ("includes/meta-tags.php");
    ?>  
    <title>Admin Area</title>
  
   
</head>
<body >
<!-- Header -->
    <?php
        include("includes/header.php");
    ?>
    <img class="front-img" src="graphics/main-cover.jpg" alt="image">
<!-- main -->
<?php if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
        if($_SESSION["type"] == "A"){
    ?>
<section>
<div class="centerimg2">  </div>
        <div class="centerlogo"> <img src="graphics/qwe.png" alt=""> </div>
            <h2>Admin Panel!!</h2>
            <div class="flex-button">
                <button class=" setbutton" id="button1"> Add Game </button>
            </div>
                <form class="form-style" id="form1" method="post" action="products_database_table.php" enctype="multipart/form-data">
                            <h2> Add Game Here!! </h2>
                            <div class="br"></div> 
                            <ul>
                                <li class="field-center">
                                    <input type="text" name="game_name" class="field-style field-half"  required placeholder=" Game Name(New)" />
                                    
                                </li>
                                
                                <li class="field-center">
                                    <input type="number" name="price" class="field-style field-half " required  placeholder="Price" />
                                    
                                </li>
                                
                                <li class="field-center">
                                    <input type="text" name="company_name" class="field-style field-half " required  placeholder="Company Name" />
                                    
                                </li>
                                
                                <li class="field-center">
                                    <input type="number" name="size" class="field-style field-half " required  placeholder="Size (gb)" />
                                    
                                </li>
                                
                                <li class="field-center">
                                    <input type="file" name="userfile" class="field-style field-half " required  />
                                </li>
                                
                                <li class="field-center">
                                    <input class="setbutton" type="submit" value="Add!!"  name="addgame" />
                                </li>
                            </ul>
                          
                </form>
                            <?php
                                if(isset($_GET["status"])){
                                 if($_GET['status'] == "RIS"){
                                    echo "<h3> Record Inserted Successfull!! </h3>";
                                    }
                                    }
                                 ?>

                <div class="flex-button">
                <button class=" setbutton" id="button2"> Search Game </button>
                </div>
                <form class="form-style" id="form2" method="post" action="searchgame.php">
                            <h2> Search game!! </h2>
                            <div class="br"></div> 
                            <ul>
                                <li class="field-center">
                                    <input type="text" name="game_name" class="field-style field-half"  required placeholder="Product Name" />
                                </li>
                    
                                <li class="field-center">
                                    <input class="setbutton" type="submit" value="Search!!" name="search_game"/>
                                    
                                </li>
                            </ul>
                            <?php
                            include("products_database_table.php");
                            if(isset($_POST['search_game'])){
                                search_product();
                            }
                            ?>
                </form>
       
            <div class="flex-button">
                <button class=" setbutton" id="button3"> Update Game </button>
            </div>
                <form class="form-style" id="form3" method="post" action="products_database_table.php" enctype="multipart/form-data">
                            <h2> Update Game Here!! </h2>
                            <div class="br"></div> 
                            <ul>
                                <li class="field-center">
                                    <input type="text" name="game_name" class="field-style field-half"  required placeholder=" Game Name(New)" />
                                    
                                </li>

                                <li class="field-center">
                                    <input type="text" name="old_name" class="field-style field-half"  required placeholder="Game Name(OLD)" />
                                    
                                </li>
                                
                                <li class="field-center">
                                    <input type="number" name="price" class="field-style field-half " required  placeholder="Price" />
                                    
                                </li>
                                
                                <li class="field-center">
                                    <input type="text" name="company_name" class="field-style field-half " required  placeholder="Company Name" />
                                    
                                </li>
                                
                                <li class="field-center">
                                    <input type="number" name="size" class="field-style field-half " required  placeholder="Size (gb)" />
                                    
                                </li>
                                <li class="field-center">
                                    <input type="file" name="userfile" class="field-style field-half " required  />
                                </li>
                                
                                <li class="field-center">
                                    <input class="setbutton" type="submit" value="Update!!"  name="update_game" />
                                </li>
                            </ul>
                </form>

                <?php
                    if(isset($_GET["status"])){
                        if($_GET['status'] == "RUS"){
                            echo "<h3> Record Updated !! </h3>";
                        }
                        if ($_GET["status"] == "RNF"){
                            echo "<h3> Record not found </h3>";
                        }
                    }
                ?>

                <div class="flex-button">
                <button class=" setbutton" id="button4"> Delete Game </button>
              </div>
                <form class="form-style" id="form4" method="post" action="products_database_table.php">
                            <h2> Delete Game Here!! </h2>
                            <div class="br"></div> 
                            <ul>
                                <li class="field-center">
                                    <input type="text" name="game_name" class="field-style field-half"  required placeholder="Product Name" />
                                    
                                </li>
                                <li class="field-center">
                                    <input class="setbutton" type="submit" value="Delete!!"  name="delete_game" />
                                </li>
                            </ul>
                </form>

                <?php
                    if(isset($_GET["status"])){
                        if($_GET['status'] == "RDS"){
                            echo "<h3> Record Deleted !! </h3>";
                        }
                        if($_GET["status"] == "RND"){
                            echo "<h3> Record not found in the database </h3>";
                        }
                    }
                ?>

                <div class="br"></div> 

<?php }}else{
    header("Location: login.php?status=UAA");
}?>    
</section>
<!-- footer -->
<?php
        include ("includes/footer.php");
?>  
</body>
</html>