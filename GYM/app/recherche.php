<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="../js/jquery-1.10.2.js" type="text/javascript"></script>
        <script src="../bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>

        <script src="../js/jquery-1.10.2.js" type="text/javascript"></script>
        <script src="../js/jquery-ui.js" type="text/javascript"></script>
        <link href="../css/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="../css/jquery-ui-themes-smoothness.css" rel="stylesheet" type="text/css"/>
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
            $d1 = $_GET['date1'];
            $d2 = $_GET['date2'];
            $date1 = DateTime::createFromFormat('d/m/Y', $d1);
            $date2 = DateTime::createFromFormat('d/m/Y', $d2);
            $DateE1 = $date1->format('Y-m-d');
            $DateE2 = $date2->format('Y-m-d');
            mysql_connect('localhost', 'root', '') or die(mysql_error());
            mysql_select_db('gym') or die(mysql_error());
            $field = 'idclient';
            $sort = 'ASC';
            if (isset($_GET['sorting'])) {
                if ($_GET['sorting'] == 'ASC') {
                    $sort = 'DESC';
                } else {
                    $sort = 'ASC';
                }
            }
            $sql = "SELECT idclient,nom,prenom,phone,adresse,date_inscription,date_expiration,service FROM gym.client "
                    . "where date_expiration BETWEEN '" . $DateE1 . "' AND '" . $DateE2 . "' "
                    . "ORDER BY $field $sort";
            $result = mysql_query($sql) or die(mysql_error());
            while ($row = mysql_fetch_array($result)) {
                $id = $row['idclient'];
                $date1 = DateTime::createFromFormat('Y-m-d', $row['date_inscription']);
                $date2 = DateTime::createFromFormat('Y-m-d', $row['date_expiration']);
                $DateI = $date1->format('d/m/Y');
                $DateE = $date2->format('d/m/Y');
                echo'<tr>'
                . '<td>' . $row['idclient'] . '</td>'
                . '<td>' . $row['nom'] . '</td>'
                . '<td>' . $row['prenom'] . '</td>'
                . '<td>' . $row['phone'] . '</td>'
                . '<td>' . $row['adresse'] . '</td>'
                . '<td>' . $DateI . '</td>'
                . '<td>' . $DateE . '</td>'
                . '<td>' . $row['service'] . '</td>'
                . '<td><a href="delete.php?id=' . $id . '"> <button type="button" class="btn btn-danger">Supprimer</button></a>'
                . '<a href="update.php?id=' . $id . '"> <button type="button" class="btn btn-info">Modifier</button></a></td></tr>';
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
