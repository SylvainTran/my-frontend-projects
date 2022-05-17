<?php session_start();?>
<!doctype html>
<html lang="en">
    <?php
        include 'head-base.php'; 
    ?>
<body onload="requests('list');">
    <?php
        include 'nav-public.html';
        include 'form--admin-register-new.html';
    ?>
    <div id="msg"></div>
    <div id="content-container"></div>
</body>

</html>