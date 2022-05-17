<?php
    session_start();
?>
<!doctype html>
<html lang="en">
<?php include '../head.html';?>

<body>
    <?php include '../nav-admin.html';?>
    <?php
        require_once("../db/connect.inc.php");
        $deleteId=$_POST['admin__delete-id'];
        $request="SELECT * FROM products WHERE id=?";
        $stmt=$connection->prepare($request);
        $stmt->bind_param("i",$deleteId);
        $stmt->execute();
        $result=$stmt->get_result();
        
        if(!$ligne=$result->fetch_object()) {
            echo "Produit ID non-associ&eacute; &agrave; un produit.";
            mysqli_close($connection);
            exit;
        }
        $cover=$ligne->cover;
        if($cover!="avatar.jpg") {
            $rmCover="../img/".$cover;
            $fileArr=glob('../img.*');
            foreach($fileArr as $file) {
                if(is_file($file) && $file==trim($rmCover)) {
                    unlink($file);
                    break;
                }
            }
        }
        $request="DELETE FROM products WHERE id=?";
        $stmt=$connection->prepare($request);
        $stmt->bind_param("i",$deleteId);
        $stmt->execute();
        mysqli_close($connection);
        echo "<h3>The product with ID: ".$deleteId." has been removed.</h3>";
    ?>
    <a href="../server/admin.php">Retour à la page d'accueil</a>
</body>

</html>