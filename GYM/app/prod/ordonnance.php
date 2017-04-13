<html>
    <head>
        <script src="../../js/jquery-1.10.2.js" type="text/javascript"></script>
        <script src="../../bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <link href="../../bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script>
            function impord() {

                window.print();
            }
        </script>
    </head>
    <body  onload='impord();'>

        <?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
        session_start();

// On récupère nos variables de session
        if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
//            echo 'Votre login est ' . $_SESSION['login'] . ' et votre mot de passe est ' . $_SESSION['password'] . '.';
            ?>
            <?php
            $connexion = mysql_connect("localhost", "root", "");
            mysql_select_db("bechir_app", $connexion);
            $idfac = $_GET["idfacture"];
            ?>
            <div class="row col-md-6 col-md-offset-3" style="clear: both;">
                <div class="row col-md-4 col-md-offset-4" style="clear: both;margin-top: 20px;">
                    <center> <img src=../../img/logo.png alt="Smiley face"  ></center>

                </div>
                <?php
                print"<div style='clear: both;'>
            <h1 align='center'>Facture numero :" . $idfac . " </h1></div>";
                print"<br> <br>";
                print'<table  bgcolor="violet" width="1300" class=" table">'
                        . '<tr> <td><strong>Libelle</strong></td>
            <td><strong>Prix unitaire</strong></td>
            <td><strong>Quantite</strong></td>
            <td><strong>Prix</strong></td></tr>';
                print"<br \>";
                $sql2 = "select lib_produit,prix_unitaire ,quantite ,prix   from details_facure where id_facture='" . $idfac . "' ";
                $resultat2 = mysql_query($sql2);


                while ($objet = mysql_fetch_row($resultat2)) {

                    print"<tr bgcolor='pink'>"
                            . "<td>" . $objet[0] . "</td>"
                            . "<td>" . $objet[1] . "</td>"
                            . "<td>" . $objet[2] . "</td>"
                            . "<td>" . $objet[3] . "</td></tr>";
                }

                $sql3 = "SELECT total_facture from facture where id_facture='" . $idfac . "' ";
                $resultat3 = mysql_query($sql3);
                $objet2 = mysql_fetch_row($resultat3);
                print"<tr><td colspan='4' align='right'><strong>Prixtotal :</strong>" . $objet2[0] . "</td></tr>";
                print '</table>'
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