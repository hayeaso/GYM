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
        <script>
            $(function () {
                $(".datepicker").datepicker();
                $(".format").change(function () {
                    $(".datepicker").datepicker("option", "dateFormat", "dd/mm/yy");
                });
            });

            function update() {

                var tableHeaderRowCount = 1;
                var table = document.getElementById("ma_table");
                var rowCount = table.rows.length;
                for (var i = tableHeaderRowCount; i < rowCount; i++) {
                    table.deleteRow(tableHeaderRowCount);
                }
                table.innerHTML = "";
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        table.innerHTML = xmlhttp.responseText;
                    }
                }
                var date1 = document.getElementById("date1").value;
                var date2 = document.getElementById("date2").value;
                xmlhttp.open("GET", "recherche.php?date1=" + date1 + "&date2=" + date2, true);
                xmlhttp.send();
            }
            ;
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
                        <img src=../img/home.png width="100">
                    </button>
                </a> 
            </div>
            <div class="row col-md-8 col-md-offset-2" style="clear: both; margin-bottom: 20px;margin-top: 20px;">
                <div class="form-group row col-md-5">
                    <label for="example">Premiere Date</label>
                    <input type="text" name="dateexp"  class="form-control datepicker format" id="date1" placeholder="Entrer la date d'expiration"><br/>    
                </div>
                <div class="form-group row col-md-5 col-md-offset-2">
                    <label for="example">Deuxieme Date</label>
                    <input type="text" name="dateexp"  class="form-control datepicker format " id="date2" placeholder="Entrer la date d'expiration"><br/>    
                </div>
                <button type="submit" class="btn btn-danger  btn-lg btn-block" value="Envoyer" onclick="update()" style="clear: both;margin-bottom:20px;">
                    RECHERCHER
                </button>
                <a href="afficher.php?sorting=DESC&field=idclient" >
                    <button type="submit" class="btn btn-danger  btn-lg btn-block" value="Envoyer" onclick="update()">
                        RESET
                    </button>
                </a>
            </div>
            <?php
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
            if ($_GET['field'] == 'idclient') {
                $field = "idclient";
            } elseif ($_GET['field'] == 'nom') {
                $field = "nom";
            } elseif ($_GET['field'] == 'prenom') {
                $field = "prenom";
            } elseif ($_GET['field'] == 'phone') {
                $field = "phone";
            } elseif ($_GET['field'] == 'adresse') {
                $field = "adresse";
            } elseif ($_GET['field'] == 'date_inscription') {
                $field = "date_inscription";
            } elseif ($_GET['field'] == 'date_expiration') {
                $field = "date_expiration";
            } elseif ($_GET['field'] == 'service') {
                $field = "service";
            }
            $sql = "SELECT idclient,nom,prenom,phone,adresse,date_inscription,date_expiration,service FROM gym.client ORDER BY $field $sort";
            $result = mysql_query($sql) or die(mysql_error());
            echo'<table border="1" class="db-table table table-hover" >';
            echo'<thead><th><a href="afficher.php?sorting=' . $sort . '&field=idclient">identifiant</a></th>
                 <th><a href="afficher.php?sorting=' . $sort . '&field=nom">Nom</a></th>
                 <th><a href="afficher.php?sorting=' . $sort . '&field=prenom">Prénom</a></th>
                 <th><a href="afficher.php?sorting=' . $sort . '&field=phone">Telephone</a></th>
                 <th><a href="afficher.php?sorting=' . $sort . '&field=adresse">Adresse</a></th>
                 <th><a href="afficher.php?sorting=' . $sort . '&field=date_inscription">Date Inscription</a></th>    
                 <th><a href="afficher.php?sorting=' . $sort . '&field=date_expiration">Date Expiration</a></th>    
                 <th><a href="afficher.php?sorting=' . $sort . '&field=service">Service</a></th> <th><a>Action</a></th></thead><tbody id="ma_table">';
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
            echo'</tbody></table>';
            ?>
            <?php
        } else {
            header("Location:../index.php");
            exit();
        }
        ?>
    </body>
</html>


