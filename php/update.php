<?php 
    include "conexao.php";
    $search = $_POST['type'];
    $query = "select i.name from user u join usercheck uc on u.idUser=uc.user_idUser join item i on uc.item_idItem=i.idItem where uc.done='false' and i.typeItem=\"$search\"";
    $resultado = mysqli_query($conexao, $query);
    if($resultado){
        while($dados = mysqli_fetch_array($resultado)){
    ?>
    <div class="carnivora">
        <div class="petshop">
            <input id="<?=$dados['name']?>" class="itemsCheck" type="checkbox" name="">
            <span class="itemsName"><?=$dados['name']?></span>
            <label for="<?=$dados['name']?>" class="itemsBtn"> Got it ! </label>
        </div>
    </div>
    <?php        
        }
    }
    ?>  