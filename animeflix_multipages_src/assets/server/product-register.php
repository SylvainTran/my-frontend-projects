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

        $title=$_POST['admin__register-product--title'];
        $author=$_POST['admin__register-product--author'];
        $desc=$_POST['admin__register-product--desc'];
        $price=$_POST['admin__register-product--price'];
        $category=$_POST['admin__register-product--category'];
        $releasedate=$_POST['admin__register-product--releasedate'];
        $duration=$_POST['admin__register-product--duration'];
        $cover="avatar.jpg";
        $dirpath="../img/";
        $covername=sha1($title.time());
        if($_FILES['admin__register-product--cover']['tmp_name']!=="") {
            $tmp=$_FILES['admin__register-product--cover']['tmp_name'];
            $file=$_FILES['admin__register-product--cover']['name'];
            $extension=strrchr($file,'.');
            @move_uploaded_file($tmp,$dirpath.$covername.$extension);
            @unlink($tmp);
            $cover=$covername.$extension;
        }
        try{
            $request="INSERT INTO products values(0,?,?,?,?,?,?,?,?)";
            $stmt=$connection->prepare($request);
            $stmt->bind_param("ssssdssi",$title,$author,$desc,$cover,$price,$category,$releasedate,$duration);
            $stmt->execute();        
            echo "<h1>";
            echo "Produit: ".$connection->insert_id." bien enregistr&eacute;.";
            echo "</h1>";
        } catch (Exception $e) {
            echo "Problem inserting row in the db";
        } finally {
            $stmt->close();
            mysqli_close($connection);
        }
    ?>
</body>

</html>