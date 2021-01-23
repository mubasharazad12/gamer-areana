<?php
        include ("includes/config.php");
?> 
<!DOCTYPE html>
<html>
<head>
    <?php
        include ("includes/meta-tags.php");
    ?>  
    <title>Register</title>
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
            <h2> Register Here!! </h2>
            <div class="br"></div> 
            <ul>
                <li class="field-center">
                    <input type="text" name="fname" class="field-style field-half"  required placeholder="First Name" />
                    
                </li>
                
                <li class="field-center">
                    <input type="text" name="lname" class="field-style field-half " required  placeholder="Last Name" />
                    
                </li>
                
                <li class="field-center">
                    <input type="text" name="username" class="field-style field-half " required  placeholder="username" />
                    
                </li>

           
                <li class="field-center">
                    <input type="number" name="phoneNumber" class="field-style field-half " required  placeholder="phoneNumber" />
                </li>

                <li class="field-center">
                    <input type="password" name="pass" class="field-style field-half " required  placeholder="Password.." />
                    
                </li>
                <li class="field-center">
                     <input id="emailvalue" type="email" name="email" class="field-style field-half " required  placeholder="Email" />
                    
                    
                </li>
                <h3><span id="emailcheck"></span>  </h3> 
                
                <li class="field-center">
                    <input class="setbutton" type="submit" value="Register" name="register" />
                </li>
            </ul>
        </form>
</section>


<!-- footer -->
<?php
        include ("includes/footer.php");
?>  
<script>
    $(document).ready(
        function(){
            $('#emailvalue').blur(function(){
            var ev = $(this).val();
            $("#emailcheck").html("checking----");
            $("#emailcheck").load("login_database.php" , 'ev='+ev);
            });
        });
</script>

</body>
</html>