<?php
        include ("includes/config.php");
?> 
<!DOCTYPE html>
<html>
<head>
    <?php
        include ("includes/meta-tags.php");
    ?>  
    <title>Login</title>
    <script>
</script>
</head>
<body >
<!-- Header -->
    <?php
        include("includes/header.php");
    ?>
<!-- main -->
<img class="front-img" src="graphics/main-cover.jpg" alt="image">
<section>
    <div class="centerimg2">  </div>
        <div class="centerlogo"> <img src="graphics/qwe.png" alt=""> </div>
    
        <form class="form-style" method="post" action="login_database.php">
            <h2> Login!! </h2>
            <div class="br"></div> 
            <ul>
                
                <li class="field-center">
                    <input type="text" name="name" class="field-style field-half"  required placeholder="Email" />
                    
                </li>
 
                
                <li class="field-center">
                    <input type="password" name="pass" class="field-style field-half " required  placeholder="Password.." />
                    
                </li>
                <?php
                    if(isset($_GET["status"])){
                        if($_GET['status'] == "LFWU"){
                            echo "<h3> Please Enter Valid Email </h3>";
                        }
                        if($_GET['status'] == "URS"){
                            echo "<h3>Regristraion Succeed </h3>";
                        }
                        if($_GET['status'] == "UUS"){
                            echo "<h3> User Updated  </h3>";
                        }
                        if($_GET['status'] == "LOS"){
                            echo "<h3> User Logout Done </h3>";
                        }
                        
                    }
                ?>

                <?php
                    if(isset($_GET["status"])){
                        if($_GET['status'] == "LFWP"){
                            echo "<h3> Password Incorrect </h3>";
                        }
                    }
                ?>
            
                <li class="field-center">
                    <input class="setbutton" type="submit" value="Login" name="login" />
                </li>
             
             
            </ul>
            <a href="signup.php" class="field-center set-text">Register??</a>
        </form>
</section>


<!-- footer -->
<?php
        include ("includes/footer.php");
?>  
</body>
</html>