<!-- page de connection d'un rédacteur au site pour pouvoir créer et intéragir avec les fonctionnalitées du site -->

<?php
session_start();
if (isset($_SESSION['pseudo'])) {
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = './accueil.html';
    header("Location: http://$host$uri/$extra");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Connection au site</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="./inscription.php">
                        <div>Inscription</div>
                    </a></li>
                <li><a href="./accueil.html">
                        <div>Retour à l'accueil</div>
                    </a></li>
            </ul>
        </nav>
    </header>
    <article>
        <h1>Connexion</h1>
        <form method="POST" action="traitement_connection_redacteur.php"> <br> <!-- ajouter le lien vers la page gérant la connexion du rédacteur -->
            <div>
                Identifiant :
                <input type="text" size="20" placeholder="pseudo ou email" name="identifiant" required autocomplete="off" /> <br> <br>

                Mot de passe :
                <input type="password" size="20" placeholder="password" name="motdepasse" required />
                <?php
                if (isset($_SESSION['pb'])) echo "cet identifiant n'existe pas ou le mot de passe est erroné";
                unset($_SESSION["pb"]);
                ?>
            </div>
            <input type="submit" name="connexion" value="connction" />
        </form>
    </article>
</body>

</html>