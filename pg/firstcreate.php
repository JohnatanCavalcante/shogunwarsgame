<?php 
		//VERIFICA SE O USUARIO JA TEM PERSONAGEM
        $readPerm = new Read;
        $readPerm->ExeRead("personagem", "WHERE user = :n", "n={$userLogin['id']}");

        if($readPerm->getResult())
        	header('Location: painel.php?pg=home');

?>
Você não tem nenhum personagem! Crie um agora!

<?php
$r = new Read();
$c = new Create();

$personagem = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($personagem['Adicionar'])) {

    if (empty($personagem['name'])):
        echo "<div id='" . C_WARN . "'>Informe um nome para o personagem!</div>";
    else:
     
        $dadosPermDay = array("name" => $personagem['name'], "user" => $userLogin['id']);
        $c->ExeCreate("personagem", $dadosPermDay);
        
        //MENSAGEM DE SUCESSO
        echo "<div id='" . C_OK . "'>{$personagem['name']} cadastrado com sucesso!</div>";

    endif;
}else{
?>

<form name="CriarForm" action="" method="post">                
    <table id="tableLogin">
        <tr><td>Nome:</td>
            <td><input type="text" name="name" id="input" autocomplete="off"/></td></tr>

    </table>
    <input type="submit" name="Adicionar" value="Adcionar" id="button"/>

</form>

<?php } ?>