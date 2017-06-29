<?php 

if(!isset($_GET['opponent'])){
	echo "<div id=\"error\">";
    echo "404 - Página não encontrada";
    echo "</div>";
}else{
	if($_GET['opponent'] == null){
		echo "<div id=\"error\">";
    	echo "404 - Página não encontrada";
   		echo "</div>";
	}else{

		$opponent = new Read;
		$opponent->ExeRead("personagem", "WHERE id = :u", "u={$_GET['opponent']}");

		$you = new Read;
		$you->ExeRead("personagem", "WHERE user = :u", "u={$userLogin['id']}");

		if(!$opponent->getResult()){
			echo "<div id=\"error\">";
    		echo "404 - Página não encontrada";
   			echo "</div>";
		}else{
			$opponent = $opponent->getResult()[0];
			$you = $you->getResult()[0];

			if(isset($_POST['Bater'])){
				$pda = $you['strength'] * 1.5;
				$pdd = $opponent['defense'] * 1.2;

				$dmg = $pda - $pdd;
				$u = new Update();

				if($dmg > 0){
					$dados = array("hpcurrent" => $opponent['hpcurrent'] - $dmg);
					$u->ExeUpdate('personagem', $dados, "WHERE id = :i", "i={$opponent['id']}");
					//MENSAGEM DE VITORIA
        			echo "<div id='" . C_OK . "'>Você VENCEU!</div>";
				}else{
					$dados = array("hpcurrent" => $you['hpcurrent'] - abs($dmg));
					$u->ExeUpdate('personagem', $dados, "WHERE id = :i", "i={$you['id']}");
					//MENSAGEM DE DERROTA
					echo "<div id='" . C_ERROR . "'>Você PERDEU!</div>";
				}

			}else{

			?>
			<div id="combate">
				<div id="card-l" style="background: #d9534f;">
					<h2><?php echo $opponent['name'] ?></h2>
					<b>Vida atual: </b><?php echo $opponent['hpcurrent'] ?> <br/>
					<b>Level: </b><?php echo $opponent['level'] ?>
				</div>
				<div id="card-r" style="background: #5bc0de;">
					<h2><?php echo $you['name'] ?> (você)</h3>
					<b>Vida atual: </b><?php echo $you['hpcurrent'] ?> <br/>
					<b>Level: </b><?php echo $you['level'] ?>
				</div>
			</div>
			<div class="clear"></div>
			<form name="CombateForm" action="" method="post">                
			    <center>
			    <span style="color: #5bc0de; font-size: 25px;">V</span><span style="color: #d9534f; font-size: 25px;">S</span><br><br>
			    <input type="submit" name="Bater" value="Bater" id="button"/>
			    </center>
			</form>
			<?php
			}
		}

	}
}

?>
