<?php
        include ("includes/config.php");
?> 
<!DOCTYPE html>
<html>
<head>
    <?php
        include ("includes/meta-tags.php");
    ?>  
    <title>Update Profile</title>
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
<?php if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {?>
<section>
    <div class="centerimg2">  </div>
        <div class="centerlogo"> <img src="graphics/qwe.png" alt=""> </div>
    
        <form class="form-style" method="post" action="login_database.php">
            <h2> Update Your Profile!! </h2>
            <div class="br"></div> 
            <ul>
                <li class="field-center">
                    <input type="text" name="fname" class="field-style field-half"  required placeholder="Full Name" />
                    
                </li>
                <li class="field-center">
                    <input type="text" name="Lname" class="field-style field-half"  required placeholder="Last Name" />
                    
                </li>
                <li class="field-center">
                    <input type="text" name="username" class="field-style field-half " required  placeholder="Username.." />
                </li>

                <li class="field-center">
                    <input type="number" name="phoneNumber" class="field-style field-half " required  placeholder="Phonenumber.." />
                </li>

                    
                <?php
                    if(isset($_GET["status"])){
                        if($_GET['status'] == "PIC"){
                            echo "<p> old password does not match </p>";
                        }
                    }
                ?>

                <li class="field-center">
                    <input type="password" name="old_pass" class="field-style field-half " required  placeholder="Old Password.." />
                </li>

                <li class="field-center">
                    <input type="password" name="pass1" class="field-style field-half " required  placeholder="New Password.." />
                </li>

                <li class="field-center">
                    <input type="password" name="pass2" class="field-style field-half " required  placeholder="Confirm Password.." />
                </li>

                <?php
                    if(isset($_GET["status"])){
                        if($_GET['status'] == "PDM"){
                            echo "<p> password do not match </p>";
                        }
                    }
                ?>

                <li class="field-center">
                    <input class="setbutton" type="submit" value="Update" name="update" />
                </li>
            
            </ul>
        </form>
</section>

<?php } 

else {header("Location: login.php?status=UALA");

}?>

<!-- footer -->
<?php
        include ("includes/footer.php");
?>  
</body>
</html>