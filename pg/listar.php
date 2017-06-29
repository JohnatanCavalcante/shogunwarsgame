<table id="tabela">
    <tr><td><b>Nome do Personagem</b></td><td><b>Vida Máxima</b></td><td><b>Vida Atual</b></td><td><b>Level</b></td><td><b>Açoes</b></td></tr>
    <?php
    $r = new Read;

    $r->ExeRead("personagem", "WHERE user != :u", "u={$userLogin['id']}");
    
    //LAÇO DE REPETIÇAO PARA CADA USUARIO
    foreach ($r->getResult() as $personagem) {

        
        ?>
        <tr><td><?php echo $personagem['name'] ?></td><td><?php echo $personagem['hpmax'] ?></td><td><?php echo $personagem['hpcurrent'] ?></td><td><?php echo $personagem['level'] ?></td>
        <td>
        <a href="?pg=combate&opponent=<?php echo $personagem['id'] ?>">C</span></a>
        <?php if($userLogin['role'] == 'A'){ ?>
        <a href="?pg=editar&id=<?php echo $personagem['id'] ?>">E</span></a>
        <?php } ?></td></tr>

        <?php
    }
    ?>
    
</table>