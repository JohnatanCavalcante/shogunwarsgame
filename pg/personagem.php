<?php
	$you = new Read;
		$you->ExeRead("personagem", "WHERE user = :u", "u={$userLogin['id']}");

		$you = $you->getResult()[0];


	?>
	<table>
		<form name="personagemForm">      
		<tr><td>Nome:</td><td><?php echo $you['name'] ?></td></tr>
		<tr><td>Level:</td><td><?php echo $you['level'] ?> </td></tr>
		<tr><td>HP Máximo:</td><td><?php echo $you['hpmax'] ?></td></tr>
		<tr><td>HP Atual: </td><td><?php echo $you['hpcurrent'] ?></td></tr>
		<tr><td>Força</td><td><?php echo $you['strength'] ?></td></tr>
		<tr><td>Defesa</td><td><?php echo $you['defense'] ?></td></tr>
		<tr><td>Resistencia</td><td><?php echo $you['resistence'] ?></td></tr>
	</table>
<?php?>