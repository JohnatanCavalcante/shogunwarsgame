<!DOCTYPE html>
<?php
session_start();
require('_app/Config.inc.php');
include_once('_app/Model/Login.class.php');
include_once('_app/Conn/Conn.class.php');
include_once('_app/Conn/Read.class.php');
include_once('_app/Conn/Create.class.php');
include_once('_app/Conn/Delete.class.php');
include_once('_app/Conn/Update.class.php');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Shogun</title>
        <link href='images/icon.png' rel='icon' type='image/x-icon'/>
        <link rel="stylesheet" type="text/css" href="index.css">
    </head>
    <body>
    <div id="box">
    <h1>Cadastrar</h1>

            <?php
                $login = new Login;

                if ($login->check_Login()):
                    header('Location: painel.php');
                endif;

                $loginData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

                if (!empty($loginData['Cadastrar'])):
                    unset($loginData['Cadastrar']);
                    $c = new Create();
                    $c->ExeCreate('users', $loginData);
                    header('Location: index.php');
                endif;
            ?>

        <center><form name="LoginForm" action="" method="post">                
                    <table id="tableLogin">
                        <tr><td>Usuário:</td>
                            <td><input type="text" name="username" id="input" autocomplete="off" required/></td></tr>
                        <tr><td>Senha:</td>
                            <td><input type="password" name="password" id="input" autocomplete="off" required/></td></tr>
                        <tr><td>Email:</td>
                            <td><input type="text" name="email" id="input" autocomplete="off" required/></td></tr>
                    </table>
                    <input type="submit" name="Cadastrar" value="Cadastrar" id="button"/>
        </form></center>
    </div>
    </body>
</html>
