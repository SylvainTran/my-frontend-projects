<?php
    require_once("../includes/QueryObject.inc.php");
    $tabRes=array();

    function lister(){
        global $tabRes;
        $tabRes['action']="lister";
        $tabRes['msg']="Listing animes...";
        $requete="SELECT * FROM products";
        try{
            $animeTemplate=new QueryObject($requete,array());
            $stmt=$animeTemplate->executeQuery();
            $tabRes['listeFilms']=array();
            while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
                $tabRes['listeFilms'][]=$ligne;
            }
        }catch(Exception $e){
        }finally{
            unset($animeTemplate);
        }
    }
    function listByCat(){
        global $tabRes;
        $category=$_POST['dropdown-menu--category-form__select'];
        $tabRes['action']="list-by-cat";
        $tabRes['msg']="Listing animes by category...";
        $requete="SELECT * FROM products where category=?";
        try{
            $animeTemplate=new QueryObject($requete,array($category));
            $stmt=$animeTemplate->executeQuery();
            $tabRes['listeFilms']=array();
            while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
                $tabRes['listeFilms'][]=$ligne;
            }
        }catch(Exception $e){
        }finally{
            unset($animeTemplate);
        }
    }
    function createNewProduct(){
        global $tabRes;
        $title=$_POST['admin__modify-product--title'];
        $author=$_POST['admin__modify-product--author'];
        $desc=$_POST['admin__modify-product--desc'];
        $price=$_POST['admin__modify-product--price'];
        $category=$_POST['admin__modify-product--category'];
        $releasedate=$_POST['admin__modify-product--releaseDate'];
        $duration=$_POST['admin__modify-product--duration'];
        $previewUrl=$_POST['admin__modify-product--previewUrl'];
        $cover="avatar.jpg";
        $dirpath="../img/";
        $coverName=sha1($title.time());

        // Cleaning up whitespaces in string variables
        $title=trim($title);
        $author=trim($author);
        $desc=trim($desc);
        $previewUrl=trim($previewUrl);       
        
        if($_FILES['admin__modify-product--cover']['tmp_name']!=="") {
            $tmp=$_FILES['admin__modify-product--cover']['tmp_name'];
            $file=$_FILES['admin__modify-product--cover']['name'];
            $extension=strrchr($file,'.');
            @move_uploaded_file($tmp,$dirpath.$coverName.$extension);
            // Change file access
            chmod($dirpath.$coverName.$extension, 0644);
            @unlink($tmp);
            $cover=$coverName.$extension;
        }
        try{
            $request="INSERT INTO products values(0,?,?,?,?,?,?,?,?,?)";
            $productTemplate= new QueryObject($request,array($title,$author,$desc,$cover,$price,$category,$releasedate,$duration,$previewUrl));
            $stmt=$productTemplate->executeQuery();
            $tabRes['msg']="Successfully added new product.";
        } catch (Exception $e) {
            $tabRes['msg']="Problem inserting row in the db";
        } finally {
            $productTemplate->disconnect();
        }
    }

    if(!empty($_POST['action'])) {
        $action=$_POST['action'];
        switch($action){
            case "create":
                createNewProduct();
                break;
            case "lister":
                lister();
                break;
            case "list-by-cat":
                listByCat();
                break;
            default:
                break;
        }    
    }
    echo json_encode($tabRes);
?>