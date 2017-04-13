<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script src="../../js/jquery-1.10.2.js" type="text/javascript"></script>
        <script src="../../bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <link href="../../bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>

<!--        <script>
            function impord() {

                window.print();
            }
        </script>-->

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
            mysql_selectdb("bechir_app", $connexion);
            $id = intval($_GET['idprod']);
            $details = "SELECT id_facture, lib_produit, prix_unitaire, quantite, prix FROM details_facure WHERE id_facture='" . $id . "'";
            $result = mysql_query($details) or die('Voici votre eurreur : <br>' . mysql_error());
            print"<tr>"
                    . "<td><strong>Facture numero</strong></td>"
                    . "<td><strong>Libellé¨Produit</strong></td>"
                    . "<td><strong>Prix Unitaire</strong></td>"
                    . "<td><strong>Quantité</strong></td>"
                    . "<td><strong>Prix</strong></td>"
                    . "</tr>";

            while ($teste = mysql_fetch_array($result)) {
                $id = $teste['id_facture'];

                echo "<tr bgcolor='#e4dada'>";
                echo"<td><font color='black'>" . $teste['id_facture'] . "</font></td>";
                echo"<td><font color='black'>" . $teste['lib_produit'] . "</font></td>";
                echo"<td><font color='black'>" . $teste['prix_unitaire'] . "</font></td>";
                echo"<td><font color='black'>" . $teste['quantite'] . "</font></td>";
                echo"<td><font color='black'>" . $teste['prix'] . "</font></td>";
                echo "</tr>";
            }
            ?>
            <?php
        } else {
            header("Location:../../index.php");
            exit();
        }
        ?>
    </body>