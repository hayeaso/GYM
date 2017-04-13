<html>
    <head>
        <title>Ajouter un Produit</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
            <div class="row col-md-2 col-md-offset-5" style="clear: both; margin-bottom: 50px;margin-top: 20px;">
                <a href="../home_prod.php">
                    <button type="submit" class="btn btn-danger  btn-lg btn-block" value="Envoyer">
                        <img src=../../img/home.png width="100">
                    </button>
                </a> 
            </div>
            <div class="row col-md-8 col-md-offset-2">
                <h1 style="text-align: center;">Formulaire d'ajout d'un produit</h1>
                <form name='formulaire' id='formulaire' action='ajouterproduit.php' method='POST'  >
                    <div class="form-group">
                        <label for="example">Libellé</label>
                        <input type="text" class="form-control" name="libelle_prod"   id="libelle_prod" placeholder="Entrer le Libellé"/>
                    </div>
                    <div class="form-group">
                        <label for="example">Prix d'achat</label>
                        <input type="text" class="form-control" name="prix_achat"   id="prix_achat" placeholder="Prix d'achat"/>
                    </div>
                    <div class="form-group">
                        <label for="example">Prix de vente</label>
                        <input type="text" class="form-control" name="prix_vente"   id="prix_vente" placeholder="Prix de vente"/>
                    </div>
                    <div class="form-group">
                        <label for="example">stock</label>
                        <input type="text" class="form-control" name="stock"   id="stock" placeholder="Prix de vente"/>
                    </div>
                    <button type="button" class="btn btn-danger  btn-lg btn-block" value="Ajouter" onclick='ajouterproduit()'>Ajouter</button>
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