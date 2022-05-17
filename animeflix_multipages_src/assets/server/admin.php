<?php
    session_start();
?>
<!doctype html>
<html lang="en">
<?php include '../head.html';?>
<style>
    img {       
        width: 40px;
        height: 40px;
    }
</style>
<body>
    <?php include '../nav-admin.html';?>
    <!-- Register new anime -->
    <h1>Admin Dashboard</h1>
    <hr>
    <button onclick="toggleAdminList();" id="form--admin-register-new-bt">Add a new product</button>
    <button onclick="toggleDeleteList();" id="form--admin-delete-bt">Delete a product</button>
    <?php include '../form--admin-register-new.html';?>
    <?php include '../form--admin-delete.html';?>
    <h3 id="content__admin-all-products">Inventaire</h3>
    <!-- TODO Read products from db -->
    <div class="adminlist-grid-container--header">
        <div class="">Cover</div>
        <div class="">Title</div>
        <div class="">Author</div>
        <div class="">Category</div>
        <div class="">Duration</div>
        <div class="">Price (CAD$)</div>
        <div class="">ID</div>
        <div class="">Management</div>
        <?php
            require_once("../db/connect.inc.php");
            $rep="";
            $request="SELECT * FROM products";
            try {
                $productList=mysqli_query($connection,$request);
                while($line=mysqli_fetch_object($productList)) {
                    $rep.="<div class=adminlist-grid-container--content>"."<img src=../img/".($line->cover)." alt=cover /></div>";
                    $rep.="<div class=adminlist-grid-container--content>".($line->title)."</div>";
                    $rep.="<div class=adminlist-grid-container--content>".($line->author)."</div>";
                    $rep.="<div class=adminlist-grid-container--content>".($line->category)."</div>";
                    $rep.="<div class=adminlist-grid-container--content>".($line->duration)."$</div>";
                    $rep.="<div class=adminlist-grid-container--content>".($line->price)."</div>";
                    $rep.="<div class=adminlist-grid-container--content>".($line->id)."</div>";
                    $rep.="<div class=adminlist-grid-container--content><input type=submit value=delete form=content--admin__delete ></input><input type=submit value=modify form=content--admin__modify ></input></div>";
                }
                mysqli_free_result($productList);
            }catch(Exception $e) {
                echo "Problem reading database.";
            }finally{
                echo $rep;
            }
            mysqli_close($connection);
        ?>
    </div>
    <!-- Forms for delete and modify operations -->
    <form id="content--admin__delete" action="product-delete.php"
            method="POST">
    </form>
    <form id="content--admin__modify" action="product-modify.php"
            method="POST">
    </form>
</body>

</html>