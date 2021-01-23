<?php
        include("includes/config.php");
?> 
<!DOCTYPE html>
<html>
<head>
    <?php
        include ("includes/meta-tags.php");
    ?>  
    <title>Order</title>
    <script>
</script>
</head>
<body >
<!-- Header -->
    <?php
        include("includes/header.php");
    ?>
<!-- main -->
<?php if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {?>
<section>
<div class="centerimg2">  </div>
        <div class="centerlogo"> <img src="graphics/qwe.png" alt=""> </div>
        <form class="form-style" method="post" action=<?php echo"order_database.php?product_id=".$_GET['product_id']?>>
            <h2> Order Your Product!! </h2>
            <div class="br"></div> 
            <ul>
                <li class="field-center">
                    <input type="text" name="firstname" class="field-style field-half"  required placeholder="First Name" />
                    
                </li>
                
                <li class="field-center">
                    <input type="text" name="lastname" class="field-style field-half " required  placeholder="Last Name" />
                    
                </li>
                
                <li class="field-center">
                    <input type="number" name="phone" class="field-style field-half " required  placeholder="Phone/Mobile" />
                    
                </li>
                
                <li class="field-center">
                    <input type="text" name="address" class="field-style field-half " required  placeholder="Address" />
                    
                </li>
                   
                <li class="field-center">
                    <select required name="city" class="field-style field-half">
                        <option value ="" selected disabled hidden>City</option>
                        <option value="chakwal" >Chakwal</option>
                        <option value="jauharabad" >Jauharabad</option>
                        <option value="lahore" >Lahore</option>
                        <option value="Rawalpindi">Rawalpindi</option>
                        <option value="islamabad">Islamabad</option>
                    </select>
                    
                </li>
    
                <li class="field-center">
                    <input class="setbutton" type="submit" value="Order Now!!" name="order" />
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