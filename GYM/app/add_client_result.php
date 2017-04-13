<html>
    <head>
        <meta charset="UTF-8">
        <title></title
        <link href="../css/PrintArea.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery-1.8.2.min.js" type="text/javascript"></script>
        <script src="../js/jquery-1.10.2.js" type="text/javascript"></script>
        <script src="../js/jquery-ui-1.10.4.custom.js" type="text/javascript"></script>
        <script src="../js/jquery.PrintArea.js" type="text/javascript"></script>
        <link href="../css/PrintArea.css" rel="stylesheet" type="text/css"/>

        <style>
            .printable{width: 300px;height: 200px;border-style: solid;border-radius: 10px;padding: 5px; }
        </style>

    </head>
    <body><?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
        session_start();

// On récupère nos variables de session
        if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
//            echo 'Votre login est ' . $_SESSION['login'] . ' et votre mot de passe est ' . $_SESSION['password'] . '.';
            ?>

            <?php
// On commence par récupérer les champs 
            if (isset($_POST['nom']))
                $nom = $_POST['nom'];
            else
                $nom = "";

            if (isset($_POST['prenom']))
                $prenom = $_POST['prenom'];
            else
                $prenom = "";

            if (isset($_POST['adresse']))
                $adresse = $_POST['adresse'];
            else
                $adresse = "";

            if (isset($_POST['phone']))
                $phone = $_POST['phone'];
            else
                $phone = "";

            if (isset($_POST['date']))
                $date = $_POST['date'];
            else
                $date = "";
            if (isset($_POST['dateexp']))
                $dateexp = $_POST['dateexp'];
            else
                $dateexp = "";
            $service = $_POST['categorie'];
            $date1 = DateTime::createFromFormat('d/m/Y', $date);
            $date2 = DateTime::createFromFormat('d/m/Y', $dateexp);
            $DateI = $date1->format('Y-m-d');
            $DateE = $date2->format('Y-m-d');
// On vérifie si les champs sont vides 
            if (empty($nom) OR empty($prenom) OR empty($adresse) OR empty($phone) OR empty($date)) {
                echo '<font color="red">Attention,aucun champs ne peut rester vide !</font>';
            }

// Aucun champ n'est vide, on peut enregistrer dans la table 
            else {
                // connexion à la base
                $db = mysql_connect('localhost', 'root', '') or die('Erreur de connexion ' . mysql_error());
// sélection de la base  

                mysql_select_db('gym', $db) or die('Erreur de selection ' . mysql_error());

                // on écrit la requête sql 
                $sql = "INSERT INTO `gym`.`client` (`idclient`, `nom`, `prenom`, `phone`, `adresse`, `date_inscription`,`date_expiration`, `service`) "
                        . "VALUES ('', '$nom', '$prenom', '$phone', '$adresse', '$DateI', '$DateE','$service')";

//             on insère les informations du formulaire dans la table 
                mysql_query($sql) or die('Erreur SQL !' . $sql . '<br>' . mysql_error());
                mysql_close();  // on ferme la connexion 
                //
           mysql_connect('localhost', 'root', '') or die(mysql_error());
                mysql_select_db('gym') or die(mysql_error());
                $sql = "SELECT MAX(idclient) AS  idclient FROM gym.client ";
                $result = mysql_query($sql) or die(mysql_error());
                $row = mysql_fetch_row($result);
                $highest_id = $row[0];

                mysql_close();

                $uploaddir = '../upload /';
                $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

                echo '<pre>';
                if (move_uploaded_file($_FILES['userfile']['tmp_name'], '../upload /client_' . $highest_id . '.jpg')) {
                    
                } else {
                    echo "
          Voici plus d'informations :\n";
                    print_r($_FILES);
                }

                echo '</pre>';

//             on affiche le résultat pour le visiteur 
                echo "Vos infos on été ajoutées avec sucées. Voici la carte de l'abonée";
                ?>

                <div class="PrintArea area1 all printable">

                    <?php
                    echo '<div style="float: right"><img src="../upload/client_' . $highest_id . '.jpg" alt="Smiley face" height="100" width="100"></div>';
                    ?>
                    <div style="margin-top:100px ">
                        <?php
                        echo "Code : " . $highest_id . "<br/>\n";
                        echo "Nom : " . $nom . "<br/>\n";
                        echo "Prenom : " . $prenom . "<br/>\n";
                        echo "Date d'inscription : " . $date . "<br/>\n";
                        echo "Service : " . $service . "<br/>\n";
                        ?>
                    </div>
                </div>
                <div style="float: left; margin-left: 20px;" class="SettingsBox">
                    <div style="width: 400px; padding: 20px;">
                        <div style="padding: 0 10px 10px;" class="buttonBar">
                            <div class="button b1">Imprimer</div>

                        </div>

                        <div style="font-weight: bold; display: none;">Settings</div>
                        <table>
                            <tbody>

                                <tr>
                                    <td>
                                        <div class="settingVals" style="display: none">
                                            <input type="checkbox" class="selPA" value="area1" checked /> Area 1<br>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="settingVals" style="display: none">
                                            <input type="checkbox" checked name="retainCss"   id="retainCss" class="chkAttr" value="class" /> Class
                                            <br>
                                            <input type="checkbox" checked name="retainId"    id="retainId"  class="chkAttr" value="id" /> ID
                                            <br>
                                            <input type="checkbox" checked name="retainStyle" id="retainId"  class="chkAttr" value="style" /> Style
                                        </div>
                                    </td>
                                </tr>

                            </tbody></table>
                    </div>







                    <?php
                }
                ?>  
                <script>
                    $(document).ready(function () {

                        var dialog = $("div.testDialog").dialog({position: {my: "left top", at: "left bottom+50", of: ".SettingsBox"}, width: "600", title: "Print Dialog Box Contents"});

                        $(".toggleDialog").click(function () {
                            dialog.dialog("open");
                        });

                        $("div.b1").click(function () {

                            var mode = $("input[name='mode']:checked").val();
                            var close = mode == "popup" && $("input#closePop").is(":checked");
                            var extraCss = $("input[name='extraCss']").val();

                            var print = "";
                            $("input.selPA:checked").each(function () {
                                print += (print.length > 0 ? "," : "") + "div.PrintArea." + $(this).val();
                            });

                            var keepAttr = [];
                            $(".chkAttr").each(function () {
                                if ($(this).is(":checked") == false)
                                    return;

                                keepAttr.push($(this).val());
                            });

                            var headElements = $("input#addElements").is(":checked") ? '<meta charset="utf-8" />,<meta http-equiv="X-UA-Compatible" content="IE=edge"/>' : '';

                            var options = {mode: mode, popClose: close, extraCss: extraCss, retainAttr: keepAttr, extraHead: headElements};

                            $(print).printArea(options);
                        });

                        $("input[name='mode']").click(function () {
                            if ($(this).val() == "iframe")
                                $("#closePop").attr("checked", false);
                        });
                    });

                </script>
                <?php
            } else {
                header("Location:../index.php");
                exit();
            }
            ?>
    </body>
</html>