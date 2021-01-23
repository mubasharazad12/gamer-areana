<?php include("includes/config.php")?>

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
function insert_product(){
    $gname = sanitize($_POST['game_name']);
    $gprice = sanitize($_POST['price']);
    $gsize = sanitize($_POST['size']);
    $comname = sanitize($_POST['company_name']);
    $conn = connect_to_database();
    $filename = $_FILES['userfile']['name'];
    $sql = "INSERT INTO game (game_name , price , size , company , image) VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    if($stmt === false) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    }
    $stmt->bind_param('siiss' , $gname , $gprice , $gsize , $comname , $filename);
    $stmt->execute();
    uploadFile();
    $stmt->close();
    header("Location:admin-area.php?status=RIS");
}

function update_product(){
    $gname = sanitize($_POST['game_name']);
    $gprice = sanitize($_POST['price']);
    $gsize = sanitize($_POST['size']);
    $comname = sanitize($_POST['company_name']);
    $old_name = sanitize($_POST['old_name']);
    $filename = $_FILES["userfile"]["name"];
    $conn = connect_to_database();
    $sql = "SELECT * FROM gAME WHERE game_name = ?";
    $stmt = $conn->prepare($sql);
    if($stmt === false) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    }
    $stmt->bind_param('s',$old_name);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0){
        $stmt->bind_result($id , $gn , $gp , $gs , $gc , $gi);
        $sql=" UPDATE game SET game_name = ? , price = ? , size = ? , company = ?,image=? WHERE game_name = ?";
        $stmt = $conn->prepare($sql);
    if($stmt === false) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    }
    $stmt->bind_param('siisss' , $gname , $gprice , $gsize , $comname , $filename , $old_name);
    $stmt->execute();
    uploadFile();
    header("Location:admin-area.php?status=RUS");
    }else{
        header("Location:admin-area.php?status=RNF");
    }
    $stmt->close();



    // $sql=" UPDATE Game SET game_name = ? , price = ? , size = ? , company = ?,image=? WHERE game_name = ?";
    // 
    // $stmt = $conn->prepare($sql);
    // if($stmt === false) {
    //     trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    // }
    // $stmt->bind_param('siisss' , $gname , $gprice , $gsize , $comname , $filename , $old_name);
    // $stmt->execute();
    // uploadFile();
    // header("Location:admin-area.php?status=RUS");
    // $stmt->close();
}


function delete_product(){
    $gname = sanitize($_POST['game_name']);
    $conn = connect_to_database();
    $sql = "SELECT * FROM game WHERE game_name = ?";
    $stmt = $conn->prepare($sql);
    if($stmt === false) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    }
    $stmt->bind_param('s',$gname);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0){
        $stmt->free_result();
        $sql = "DELETE FROM game WHERE game_name = ?";
        $stmt = $conn->prepare($sql);
        if($stmt === false) {
            trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
        }
        $stmt->bind_param('s' ,$gname);
        $stmt->execute();
        header("Location:admin-area.php?status=RDS");
    }else{
        header("Location:admin-area.php?status=RND");
    }
    // $sql = "DELETE FROM Game WHERE game_name = ?";
    // $stmt = $conn->prepare($sql);
    // if($stmt === false) {
    //     trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    // }
    // $stmt->bind_param('s' ,$gname);
    // $stmt->execute();
    // header("Location:admin-area.php?status=RDS");
    $stmt->close();
}

function search_product(){
    $product_name = sanitize($_POST['game_name']);
    $conn = connect_to_database();
    $sql = "SELECT * FROM game WHERE game_name = ? ";
    $stmt = $conn->prepare($sql);
    if($stmt === false) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    }
    $stmt->bind_param('s',$product_name);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0){
        $stmt->bind_result($id , $gn , $gp , $gs , $gc , $gi);
        while ($stmt->fetch()) {
            include("includes/shop-data.php");
            // header("Location: newsearchpageforgame.php");
        }
        $stmt->free_result();
    }
    $stmt->close();
}

function search_specific_game($game_id){
    $conn = connect_to_database();
    $sql='SELECT * FROM game WHERE id = ?';
    $stmt = $conn->prepare($sql);
    if($stmt === false) {
    trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    }
    $stmt->bind_param('i',$game_id);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0){
        $stmt->bind_result($id , $gn , $gp , $gs , $gc , $gimg);
        while ($stmt->fetch()) {
            return array($gn , $gp , $gs ,  $gc);
        }
        $stmt->free_result();
    }
    $stmt->close();
}

function uploadFile(){
	$fileSize= 5 * 1024 * 1024;
	if ((   ($_FILES["userfile"]["type"] == "image/jpeg") ||
			($_FILES["userfile"]["type"] == "image/png") ||
			($_FILES["userfile"]["type"] == "application/pdf") ||
			($_FILES["userfile"]["type"] == "image/jpg")) &&
			($_FILES["userfile"]["size"] < $fileSize)){
				if ($_FILES["userfile"]["error"] > 0)
		{
			echo "Error: " . $_FILES["userfile"]["error"] . "<br />";
		}
		else
		{
			move_uploaded_file( $_FILES["userfile"]["tmp_name"],
			"graphics/upload/" . $_FILES["userfile"]["name"]);
		}
	}
}


function display_game_on_screen(){
    $conn = connect_to_database();
    $sql='SELECT * FROM game';
    $stmt = $conn->prepare($sql);
    if($stmt === false) {
    trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    }
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0){
        $stmt->bind_result($id , $gn , $gp , $gs , $gc , $gi);
  
        while ($stmt->fetch()) {
            include("includes/shop-data.php");
           
        }
        $stmt->free_result();
    }
    $stmt->close();
}

if(isset($_POST['addgame'])){
    insert_product();
}

if(isset($_POST['update_game'])){
    update_product();
}

if(isset($_POST['delete_game'])){
    delete_product();
}

