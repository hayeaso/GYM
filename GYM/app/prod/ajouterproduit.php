<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="../../js/jquery-1.10.2.js" type="text/javascript"></script>
        <link href="../../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <script src="../../bootstrap/js/bootstrap.js" type="text/javascript"></script>

    </head>
    <body align='center'>
        <?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
        session_start();

// On récupère nos variables de session
        if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
//            echo 'Votre login est ' . $_SESSION['login'] . ' et votre mot de passe est ' . $_SESSION['password'] . '.';
            ?>
            <div class="row col-md-4 col-md-offset-4" style=" margin-top: 30px;">
                <?php
                $connexion = mysql_connect("localhost", "root", "");
                mysql_selectdb("bechir_app", $connexion);


                $libellem = $_POST["libelle_prod"];
                $form = $_POST["prix_achat"];
                $coded = $_POST["prix_vente"];
                $codef = $_POST["stock"];



                $insertion = "INSERT INTO `bechir_app`.`produit`(`libelle_prod`,`prix_achat`,`prix_vente`,`stock`)
 VALUES('$libellem','$form','$coded','$codef')";
                echo'produit ajouter avec succés <br><br>';

                mysql_query($insertion) or die('Voici votre eurreur : <br>' . mysql_error());


                echo '<a href="../home_prod.php"> <button type="button" class="btn btn-danger">Retour au menu des produits</button></a>';
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