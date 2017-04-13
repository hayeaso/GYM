<html>
    <head>

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
        <div align="center" style="margin-top:0px" class="whitetitle"><img src='../../img/california.png' alt="" width= "400" height="150" /></div>

            <?php
            $connexion = mysql_connect("localhost", "root", "");
            mysql_select_db("bechir_app", $connexion);

            $idfac = $_GET["idfacture"];
//    var_dump($idfac);


            print" <Strong><center><h1>La facture </h1> </center></strong>";
            print"<br \>";
            print"<br \>";
            print" <Strong><center>Facture numero :" . $idfac . " </center></strong>";

            print"<br \>";

            print"<br \>";
            print"<table bgcolor='violet' width='1200'><tr> <td><strong>Nom Du client :</strong></td> "
                    . " <td><strong>Telephone :</strong></td> ";

            print"<table  bgcolor='violet' width='1200'><tr> <td><strong>Libelle</strong></td> <td><strong>Quantite</strong></td> "
                    . "<td><strong>Prix unitaire</strong></td><td><strong>Prix</strong></td></tr>";
            print"<br \>";
            $sql2 = "select lib_produit,quantite ,prix_unitaire ,prix   from details_facure where id_facture='" . $idfac . "' ";
            $resultat2 = mysql_query($sql2);
            $total = 0;

            while ($objet = mysql_fetch_row($resultat2)) {

                print"<tr bgcolor='pink'>"
                        . "<td>" . $objet[0] . "</td>"
                        . "<td>" . $objet[1] . "</td>"
                        . "<td>" . $objet[2] . "</td>"
                        . "<td>" . $objet[3] . "</td></tr>";
                $total+=$objet[1] * $objet[2];
            }
            print"<br \>";
            print"<br \>";
            print"<tr><td><strong>Total de la facture  :</strong></td><td>" . $total . "</td></tr>";
            print '</table>'
            ?>

            <?php
        } else {
            header("Location:../../index.php");
            exit();
        }
        ?>
    </body>
</html>