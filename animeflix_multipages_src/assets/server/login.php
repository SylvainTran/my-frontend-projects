<?php
    session_start();
?>
<?php
    require_once("../db/connect.inc.php");
    $username=$_POST['modal__login-input--username'];
    $password=$_POST['modal__login-input--password'];
    $found="";
    $_found="";

    $valstmt=$connection->prepare('SELECT username FROM connexion WHERE username=?');
    $valstmt->bind_param("s",$username);
    $valstmt->execute();  
    $result=$valstmt->get_result();

    if($result->num_rows > 0) {
        $found=$result->fetch_object()->username;
    }
    // password
    $pass_stmt=$connection->prepare('SELECT password FROM connexion WHERE password=?');
    $pass_stmt->bind_param("s",$password);
    $pass_stmt->execute();
    $_result=$pass_stmt->get_result();

    if($_result->num_rows > 0) {
        $_found=$_result->fetch_object()->password;
    }
    // Login was correct but not password
    if($username===$found && $password!==$_found) {
        echo "Password incorrect";
    } elseif($username!==$found && $password===$_found) { // Username was incorrect but password was correct
        echo "Identifiant incorrect";
    }
    // Compare
    $userpass_stmt=$connection->prepare('SELECT * FROM connexion WHERE username=? AND password=?');
    $userpass_stmt->bind_param("ss",$username,$password);
    $userpass_stmt->execute();
    $client=$userpass_stmt->get_result();

    if($client->num_rows > 0) {
        $ligne=$client->fetch_object();
        echo $ligne->username;
        // Store client info in sessionstorage/localstorage to display his login and cart
        $_SESSION["id"]=$ligne->id;
        $_SESSION["username"]=$username;
        $_SESSION["password"]=$password;
        if($ligne->role=='A') {
            Header("Location:admin.php?membre=".$username);
        } else {
            Header("Location:member.php?membre=".$username);
        }
        // TODO Cart                
    }
?>