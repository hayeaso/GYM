<html>
    <head>
        <meta charset="UTF-8">
        <title></title
        <link href="../css/PrintArea.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery-1.8.2.min.js" type="text/javascript"></script>
        <script src="../js/jquery-1.10.2.js" type="text/javascript"></script>
        <script src="../js/jquery-ui-1.10.4.custom.js" type="text/javascript"></script>
        <script src="../js/jquery.PrintArea.js" type="text/javascript"></script>
        <link href="../css/PrintArea.css" rel="stylesheet" type="text/css"/>
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <script src="../bootstrap/js/bootstrap.js" type="text/javascript"></script>

    </head>
    <body>
        <?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
        session_start();

// On récupère nos variables de session
        if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
//            echo 'Votre login est ' . $_SESSION['login'] . ' et votre mot de passe est ' . $_SESSION['password'] . '.';
            ?>
            <?php
            $id = $_GET['id'];
            $dbc = mysqli_connect('localhost', 'root', '', '') or die('Connection error!');
            $query = "DELETE FROM gym.client WHERE idclient = '" . $id . "'";
            mysqli_query($dbc, $query) or die('Database error!');
            echo 'La Suppression a été faite avec sucées.<br/> <a href="afficher.php?sorting=DESC&field=idclient"> <button type="button" class="btn btn-success">Retour</button></a>';
            ?>

            <?php
        } else {
            header("Location:../index.php");
            exit();
        }
        ?>
    </body>