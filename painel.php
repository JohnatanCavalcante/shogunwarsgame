<?php
session_start();
require('_app/Config.inc.php');
include_once('_app/Model/Login.class.php');
include_once('_app/Conn/Conn.class.php');
include_once('_app/Conn/Read.class.php');
include_once('_app/Conn/Create.class.php');
include_once('_app/Conn/Delete.class.php');
include_once('_app/Conn/Update.class.php');

$login = new Login;
$logoff = filter_input(INPUT_GET, 'logoff', FILTER_VALIDATE_BOOLEAN);
$getpg = filter_input(INPUT_GET, 'pg', FILTER_DEFAULT);

if (!$login->check_Login()):
    unset($_SESSION['userLogin']);
    header('Location: index.php');
else:
    $userLogin = $_SESSION['userLogin'];
endif;


if ($logoff):
    unset($_SESSION['userLogin']);
    header('Location: index.php?pg=logoff');
endif;

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Shogun

        </title>
        <link rel="stylesheet" type="text/css" href="painel.css">
        <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    </head>
    <body>

        <div id="menu">
            <div id="content_menu">
                <div id="logo"><a href="./" style="text-decoration: none; color: #fff;">Shogun</a></div><!-- /logo -->
                <div id="menu_links">
                    <a href="?pg=listar">Listar Personagens</a>
                    <a href="?pg=personagem">Personagem</a>
                    <a href="?pg=perfil&username=<?php echo strtolower($userLogin['username']); ?>"><?php echo $userLogin['username']; ?></a>
                    <a href="?logoff=true">Sair</a>
                </div><!-- /menu_links -->
            </div><!-- /content_menu -->
        </div><!-- /menu -->

        <div id="content">

            <div id="conteudo">
            <?php
            //VERIFICA SE O USUARIO JA TEM PERSONAGEM
            $readPerm = new Read;
            $readPerm->ExeRead("personagem", "WHERE user = :n", "n={$userLogin['id']}");

            if(!$readPerm->getResult()){
                $getpg = 'firstcreate';
            }
            //QUERY STRING
            if (!empty($getpg)):
                $includepatch = 'pg/' . strip_tags(trim($getpg) . '.php');
            else:
                $includepatch = 'pg/home.php';
            endif;

            if (file_exists($includepatch)):
                require_once($includepatch);
            else:
                echo "<div id=\"error\">";
                echo "404 - Página não encontrada";
                echo "</div>";
            endif;
            ?>
            </div><!-- /conteudo -->

        </div><!-- /content -->


    </body>
</html>
