<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <script src="js/jquery-1.10.2.js" type="text/javascript"></script>
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
        session_start();

// On récupère nos variables de session
        if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
//            echo 'Votre login est ' . $_SESSION['login'] . ' et votre mot de passe est ' . $_SESSION['password'] . '.';
            ?>
            <div class="row col-md-2 col-md-offset-5" style="clear: both;margin-top: 20px;">
                <a href="logout.php">
                    <button type="submit" class="btn btn-danger  btn-lg btn-block" value="Envoyer">
                        <img src=img/off.png width="50">
                    </button>
                </a> 
            </div>
            <div class="row col-md-8 col-md-offset-2" style="clear: both;margin-top: 20px;">
                <img src=img/california.png alt="Smiley face"  style="margin-left: auto;margin-right: auto; display: block;">
                <a href="app/add_client.php"><button type="submit" class="btn btn-danger  btn-lg btn-block" value="Envoyer">AJOUTER UN CLIENT</button></a> <br>
                <a href="app/afficher.php?sorting=DESC&field=idclient"><button type="submit" class="btn btn-danger  btn-lg btn-block" value="Envoyer">VISUALISER LES CLIENTS</button></a> <br>
                <a href="app/rechercher.php"><button type="submit" class="btn btn-danger  btn-lg btn-block" value="Envoyer">RECHERCHER UN CLIENT</button></a> <br>
                <a href="app/home_prod.php"><button type="submit" class="btn btn-danger  btn-lg btn-block" value="Envoyer">GESTION DES PRODUITS</button></a> <br>




                <?php ?>

            </div>

            <?php
        } else {
            header("Location:index.php");
            exit();
        }
        ?>
    </body>
</html>

