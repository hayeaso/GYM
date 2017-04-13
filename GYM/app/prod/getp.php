<!DOCTYPE html>
<html>
    <head>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }

            table, td, th {
                border: 1px solid black;
                padding: 5px;
            }

            th {text-align: left;}
        </style>
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
            $q = intval($_GET['q']);

            $connexion = mysql_connect("localhost", "root", "");
            mysql_select_db("bechir_app", $connexion);
            $sql = "SELECT * FROM produit WHERE idprod = '" . $q . "'";
            $result = mysql_query($sql) or die(mysql_error());

            echo "  <tr bgcolor='#b24040'>
                    <th>Libellé</th>
                    <th>prix de vente</th>
                    <th>stock</th>
                </tr>";
            while ($row = mysql_fetch_row($result)) {
                echo "<tr bgcolor='#e4dada'>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td>" . $row[3] . "</td>";
                echo "<td>" . $row[4] . "</td>";
                echo "</tr>";
            }

            mysql_close($connexion);
            ?>
            <?php
        } else {
            header("Location:../../index.php");
            exit();
        }
        ?>
    </body>
</html>