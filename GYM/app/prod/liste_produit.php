<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
    <head>
        <meta charset="UTF-8">
            <title></title>
            <script src="../../js/jquery-1.10.2.js" type="text/javascript"></script>
            <script src="../../bootstrap/js/bootstrap.js" type="text/javascript"></script>
            <link href="../../bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
            <link href="../../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>

    </head>
    <body bgcolor='dda2a2'>
        <?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
        session_start();

// On récupère nos variables de session
        if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
//            echo 'Votre login est ' . $_SESSION['login'] . ' et votre mot de passe est ' . $_SESSION['password'] . '.';
            ?>

            <div class="row col-md-2 col-md-offset-5" style="clear: both; margin-bottom: 50px;margin-top: 20px;">
                <a href="../home_prod.php">
                    <button type="submit" class="btn btn-danger  btn-lg btn-block" value="Envoyer">
                        <img src=../../img/home.png width="100">
                    </button>
                </a> 
            </div>
            <div class="row col-md-8 col-md-offset-2">
                <h1 align='center' class="smalltitle">Liste des produits </h1>
            </div>

            <div class="row col-md-8 col-md-offset-2">
                <table align='center' class="db-table table table-hover ">

                    <?php
                    $connexion = mysql_connect("localhost", "root", "");
                    mysql_selectdb("bechir_app", $connexion);


                    print"<tr><td><strong>Code produit</strong></td><td><strong>Libelle</strong></td><td><strong>Prix d'achat</strong></td>
			<td><strong>Prix de vente</strong></td><td><strong>Stock</strong></td><td align='center'><strong>Action</strong></td>";

                    $result = mysql_query(' SELECT * FROM produit ');

                    while ($teste = mysql_fetch_array($result)) {
                        $id = $teste['idprod'];

                        echo "<tr bgcolor='#e4dada'>";
                        echo"<td><font color='black'>" . $teste['idprod'] . "</font></td>";
                        echo"<td><font color='black'>" . $teste['libelle_prod'] . "</font></td>";
                        echo"<td><font color='black'>" . $teste['prix_achat'] . "</font></td>";
                        echo"<td><font color='black'>" . $teste['prix_vente'] . "</font></td>";
                        echo"<td><font color='black'>" . $teste['stock'] . "</font></td>";
                        echo"<td align='center'><a href ='del.php?idprod=$id'>";
                        echo'<button type="button" class="btn btn-danger">Supprimer</button></a>';
                        echo"<a style='padding-left:10px;' href ='modifier_produit.php?idprod=$id'>";
                        echo '<button type="button" class="btn btn-success">Modifier</button></a></td>';
                        echo "</tr>";
                    }
                    mysql_close($connexion);
                    ?>

                </table>
            </div>
            <?php
        } else {
            header("Location:../../index.php");
            exit();
        }
        ?>
    </body>
</html>