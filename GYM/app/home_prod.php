<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="../bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <script src="../js/jquery-1.10.2.js" type="text/javascript"></script>
        <link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
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
                <a href="../logout.php">
                    <button type="submit" class="btn btn-danger  btn-lg btn-block" value="Envoyer">
                        <img src=../img/off.png width="50">
                    </button>
                </a> 
            </div>
            <div class="row col-md-8 col-md-offset-2" style="clear: both;margin-top: 20px;">
                <img src=../img/california.png alt="Smiley face"  style="margin-left: auto;margin-right: auto; display: block;">

                <a href="prod/ajouter_prod.php"><button type="submit" class="btn btn-danger  btn-lg btn-block" value="Envoyer">AJOUTER UN PRODUIT</button></a> <br>
                <a href="prod/liste_produit.php"><button type="submit" class="btn btn-danger  btn-lg btn-block" value="Envoyer">LISTE DES PRODUITS</button></a> <br>
                <a href="prod/vendre1.php"><button type="submit" class="btn btn-danger  btn-lg btn-block" value="Envoyer">VENDRE DES PRODUITS</button></a> <br>
                <a href="prod/bilan_total.php"><button type="submit" class="btn btn-danger  btn-lg btn-block" value="Envoyer">BILAN DE VENTES</button></a>



            </div>
            <?php
        } else {
            header("Location:../index.php");
            exit();
        }
        ?>
    </body>
</html>

