<?php 
//função disponível só para conta adm
if(!isset($_GET['id']) || $_GET['id'] == null){
	echo "<div id=\"error\">";
    echo "404 - Página não encontrada";
    echo "</div>";
}else{

$r = new Read;
$r->ExeRead('personagem', 'WHERE id = :u', "u={$_GET['id']}");

if(!$r->getResult()){
	echo "<div id=\"error\">";
    echo "404 - Página não encontrada";
    echo "</div>";
}else{

	$r = $r->getResult()[0];
	$u = new Update();

	$personagem = filter_input_array(INPUT_POST, FILTER_DEFAULT);

	if(isset($_POST['Level'])){
		$attr = 10;
		$r['hpmax'] = $r['hpmax'] + $attr;
		$r['hpcurrent'] = $r['hpcurrent'] + $attr;
		$r['strength'] = $r['strength'] + $attr;
		$r['defense'] = $r['defense'] + $attr;
		$r['resistence'] = $r['resistence'] + $attr;

		$dados = array('name' => $r['name'], 'level' => $r['level'] + 1 ,'hpmax' => $r['hpmax'], 'hpcurrent' => $r['hpcurrent'], 'strength' => $r['strength'], 'defense' => $r['defense'], 'resistence' => $r['resistence']);

		$u->ExeUpdate('personagem', $dados, 'WHERE id = :i', "i={$r['id']}");

		echo "<div id='" . C_OK . "'>Level UP!</div>";

	}else{
	if(isset($_POST['Editar'])){
		$dados = array('name' => $personagem['name']);
		$u->ExeUpdate('personagem', $dados, 'WHERE id = :i', "i={$r['id']}");
		echo "<div id='" . C_OK . "'>Ediçao concluida</div>";
	}else{

?>
<table>
<form name="EditarForm" action="" method="post">      
	<tr><td>Nome:</td><td><input type="text" name="name" value="<?php echo $r['name'] ?>"></td></tr>
	<tr><td>Level:</td><td><?php echo $r['level'] ?> </td></tr>
	<tr><td>HP Máximo:</td><td><?php echo $r['hpmax'] ?></td></tr>
	<tr><td>HP Atual: </td><td><?php echo $r['hpcurrent'] ?></td></tr>
	<tr><td>Força</td><td><?php echo $r['strength'] ?></td></tr>
	<tr><td>Defesa</td><td><?php echo $r['defense'] ?></td></tr>
	<tr><td>Resistencia</td><td><?php echo $r['resistence'] ?></td></tr>
	<tr><td></td><td><input type="submit" name="Editar" value="Editar"></td></tr>
</form>
<form name="LevelUp" action="" method="post">      
	<tr><td></td><td><input type="submit" name="Level" value="Level up!"></td></tr>
</form>
</table>

<?php } } } } ?>