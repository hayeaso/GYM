<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script src="../../js/jquery-1.10.2.js" type="text/javascript"></script>
        <link href="../../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <script src="../../bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <title>formulaire de vente</title>
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
            $connexion = mysql_connect("localhost", "root", "");
            mysql_select_db("bechir_app", $connexion);

            $medicamentv1 = $_POST["medicament1"];
            $medicamentv2 = $_POST["medicament2"];
            $medicamentv3 = $_POST["medicament3"];
            $medicamentv4 = $_POST["medicament4"];
            $medicamentv5 = $_POST["medicament5"];
            $medicamentv6 = $_POST["medicament6"];
            $medicamentv7 = $_POST["medicament7"];
            $medicamentv8 = $_POST["medicament8"];
            $quantitev1 = $_POST["quantite1"];
            $quantitev2 = $_POST["quantite2"];
            $quantitev3 = $_POST["quantite3"];
            $quantitev4 = $_POST["quantite4"];
            $quantitev5 = $_POST["quantite5"];
            $quantitev6 = $_POST["quantite6"];
            $quantitev7 = $_POST["quantite7"];
            $quantitev8 = $_POST["quantite8"];

            $date_facture = date('Y-m-d');
            $insert = "INSERT INTO facture(date_facture) VALUES ('$date_facture')";
            mysql_query($insert) or die('Voici votre eurreur : <br>' . mysql_error());
            $select = "SELECT MAX(id_facture) AS id_facture FROM facture";
            $resul = mysql_query($select) or die('Voici votre eurreur : <br>' . mysql_error());
            $max = mysql_fetch_row($resul);
            $id_facture = $max[0];


            if ($medicamentv1 != "") {
                $select = "SELECT idprod,libelle_prod,stock ,prix_vente  FROM produit WHERE idprod='" . $medicamentv1 . "'";

                $resultat = mysql_query($select) or die('Voici votre eurreur : <br>' . mysql_error());
                $row = mysql_fetch_row($resultat);
                $prix = $quantitev1 * $row[3];



                $ins = "INSERT INTO details_facure(id_facture,prix_unitaire,quantite, prix ,lib_produit)
                                                    VALUES('" . $id_facture . "','" . $row[3] . "','" . $quantitev1 . "','" . $prix . "','" . $row[1] . "');";
                $res = mysql_query($ins);

                $upd = "UPDATE produit SET stock=stock-$quantitev1 WHERE idprod='" . $medicamentv1 . "'";

                $updres1 = mysql_query($upd) or die('Voici votre eurreur : <br>' . mysql_error());
            }
            if ($medicamentv2 != "") {
                $select = "SELECT idprod,libelle_prod,stock ,prix_vente  FROM produit WHERE idprod='" . $medicamentv2 . "'";
                $resultat = mysql_query($select) or die('Voici votre eurreur : <br>' . mysql_error());
                $row = mysql_fetch_row($resultat);
                $prix = $quantitev2 * $row[3];


                $ins = "INSERT INTO details_facure(id_facture,prix_unitaire,quantite, prix ,lib_produit)
                                                    VALUES('" . $id_facture . "','" . $row[3] . "','" . $quantitev2 . "','" . $prix . "','" . $row[1] . "');";
                $res = mysql_query($ins);

                $upd = "UPDATE produit SET stock=stock-$quantitev2 WHERE idprod='" . $medicamentv2 . "'";

                $updres2 = mysql_query($upd) or die('Voici votre eurreur : <br>' . mysql_error());
            }
            if ($medicamentv3 != "") {
                $select = "SELECT idprod,libelle_prod,stock ,prix_vente  FROM produit WHERE idprod='" . $medicamentv3 . "'";

                $resultat = mysql_query($select) or die('Voici votre eurreur : <br>' . mysql_error());
                $row = mysql_fetch_row($resultat);

                $prix = $quantitev3 * $row[3];


                $ins = "INSERT INTO details_facure(id_facture,prix_unitaire,quantite, prix ,lib_produit)
                                                    VALUES('" . $id_facture . "','" . $row[3] . "','" . $quantitev3 . "','" . $prix . "','" . $row[1] . "');";
                $res = mysql_query($ins);

                $upd = "UPDATE produit SET stock=stock-$quantitev3 WHERE idprod='" . $medicamentv3 . "'";

                $updres3 = mysql_query($upd) or die('Voici votre eurreur : <br>' . mysql_error());
            }
            if ($medicamentv4 != "") {
                $select = "SELECT idprod,libelle_prod,stock ,prix_vente  FROM produit WHERE idprod='" . $medicamentv4 . "'";

                $resultat = mysql_query($select) or die('Voici votre eurreur : <br>' . mysql_error());
                $row = mysql_fetch_row($resultat);

                $prix = $quantitev4 * $row[3];


                $ins = "INSERT INTO details_facure(id_facture,prix_unitaire,quantite, prix ,lib_produit)
                                                    VALUES('" . $id_facture . "','" . $row[3] . "','" . $quantitev4 . "','" . $prix . "','" . $row[1] . "');";
                $res = mysql_query($ins);

                $upd = "UPDATE produit SET stock=stock-$quantitev4 WHERE idprod='" . $medicamentv4 . "'";

                $updres1 = mysql_query($upd) or die('Voici votre eurreur : <br>' . mysql_error());
            }
            if ($medicamentv5 != "") {
                $select = "SELECT idprod,libelle_prod,stock ,prix_vente  FROM produit WHERE idprod='" . $medicamentv5 . "'";

                $resultat = mysql_query($select) or die('Voici votre eurreur : <br>' . mysql_error());
                $row = mysql_fetch_row($resultat);

                $prix = $quantitev5 * $row[3];


                $ins = "INSERT INTO details_facure(id_facture,prix_unitaire,quantite, prix ,lib_produit)
                                                    VALUES('" . $id_facture . "','" . $row[3] . "','" . $quantitev5 . "','" . $prix . "','" . $row[1] . "');";
                $res = mysql_query($ins);

                $upd = "UPDATE produit SET stock=stock-$quantitev1 WHERE idprod='" . $medicamentv5 . "'";

                $updres5 = mysql_query($upd) or die('Voici votre eurreur : <br>' . mysql_error());
            }
            if ($medicamentv6 != "") {
                $select = "SELECT idprod,libelle_prod,stock ,prix_vente  FROM produit WHERE idprod='" . $medicamentv6 . "'";

                $resultat = mysql_query($select) or die('Voici votre eurreur : <br>' . mysql_error());
                $row = mysql_fetch_row($resultat);

                $prix = $quantitev6 * $row[3];


                $ins = "INSERT INTO details_facure(id_facture,prix_unitaire,quantite, prix ,lib_produit)
                                                    VALUES('" . $id_facture . "','" . $row[3] . "','" . $quantitev6 . "','" . $prix . "','" . $row[1] . "');";
                $res = mysql_query($ins);

                $upd = "UPDATE produit SET stock=stock-$quantitev1 WHERE idprod='" . $medicamentv6 . "'";

                $updres6 = mysql_query($upd) or die('Voici votre eurreur : <br>' . mysql_error());
            }
            if ($medicamentv7 != "") {
                $select = "SELECT idprod,libelle_prod,stock ,prix_vente  FROM produit WHERE idprod='" . $medicamentv7 . "'";

                $resultat = mysql_query($select) or die('Voici votre eurreur : <br>' . mysql_error());
                $row = mysql_fetch_row($resultat);

                $prix = $quantitev7 * $row[3];


                $ins = "INSERT INTO details_facure(id_facture,prix_unitaire,quantite, prix ,lib_produit)
                                                    VALUES('" . $id_facture . "','" . $row[3] . "','" . $quantitev7 . "','" . $prix . "','" . $row[1] . "');";
                $res = mysql_query($ins);

                $upd = "UPDATE produit SET stock=stock-$quantitev7 WHERE idprod='" . $medicamentv7 . "'";

                $updres7 = mysql_query($upd) or die('Voici votre eurreur : <br>' . mysql_error());
            }
            if ($medicamentv8 != "") {
                $select = "SELECT idprod,libelle_prod,stock ,prix_vente  FROM produit WHERE idprod='" . $medicamentv8 . "'";

                $resultat = mysql_query($select) or die('Voici votre eurreur : <br>' . mysql_error());
                $row = mysql_fetch_row($resultat);

                $prix = $quantitev8 * $row[3];


                $ins = "INSERT INTO details_facure(id_facture,prix_unitaire,quantite, prix ,lib_produit)
                                                    VALUES('" . $id_facture . "','" . $row[3] . "','" . $quantitev8 . "','" . $prix . "','" . $row[1] . "');";
                $res = mysql_query($ins);

                $upd = "UPDATE produit SET stock=stock-$quantitev8 WHERE idprod='" . $medicamentv8 . "'";

                $updres8 = mysql_query($upd) or die('Voici votre eurreur : <br>' . mysql_error());
            }
            $select = "select sum(prix) as total from details_facure where id_facture='" . $id_facture . "'";
            $resul = mysql_query($select) or die('Voici votre eurreur : <br>' . mysql_error());
            $max = mysql_fetch_row($resul);
            $sum = $max[0];
            $upd2 = "UPDATE facture SET total_facture='" . $sum . "' WHERE id_facture='" . $id_facture . "'";
            $updres1 = mysql_query($upd2) or die('Voici votre eurreur : <br>' . mysql_error());
            ?>

            <div class="row col-md-8 col-md-offset-2" style="clear: both; margin-bottom: 50px;margin-top: 20px;"> 
                <!--<input type='submit' id='imprimer' value='Imprimer la Facture' onclick="imprimer( <?php echo"'" . $id_facture . "'"; ?>)">--> 
                <button type="submit" id='imprimer' onclick="imprimer(<?php echo"'" . $id_facture . "'"; ?>)" class="btn btn-success  btn-lg btn-block">Imprimer la Facture</button>
                <br><br>
                <a href="vendre1.php"> <button type="button" class="btn btn-success btn-lg btn-block">Retour</button></a>
            </div>
            <script>
                function imprimer(idog) {

                    window.open('ordonnance.php?idfacture=' + idog);
                }
            </script>
            <?php
        } else {
            header("Location:../../index.php");
            exit();
        }
        ?>
    </body>

</html>