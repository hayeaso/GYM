<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script src="../../js/jquery-1.10.2.js" type="text/javascript"></script>
        <link href="../../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <script src="../../bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <title>formulaire de vente</title>
        <script type='text/javascript'>
            function verification() {

                document.getElementById('formulaire').submit();

            }
            function showUser(str) {
                if (str == "") {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                } else {
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                        }
                    }
                    xmlhttp.open("GET", "getp.php?q=" + str, true);
                    xmlhttp.send();
                }
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

            <form name='formulaire' id='formulaire' action='vendre.php' method='POST'>
                <div class="row col-md-4 col-md-offset-4" >
                    <table border="4" class="table table-condensed" >       
                        <tr>
                            <td style="width: 200px;">
                                <select name='medicament1' id='medicament1' onchange="showUser(this.value)"style="height: 40px;">
                                    <option value="">Selectionner un produit:</option>
                                    <?php
                                    $connexion = mysql_connect("localhost", "root", "");
                                    mysql_select_db("bechir_app", $connexion);
                                    $SQL = "select idprod, libelle_prod from produit";
                                    $resultat = mysql_query($SQL);
                                    while ($medic = mysql_fetch_row($resultat)) {
                                        echo"<option value='" . $medic[0] . "' >" . $medic[1] . "</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                            <td style="width: 200px;"> 
                                <strong> Quantite </strong>
                                <input type='text' id='quantite1' name='quantite1' >
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px;">
                                <select name='medicament2' id='medicament2' onchange="showUser(this.value)"style="height: 40px;">
                                    <option value="">Selectionner un produit:</option>
                                    <?php
                                    $connexion = mysql_connect("localhost", "root", "");
                                    mysql_select_db("bechir_app", $connexion);
                                    $SQL = "select idprod, libelle_prod from produit";
                                    $resultat = mysql_query($SQL);
                                    while ($medic = mysql_fetch_row($resultat)) {
                                        echo"<option value='" . $medic[0] . "' >" . $medic[1] . "</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                            <td style="width: 200px;"> 
                                <strong> Quantite </strong>
                                <input type='text' id='quantite2' name='quantite2' >
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px;">
                                <select name='medicament3' id='medicament3' onchange="showUser(this.value)"style="height: 40px;">
                                    <option value="">Selectionner un produit:</option>
                                    <?php
                                    $connexion = mysql_connect("localhost", "root", "");
                                    mysql_select_db("bechir_app", $connexion);
                                    $SQL = "select idprod, libelle_prod from produit";
                                    $resultat = mysql_query($SQL);
                                    while ($medic = mysql_fetch_row($resultat)) {
                                        echo"<option value='" . $medic[0] . "' >" . $medic[1] . "</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                            <td style="width: 200px;"> 
                                <strong> Quantite </strong>
                                <input type='text' id='quantite3' name='quantite3' >
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px;">
                                <select name='medicament4' id='medicament4' onchange="showUser(this.value)"style="height: 40px;">
                                    <option value="">Selectionner un produit:</option>
                                    <?php
                                    $connexion = mysql_connect("localhost", "root", "");
                                    mysql_select_db("bechir_app", $connexion);
                                    $SQL = "select idprod, libelle_prod from produit";
                                    $resultat = mysql_query($SQL);
                                    while ($medic = mysql_fetch_row($resultat)) {
                                        echo"<option value='" . $medic[0] . "' >" . $medic[1] . "</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                            <td style="width: 200px;"> 
                                <strong> Quantite </strong>
                                <input type='text' id='quantite4' name='quantite4' >
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px;">
                                <select name='medicament5' id='medicament5' onchange="showUser(this.value)"style="height: 40px;">
                                    <option value="">Selectionner un produit:</option>
                                    <?php
                                    $connexion = mysql_connect("localhost", "root", "");
                                    mysql_select_db("bechir_app", $connexion);
                                    $SQL = "select idprod, libelle_prod from produit";
                                    $resultat = mysql_query($SQL);
                                    while ($medic = mysql_fetch_row($resultat)) {
                                        echo"<option value='" . $medic[0] . "' >" . $medic[1] . "</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                            <td style="width: 200px;"> 
                                <strong> Quantite </strong>
                                <input type='text' id='quantite5' name='quantite5' >
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px;">
                                <select name='medicament6' id='medicament6' onchange="showUser(this.value)"style="height: 40px;">
                                    <option value="">Selectionner un produit:</option>
                                    <?php
                                    $connexion = mysql_connect("localhost", "root", "");
                                    mysql_select_db("bechir_app", $connexion);
                                    $SQL = "select idprod, libelle_prod from produit";
                                    $resultat = mysql_query($SQL);
                                    while ($medic = mysql_fetch_row($resultat)) {
                                        echo"<option value='" . $medic[0] . "' >" . $medic[1] . "</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                            <td style="width: 200px;"> 
                                <strong> Quantite </strong>
                                <input type='text' id='quantite6' name='quantite6' >
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px;">
                                <select name='medicament7' id='medicament7' onchange="showUser(this.value)"style="height: 40px;">
                                    <option value="">Selectionner un produit:</option>
                                    <?php
                                    $connexion = mysql_connect("localhost", "root", "");
                                    mysql_select_db("bechir_app", $connexion);
                                    $SQL = "select idprod, libelle_prod from produit";
                                    $resultat = mysql_query($SQL);
                                    while ($medic = mysql_fetch_row($resultat)) {
                                        echo"<option value='" . $medic[0] . "' >" . $medic[1] . "</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                            <td style="width: 200px;"> 
                                <strong> Quantite </strong>
                                <input type='text' id='quantite7' name='quantite7' >
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px;">
                                <select name='medicament8' id='medicament8' onchange="showUser(this.value)"style="height: 40px;">
                                    <option value="">Selectionner un produit:</option>
                                    <?php
                                    $connexion = mysql_connect("localhost", "root", "");
                                    mysql_select_db("bechir_app", $connexion);
                                    $SQL = "select idprod, libelle_prod from produit";
                                    $resultat = mysql_query($SQL);
                                    while ($medic = mysql_fetch_row($resultat)) {
                                        echo"<option value='" . $medic[0] . "' >" . $medic[1] . "</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                            <td style="width: 200px;"> 
                                <strong> Quantite </strong>
                                <input type='text' id='quantite8' name='quantite8' >
                            </td>
                        </tr>
                        <tr> 
                            <td colspan='2' align='center'> 
                                <input type='button' value='valider'  onclick='verification()'> 
                            </td>   
                        </tr>
                    </table>
                </div>
            </form>
            <table class="table" id="txtHint">
            </table>
            <?php
        } else {
            header("Location:../../index.php");
            exit();
        }
        ?>
    </body>
</html>