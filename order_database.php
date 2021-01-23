<?php include("includes/config.php");?>
<?php
global $dbhost , $dbuser , $password , $userdb;

function connect_to_database(){
    global $dbhost , $dbuser , $password , $userdb;
    $conn = new mysqli($dbhost , $dbuser , $password , "gamers_arena");
    if ($conn->connect_error) {
        trigger_error('Database connection failed: ' .
        $conn->connect_error, E_USER_ERROR);
    }else{
        return $conn;
    }
}
function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
function insert_order (){
    $fname = sanitize($_POST['firstname']);
    $lname = sanitize($_POST['lastname']);
    $phone = sanitize($_POST['phone']);
    $address = sanitize($_POST['address']);
    $city = sanitize($_POST['city']);
    $product_id = sanitize($_GET["product_id"]);
    $user_id = sanitize($_SESSION["id"]);
    $conn = connect_to_database();
    $sql = "INSERT INTO orders (productid , userid , fname, lname ,  phone , address , city) VALUES (?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    if($stmt === false) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    }
    $stmt->bind_param('iississ' , $product_id , $user_id , $fname , $lname ,$phone , $address , $city);
    $stmt->execute();
    header("Location: shop.php");
    // header("Location:admin-area.php?status=RIS");
}
function display_user_order(){
    $id = $_SESSION["id"];
    $conn = connect_to_database();
    $sql='SELECT * FROM orders WHERE userid = ?';
    $stmt = $conn->prepare($sql);
    if($stmt === false) {
    trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    }
    $stmt->bind_param('i',$id);
    $stmt->execute();
    $stmt->store_result();
    echo"
    <div class='table-div'><table>
    <tr>
    <th>Product ID</th>
      <th>User ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Phone</th>
      <th>Address</th>
      <th>City</th>
      </tr>";
    if ($stmt->num_rows > 0){
        $stmt->bind_result($product_id , $user_id , $fname , $lname ,$phone , $address , $city);
        while ($stmt->fetch()) {
            echo"<tr>
            <th>$product_id</th>
            <th>$user_id</th>
            <th>$fname</th>
            <th>$lname </th>
            <th>$phone</th>
            <th>$address</th>
            <th>$city</th>
          
          </tr>";
           
        }
        
        $stmt->free_result();
    }
    $stmt->close();
}

if(isset($_POST["order"])){
    insert_order();
}

