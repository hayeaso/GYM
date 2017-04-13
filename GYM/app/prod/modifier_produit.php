<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script src="../../js/jquery-1.10.2.js" type="text/javascript"></script>
        <script src="../../bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <link href="../../bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript">
            function ajouterproduit() {


                var libellep = document.getElementById("libelle_prod").value;
                var prixa = document.getElementById("prix_achat").value;
                var prixv = document.getElementById("prix_vente").value;
                var quantite = document.getElementById("stock").value;

                if ((libellep == "") || (prixa == "") || (prixv == "") || (stock == "")) {

                    alert("il faut remplir tous les champs");
                }

                else
                    document.getElementById("formulaire").submit();
            }
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
            <?php
            $id = $_GET['idprod'];
            $connexion = mysql_connect("localhost", "root", "");
            mysql_selectdb("bechir_app", $connexion);

            $affichage = "SELECT * FROM produit WHERE idprod='" . $id . "'";

            $result = mysql_query($affichage) or die('Voici votre eurreur : <br>' . mysql_error());

            $row = mysql_fetch_row($result);
            $id = $row[0];
            $lib = $row[1];
            $pa = $row[2];
            $pv = $row[3];
            $stock = $row[4];
            ?>
            <div class="row col-md-2 col-md-offset-5" style="clear: both; margin-bottom: 50px;margin-top: 20px;">
                <a href="../home_prod.php">
                    <button type="submit" class="btn btn-danger  btn-lg btn-block" value="Envoyer">
                        <img src=../../img/home.png width="50">
                    </button>
                </a>
                <br>
                <a href="liste_produit.php">
                    <button type="submit" class="btn btn-danger  btn-lg btn-block" value="Envoyer">
                        <img src=../../img/back.png width="50">
                    </button>
                </a> 
            </div>
            <div class="row col-md-8 col-md-offset-2">
                <form      name='formulaire' id='formulaire' action='update_result.php?id=<?php echo $id ?>' method='POST'  >
                    <div class="form-group">
                        <label for="example">Libelle</label>
                        <input type="text" class="form-control" name="libelle_prod"  <?php echo 'value= "' . $lib . '"'; ?> id="libelle_prod" placeholder="Entrer le Libellé"/>
                    </div>
                    <div class="form-group">
                        <label for="example">Prix d'achat</label>
                        <input type="text" class="form-control" name="prix_achat"  <?php echo 'value= "' . $pa . '"'; ?> id="prix_achat" placeholder="Prix d'achat"/>
                    </div>
                    <div class="form-group">
                        <label for="example">Prix de vente</label>
                        <input type="text" class="form-control" name="prix_vente" <?php echo 'value= "' . $pv . '"'; ?>  id="prix_vente" placeholder="Prix de vente"/>
                    </div>
                    <div class="form-group">
                        <label for="example">stock</label>
                        <input type="text" class="form-control" name="stock"  <?php echo 'value= "' . $stock . '"'; ?> id="stock" placeholder="Prix de vente"/>
                    </div>
                    <button type="button" class="btn btn-danger  btn-lg btn-block" value="sauvgarder" onclick='ajouterproduit()'>Modifier</button> 
                </form>
            </div>
            <?php
        } else {
            header("Location:../../index.php");
            exit();
        }
        ?>
    </body>
</html>

