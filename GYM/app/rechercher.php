<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="../js/jquery-1.10.2.js" type="text/javascript"></script>
        <script src="../bootstrap/js/bootstrap.js" type="text/javascript"></script>
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
            <div class="row col-md-2 col-md-offset-5" style="clear: both; margin-bottom: 50px;margin-top: 20px;">
                <a href="../home.php">
                    <button type="submit" class="btn btn-danger  btn-lg btn-block" value="Envoyer">
                        <img src=../img/home.png width="100">
                    </button>
                </a> 
            </div>
            <div class="row" style="margin-top: 15px;">
                <div class="col-md-5 col-md-offset-1">

                    <form enctype="multipart/form-data" action="#" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nom"   id="nom" placeholder="Entrer le code du client"/>
                        </div>
                        <button type="submit" class="btn btn-primary  btn-lg btn-block" value="Envoyer">Visualiser</button>
                    </form>
                </div>
                <div class="col-md-5" >

                    <form enctype="multipart/form-data" action="#" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone"   id="phone" placeholder="Entrer le Telephone du client"/>
                        </div>
                        <button type="submit" class="btn btn-primary  btn-lg btn-block" value="Envoyer">Visualiser</button>
                    </form>
                </div>
            </div>
            <?php
            if (isset($_POST['nom'])) {
                $nom = $_POST['nom'];
                mysql_connect('localhost', 'root', '') or die(mysql_error());
                mysql_select_db('gym') or die(mysql_error());

                $sql = "SELECT idclient,nom,prenom,phone,adresse,date_inscription,date_expiration,service FROM gym.client WHERE idclient=" . $nom . "";
                $result = mysql_query($sql) or die(mysql_error());
                $row = mysql_fetch_row($result);


                $dateI = DateTime::createFromFormat('Y-m-d', $row[5]);
                $dateE = DateTime::createFromFormat('Y-m-d', $row[6]);

                echo' <div class="row col-md-10 col-md-offset-1" style="font-size: 20px"> '
                . '<div class="row col-md-6">'
                . 'Identifiant  :<b> ' . $row[0] . '</b><br>'
                . ' Nom  :<b>' . $row[1] . '</b><br>'
                . 'Prenom  :<b>' . $row[2] . '</b><br>'
                . 'Telephone  :<b>' . $row[3] . '</b><br>'
                . 'Adresse  :<b>' . $row[4] . '</b><br>'
                . 'Date Inscription  :<b>' . $dateI->format('d/m/Y') . '</b><br>'
                . 'Date Expiration  :<b>' . $dateE->format('d/m/Y') . '</b><br>'
                . 'Services  :<b>' . $row[7] . '</b><br>'
                . '</div>'
                . '<div class="row col-md-6">'
                . '<img src=../upload/client_' . $row[0] . ' alt="Smiley face" height="400" width="400">'
                . '</div>'
                . '</div>';
            } else {
                $nom = "";
            }
            if (isset($_POST['phone'])) {
                $phone = $_POST['phone'];
                mysql_connect('localhost', 'root', '') or die(mysql_error());
                mysql_select_db('gym') or die(mysql_error());

                $sql = "SELECT idclient,nom,prenom,phone,adresse,date_inscription,date_expiration,service FROM gym.client WHERE phone=" . $phone . "";
                $result = mysql_query($sql) or die(mysql_error());
                $row = mysql_fetch_row($result);


                $dateI = DateTime::createFromFormat('Y-m-d', $row[5]);
                $dateE = DateTime::createFromFormat('Y-m-d', $row[6]);

                echo' <div class="row col-md-10 col-md-offset-1" style="font-size: 20px"> '
                . '<div class="row col-md-6">'
                . 'Identifiant  :<b> ' . $row[0] . '</b><br>'
                . ' Nom  :<b>' . $row[1] . '</b><br>'
                . 'Prenom  :<b>' . $row[2] . '</b><br>'
                . 'Telephone  :<b>' . $row[3] . '</b><br>'
                . 'Adresse  :<b>' . $row[4] . '</b><br>'
                . 'Date Inscription  :<b>' . $dateI->format('d/m/Y') . '</b><br>'
                . 'Date Expiration  :<b>' . $dateE->format('d/m/Y') . '</b><br>'
                . 'Services  :<b>' . $row[7] . '</b><br>'
                . '</div>'
                . '<div class="row col-md-6">'
                . '<img src=../upload/client_' . $row[0] . ' alt="Smiley face" height="400" width="400">'
                . '</div>'
                . '</div>';
            } else {
                $nom = "";
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