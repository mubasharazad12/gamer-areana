<?php
include ("config.php");
?>
<!DOCTYPE html>
<html lang="en">  
<head>
<?php
include("../order_database.php");
?>
 <?php
    include ("meta-tags.php");
?>
<title>Order Data</title>

</head>
<body>
<?php
    include ("header.php");
?>  
    
<section>
    
        <div class="centerimg">  </div>
     
        <h2>Order History!!</h2>
        <div class="centerimg2">  </div>
</section>
<section>

<?php 
    if(isset($_GET["status"])){
        if($_GET["status"] == "SUP"){
            display_user_order();
       

        }
    }
?>

</table>
  </div>
</section>
<div class="centerimg2">  </div>
<?php
        include ("footer.php");
    ?>  
    
</body>
</html>


