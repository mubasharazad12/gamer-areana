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
function varify_login(){
    $email = sanitize($_POST['name']);
    $password = sanitize($_POST['pass']);
    $conn = connect_to_database();
    $sql = "SELECT * FROM users WHERE email = ? ";
    $stmt = $conn->prepare($sql);
    if($stmt === false) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    }
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0){
        $stmt->bind_result($id , $fn , $ln , $un , $em , $pn , $pass , $type);
        while ($stmt->fetch()) {
            if(password_verify($password , $pass)){
                $_SESSION["loggedIn"] = true;
                $_SESSION["email"] = $em;
                $_SESSION["id"] = $id;
                $_SESSION['type'] = $type;
                header("Location: index.php");
            }else{
                header("Location: login.php?status=LFWP");        
            }
        }
    }else{
        header("Location: login.php?status=LFWU");
    }
}

function register_to(){
    $f_name = sanitize($_POST['fname']);
    $l_name = sanitize($_POST['lname']);
    $username = sanitize($_POST['username']);
    $email = sanitize($_POST['email']);
    $phonenumber = sanitize($_POST['phoneNumber']);
    $password = sanitize($_POST['pass']);
    $hpwd=password_hash($password, PASSWORD_DEFAULT);
    $conn = connect_to_database();
    $sql = "INSERT INTO users (f_name, l_name , username , email , phone_number , password , type ) VALUES (?,?,?,?,?,?,'U')";
    $stmt = $conn->prepare($sql);
    if($stmt === false) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    }
    $stmt->bind_param('ssssis',$f_name , $l_name , $username , $email , $phonenumber, $hpwd);
    $stmt->execute();
    $stmt->close();
    header("Location: login.php?status=URS");
}

function update_database(){
    $email = sanitize($_SESSION["email"]);
    $old_password = sanitize($_POST['old_pass']);
    $password1 = sanitize($_POST['pass1']);
    $password2 = sanitize($_POST['pass2']);
    $f_name = sanitize($_POST['fname']);
    $l_name = sanitize($_POST['Lname']);
    $username = sanitize($_POST['username']);
    $phone = sanitize($_POST['phoneNumber']);
    $conn = connect_to_database();

    $sql = "SELECT password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    if($stmt === false) {
            trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    }
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0){
        $stmt->bind_result($pass);
        while ($stmt->fetch()) {
            if(password_verify($old_password , $pass)){
                if($password1 == $password2){
                    $hpwd=password_hash($password1, PASSWORD_DEFAULT);
                    $sql=" UPDATE users SET f_name = ?, l_name = ? , username = ? , phone_number = ?, password = ? WHERE email = ? AND password = ?";
                    $stmt = $conn->prepare($sql);
                    if($stmt === false) {
                        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
                    }
                    $stmt->bind_param('sssisss' , $f_name , $l_name , $username , $phone , $hpwd , $email , $pass);
                    $stmt->execute();
                    $stmt->close();
                    header("Location: login.php?status=UUS"); 
                }else{
                    $stmt->close();
                    header("Location: update-profile.php?status=PDM");            
                }
            }else{
                $stmt->close();
                header("Location: update-profile.php?status=PIC");        
            }
        }
    }

}


function delete_user(){
    $email = sanitize($_SESSION['email']);
    $conn = connect_to_database();
    $sql = "DELETE FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    if($stmt === false) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    }
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $stmt->close();
    header("Location: login.php?status=AD");

}

function check_email_in_use(){
    $email = sanitize($_GET['ev']);
    $conn = connect_to_database();
    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    if($stmt === false) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    }
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0){
        echo "<span> Email Already Exist!! </span>";
    }else{
        echo "<span> Email Not Found!! </span>";
    }
    $stmt->close();
}

function logout_user(){
    session_destroy();
    $_SESSION["loggedout"] = true;
    header("Location: login.php?status=LOS");
}

if(isset($_POST['login'])){
    varify_login();
}

if(isset($_POST['register'])){
    register_to();
}

if(isset($_POST['update'])){
    update_database();
}

if(isset($_GET["status"])){
    if($_GET['status'] == "LO"){
        logout_user();
    }
    if($_GET['status'] == 'DU'){
        delete_user();
    }
}
if(isset($_GET['ev'])){
    check_email_in_use();
}