<?php

if (isset($_POST['login']) && isset($_POST['password'])) {
    $conn = mysql_connect("localhost", "root", "");
    mysql_selectdb("gym", $conn);
    $sql = 'SELECT  login, password  FROM users WHERE login ="' . $_POST['login'] . '"';
    $result = mysql_query($sql) or die(mysql_error());
    $row = mysql_fetch_row($result);
    $login_valide = $row[0];
    $pwd_valide = $row[1];

// on teste si nos variables sont définies
    // on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
    if ($login_valide == $_POST['login'] && $pwd_valide == $_POST['password']) {
        // dans ce cas, tout est ok, on peut démarrer notre session
        // on la démarre :)
        session_start();
        // on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['password'] = $_POST['password'];

        // on redirige notre visiteur vers une page de notre section membre
        header('location:home.php');
    } else {
        // Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
        echo '<body onLoad="alert(\'Membre non reconnu...\')">';
        // puis on le redirige vers la page d'accueil
        echo '<meta http-equiv="refresh" content="0;URL=index.php">';
    }
} else {
    echo 'Les champs  du formulaire ne sont pas complets.';
}
?>
