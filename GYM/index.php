<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <script src="js/jquery-1.10.2.js" type="text/javascript"></script>
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="row col-md-8 col-md-offset-2" style="clear: both; margin-bottom: 50px;margin-top: 20px;">
            <img src=img/california.png alt="Smiley face"  style="margin-left: auto;margin-right: auto; display: block;">
            <form action="verif_login.php" method="post" >

                <div class="form-group">
                    <label for="example">login</label>
                    <input type="text" class="form-control" name="login"   id="login" placeholder="Entrer le nom"/>
                </div>
                <div class="form-group">
                    <label for="example">password</label>
                    <input type="password" class="form-control" name="password"   id="password" placeholder="Entrer le nom"/>
                </div>
                <button type="submit" class="btn btn-danger  btn-lg btn-block" name="Enter" value="Enter">Enter</button>
            </form>
        </div>
    </body>
</html>
