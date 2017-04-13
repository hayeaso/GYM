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
// On commence par récupérer les champs 
            $id = $_GET['id'];
            if (isset($_POST['nom']))
                $nom = $_POST['nom'];
            else
                $nom = "";

            if (isset($_POST['prenom']))
                $prenom = $_POST['prenom'];
            else
                $prenom = "";

            if (isset($_POST['adresse']))
                $adresse = $_POST['adresse'];
            else
                $adresse = "";

            if (isset($_POST['phone']))
                $phone = $_POST['phone'];
            else
                $phone = "";

            if (isset($_POST['date']))
                $date = $_POST['date'];
            else
                $date = "";
            if (isset($_POST['dateexp']))
                $dateexp = $_POST['dateexp'];
            else
                $dateexp = "";
            $service = $_POST['categorie'];

            $date1 = DateTime::createFromFormat('d/m/Y', $date);
            $date2 = DateTime::createFromFormat('d/m/Y', $dateexp);
            $DateI = $date1->format('Y-m-d');
            $DateE = $date2->format('Y-m-d');

            if (empty($nom) OR empty($prenom) OR empty($adresse) OR empty($phone) OR empty($date)) {
                echo '<font color="red">Attention,aucun champs ne peut rester vide !</font>';
            }

// Aucun champ n'est vide, on peut enregistrer dans la table 
            else {
                // connexion à la base
                $db = mysql_connect('localhost', 'root', '') or die('Erreur de connexion ' . mysql_error());
// sélection de la base  

                mysql_select_db('gym', $db) or die('Erreur de selection ' . mysql_error());

                // on écrit la requête sql 
                $sql = "UPDATE `gym`.`client` SET nom ='$nom', prenom ='$prenom',"
                        . " phone ='$phone', adresse ='$adresse', date_inscription ='$DateI',date_expiration ='$DateE', service='$service'"
                        . "  WHERE idclient='" . $id . "'";
                // `nom`='hayu', `prenom`='test', `phone`='26239878', `adresse`='zrc 419 kar', `service`='aerobica' WHERE `idclient`='3';
//             on insère les informations du formulaire dans la table 
                mysql_query($sql) or die('Erreur SQL !' . $sql . '<br>' . mysql_error());
                mysql_close();
                // on ferme la connexion 
//             on affiche le résultat pour le visiteur 
                echo 'La modification a été faite avec sucées.<br/> <a href="afficher.php?sorting=DESC&field=idclient"> <button type="button" class="btn btn-success">Retour</button></a>';
                ?>

                <!--afficher.php?sorting=DESC&field=idclient-->









                <?php
            }
            ?>  
            <?php
        } else {
            header("Location:../index.php");
            exit();
        }
        ?>
    </body>
</html>