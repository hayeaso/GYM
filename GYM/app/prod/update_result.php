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
                $id = $_GET['id'];
                $libellem = $_POST['libelle_prod'];
                $form = $_POST['prix_achat'];
                $coded = $_POST['prix_vente'];
                $codef = $_POST['stock'];


                $connexion = mysql_connect("localhost", "root", "");
                mysql_selectdb("bechir_app", $connexion);
                $insertion = "UPDATE produit SET libelle_prod ='$libellem',
					 prix_achat ='$form',prix_vente ='$coded',stock ='$codef' WHERE idprod = '$id'";
                mysql_query($insertion) or die('Voici votre eurreur : <br>' . mysql_error());
                echo 'La modification a été faite avec sucées.<br/> '
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
</html>