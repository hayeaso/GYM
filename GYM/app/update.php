<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="../js/jquery-1.10.2.js" type="text/javascript"></script>
        <script src="../js/jquery-ui.js" type="text/javascript"></script>
        <script src="../bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../css/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="../css/jquery-ui-themes-smoothness.css" rel="stylesheet" type="text/css"/>
        <script>
            $(function () {
                $(".datepicker").datepicker();
                $(".format").change(function () {
                    $(".datepicker").datepicker("option", "dateFormat", "dd/mm/yy");
                });
            });

        </script>
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
                        <img src=../img/home.png width="50">
                    </button>
                </a>
                <a href="afficher.php?sorting=DESC&field=idclient">
                    <button type="submit" class="btn btn-danger  btn-lg btn-block" value="Envoyer">
                        <img src=../img/back.png width="50">
                    </button>
                </a> 
            </div>
            <?php
            $id = $_GET['id'];
            mysql_connect('localhost', 'root', '') or die(mysql_error());
            mysql_select_db('gym') or die(mysql_error());

            $sql = "SELECT idclient,nom,prenom,phone,adresse,date_inscription,date_expiration,service FROM gym.client WHERE idclient=" . $id . "";
            $result = mysql_query($sql) or die(mysql_error());
            $row = mysql_fetch_row($result);

            $nom = $row[1];
            $prenom = $row[2];
            $phone = $row[3];
            $adresse = $row[4];
            $dateins = DateTime::createFromFormat('Y-m-d', $row[5]);
            $dateexp = DateTime::createFromFormat('Y-m-d', $row[6]);
            $dateI = $dateins->format('d/m/Y');
            $dateE = $dateexp->format('d/m/Y');
            $service = $row[7];
            ?>
            <?php ?>
            <div style="clear: both;" >
                <form enctype="multipart/form-data" action="update_result.php?id= <?php echo $id ?> " method="post">
                    <div class="form-group">
                        <label for="example">Nom</label>
                        <input type="text" class="form-control" name="nom"  <?php echo 'value="' . $nom . '"'; ?>  id="nom" placeholder="Entrer le nom"/>
                    </div>
                    <div class="form-group">
                        <label for="example">Prénom</label>
                        <input type="text" name="prenom" class="form-control"   <?php echo 'value="' . $prenom . '"'; ?> id="prenom"  placeholder="Entrer le prénom"><br/>  
                    </div>
                    <div class="form-group">
                        <label for="example">Télephone</label>
                        <input type="text" name="phone" id="phone"  <?php echo 'value="' . $phone . '"'; ?>  class="form-control" placeholder="Entrer le numero de Téléphone"><br/>  
                    </div>
                    <div class="form-group">
                        <label for="exampleInput">Adresse</label>
                        <input type="text" name="adresse" class="form-control" <?php echo 'value="' . $adresse . '"'; ?>   id="adresse"  placeholder="Entrer l'adresse"><br/>  
                    </div>
                    <div class="form-group">
                        <label for="example">Date d'inscription</label>
                        <input type="text" name="date"  id="date" <?php echo 'value="' . $dateI . '"'; ?>  class="form-control datepicker" placeholder="Entrer la date d'inscription"><br/>  
                    </div><div class="form-group">
                        <label for="example">Date d'expiration</label>
                        <input type="text" name="dateexp"  id="dateexp" <?php echo 'value="' . $dateE . '"'; ?>  class="form-control datepicker" placeholder="Entrer la date d'expiration"><br/>    
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="categorie" id="musculation" value="musculation" <?php
                            if ($service == 'musculation') {
                                echo 'checked';
                            } else {
                                echo 'false';
                            }
                            ?> >
                            Musculation
                        </label>

                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="categorie" value="aerobic" id="aerobic" <?php
                            if ($service == 'aerobic') {
                                echo 'checked';
                            } else {
                                echo 'false';
                            }
                            ?> >
                            Aerobic
                        </label>

                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="categorie" value="kick" id="kick" <?php
                            if ($service == 'kick') {
                                echo 'checked';
                            } else {
                                echo 'false';
                            }
                            ?>>
                            Kick-Boxing
                        </label>
                    </div>
                    <button type="submit" class="btn btn-danger  btn-lg btn-block" value="Envoyer">Enregistrer</button>
                    <!--<input type="submit" value="Envoyer"/>-->
                </form>
            </div>
            <?php
        } else {
            header("Location:../index.php");
            exit();
        }
        ?>
    </body>
</html>