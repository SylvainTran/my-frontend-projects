<?php
    // Start the session
    session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <title>Travail Pratique #2</title>
    <!-- Bootstrap CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/tp2/assets/css/bootstrap-4.5.0/bootstrap.min.css">
    <link rel="stylesheet" href="/tp2/assets/css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <script src="/tp2/assets/js/lib/jquery-3.5.1.min.js"></script>
    <script src="/tp2/assets/js/lib/bootstrap.bundle.min.js"></script>
    <script src="/tp2/assets/js/main.js"></script>
</head>

    <body>
        <!-- Navbar content -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#">Anime Cookie</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Anim&eacute;s <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mangas <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cat&eacute;gories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Shonen</a>
                            <a class="dropdown-item" href="#">Shojo</a>
                            <a class="dropdown-item" href="#">Other</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Zone Membres</a>
                    </li>
                    <li class="nav-item">
                        <a id="nav__client-name" class="nav-link" href="#" tabindex="-1" aria-disabled="true"></a>
                    </li>
                    <li class="nav-item">
                        <a id="nav__client-login" class="nav-link" href="#" tabindex="-1" aria-disabled="true"></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div>
        <?php
            // Create user to client db (username 'admin' is already taken)
            require_once("../db/connect.inc.php");
            $username=$_POST['modal__reg-input--username'];
            $password=$_POST['modal__reg-input--password'];
            // Validate if the username is not already taken in the db
            $valstmt=$connection->prepare('SELECT username FROM connexion WHERE username=?');
            $valstmt->bind_param("s",$username);
            $valstmt->execute();    
            try{
                $users=$valstmt->get_result();
                // If no entry with the same username was found (null) then create username
                if($users->num_rows === 0) {
                    $request="INSERT INTO connexion values(0,?,?,'M')";
                    $stmt=$connection->prepare($request);
                    $stmt->bind_param("ss",$username,$password);
                    $stmt->execute();        
                    $stmt->close();
                    echo "<h1>";
                    echo "Utilisateur: ".$connection->insert_id." bien enregistr&eacute;.";
                    echo "</h1>";
                } else {
                    echo "Username was already taken.";
                }
            } catch (Exception $e) {
                echo "Problem looking up the db";
            } finally {
                // This code is run no matter what happens
                $valstmt->close();
                mysqli_free_result($users);
                mysqli_close($connection);
            }
        ?>
        </div>
        <a href="../../index.php">Retour &agrave; l'accueil.</a>
    </body>

</html>