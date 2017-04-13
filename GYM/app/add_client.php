<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>formulaire d'ajout d'un Client</title>
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
                        <img src=../img/home.png width="100">
                    </button>
                </a> 
            </div>
            <div style="clear: both; margin-bottom: 100px;" class="row col-md-10 col-md-offset-1" >
                <h1 style="text-align: center;">Formulaire d'ajout d'un client</h1>
                <form enctype="multipart/form-data" id="formulaire" action="add_client_result.php" method="post">
                    <div class="form-group">
                        <label for="example">Nom</label>
                        <input type="text" class="form-control" name="nom"   id="nom" placeholder="Entrer le nom"/>
                    </div>
                    <div class="form-group">
                        <label for="example">Prénom</label>
                        <input type="text" name="prenom" class="form-control"   id="prenom"  placeholder="Entrer le prénom"><br/>  
                    </div>
                    <div class="form-group">
                        <label for="example">Choisir une Photo</label>
                        <input type="file" name="userfile" id="exampleInputFile">
                        <p class="help-block">Veuillez choisir une photo d'identité S.V.P</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInput">Adresse</label>
                        <input type="text" name="adresse" class="form-control"   id="adresse"  placeholder="Entrer l'adresse"><br/>  
                    </div>
                    <div class="form-group">
                        <label for="example">Télephone</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Entrer le numero de Téléphone"><br/>  
                    </div>
                    <div class="form-group">
                        <label for="example">Date d'inscription</label>
                        <input type="text" name="date"  id="date" class="form-control datepicker format" placeholder="Entrer la date d'inscription"><br/>  
                    </div>
                    <div class="form-group">
                        <label for="example">Date d'expiration</label>
                        <input type="text" name="dateexp"  id="dateexp" class="form-control datepicker format" placeholder="Entrer la date d'expiration"><br/>    
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="categorie" id="musculation" value="musculation">
                            Musculation
                        </label>

                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="categorie" value="aerobic" id="aerobic">
                            Aerobic
                        </label>

                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="categorie" value="kick" id="kick">
                            Kick-Boxing
                        </label>
                    </div>
                    <button type="submit" class="btn btn-danger  btn-lg btn-block" value="Envoyer" onclick="ajoutermedi()">Enregistrer</button>
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



