<?php

define('HOST', '179.188.16.2');
define('USER', 'shogunn');
define('PASS', 'shogun');
define('DBSA', 'shogunn');

define('C_OK', 'ok');
define('C_ERROR', 'error');
define('C_WARN', 'warn');
/*
function __autoload($Class) {

    $cDir = ['Conn', 'Model', 'Util'];
    $iDir = null;

    foreach ($cDir as $dirName):
        if (!$iDir && file_exists(__DIR__ . "\\{$dirName}\\{$Class}.class.php") && !is_dir(__DIR__ . "\\{$dirName}\\{$Class}.class.php")):
            include_once (__DIR__ . "\\{$dirName}\\{$Class}.class.php");
            $iDir = true;
        endif;
    endforeach;

    if (!$iDir):
        trigger_error("Erro ao incluir {$Class}.class.php", E_USER_ERROR);
        die;
    endif;
}*/