<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
    <head>
        <meta charset="UTF-8">
            <title></title>
            <script src="../../js/jquery-1.10.2.js" type="text/javascript"></script>
            <script src="../../bootstrap/js/bootstrap.js" type="text/javascript"></script>
            <link href="../../bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
            <link href="../../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
            <script type='text/javascript'>
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
                        xmlhttp.open("GET", "details.php?idprod=" + str, true);
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
            <div class="row col-md-5 col-md-offset-1">
                <h1 align='center' class="smalltitle">BILAN TOTAL </h1>
            </div>
            <div class="row col-md-5 col-md-offset-1">
                <h1 align='center' class="smalltitle">DETAILS FACTURE </h1>
            </div>

            <div class="row col-md-5 col-md-offset-1"style="height: 600px;overflow: scroll; border-style: solid; ">

                <table align='center' class="db-table table table-hover " >
                    <!--<table border="3" onClick="" style="cursor: pointer;">--> 


                    <?php
                    $connexion = mysql_connect("localhost", "root", "");
                    mysql_selectdb("bechir_app", $connexion);


                    print"<tr><td><strong>Facture numero</strong></td><td><strong>date de facture</strong></td><td><strong>total facture</strong></td></tr>";

                    $result = mysql_query(' SELECT * FROM facture ORDER BY id_facture DESC');

                    while ($teste = mysql_fetch_array($result)) {
                        $id = $teste['id_facture'];

                        echo "<tr bgcolor='#e4dada'>";
                        echo"<td><font color='black'>" . $teste['id_facture'] . "</font></td>";
                        echo"<td><font color='black'>" . $teste['date_facture'] . "</font></td>";
                        echo"<td><font color='black'>" . $teste['total_facture'] . "</font></td>";

                        echo"<td align='center'>";
                        echo"";
                        echo '<button type="button" class="btn btn-danger" onclick="showUser(' . $id . ')">details_facture</button></td>';

                        echo "</tr>";
                    }

                    mysql_close($connexion);
                    ?>

                </table>
            </div>
            <div class="row col-md-5 col-md-offset-1" style="height: 600px;overflow: scroll; border-style: solid; ">
                <table class="table" id="txtHint" >
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
