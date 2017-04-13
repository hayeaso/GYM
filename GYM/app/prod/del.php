<html>
    <head>
        <meta charset="UTF-8">
        <script src="../../js/jquery-1.10.2.js" type="text/javascript"></script>
        <link href="../../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <script src="../../bootstrap/js/bootstrap.js" type="text/javascript"></script>

    </head>
    <body>
        <?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
        session_start();

// On récupère nos variables de session
        if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
//            echo 'Votre login est ' . $_SESSION['login'] . ' et votre mot de passe est ' . $_SESSION['password'] . '.';
            ?>
            <div class="row col-md-4 col-md-offset-4" style=" margin-top: 30px;">

                <?php
                include("db.php");

                $id = $_GET['idprod'];

                // sending query
                mysql_query("DELETE FROM produit WHERE idprod = '$id'")
                        or die(mysql_error());
                echo 'La Suppression a été faite avec sucées.<br/> '
                . '<a href="liste_produit.php"> <button type="button" class="btn btn-danger">Retour a la liste des produits</button></a>';
                ?>
            </div>
            <?php
        } else {
            header("Location:../../index.php");
            exit();
        }
        ?>
    </body>

