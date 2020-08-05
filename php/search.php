<?php 
    include "conexao.php";
    session_start();

    $search = $_POST['type'];

    if($_POST['tela']=='index'){
        $query = "select i.idItem, i.name from user u join userCheck uc on u.idUser=uc.user_idUser left join item i on uc.item_idItem=i.idItem where uc.done='false' and i.typeItem=\"$search\" and u.idUser=".$_SESSION['idUser']." group by i.idItem";
        $resultado = mysqli_query($conexao, $query);
        if($resultado){
            while($dados = mysqli_fetch_array($resultado)){
        ?>
        <div class="carnivora">
            <div class="petshop">
                <input id="<?=$dados['idItem']?>" class="itemsCheck" type="checkbox">
                <span class="itemsName"><?=$dados['name']?></span>
                <label for="<?=$dados['idItem']?>" class="itemsBtn"> Got it ! </label>
            </div>
        </div>
        <?php        
            }
        }

    }else if($_POST['tela']=='myprogress'){
        $query = "select i.idItem, i.name from user u join userCheck uc on u.idUser=uc.user_idUser left join item i on uc.item_idItem=i.idItem where uc.done='true' and i.typeItem=\"$search\" and u.idUser=".$_SESSION['idUser']." group by i.idItem";
        $resultado = mysqli_query($conexao, $query);
        if($resultado){
            while($dados = mysqli_fetch_array($resultado)){
        ?>
        <div class="carnivora">
            <div class="petshop">
                <input id="<?=$dados['idItem']?>" class="itemsCheck" type="checkbox" checked>
                <span class="itemsName"><?=$dados['name']?></span>
                <label for="<?=$dados['idItem']?>" class="itemsBtn"> Got it ! </label>
            </div>
        </div>
        <?php        
            }
        }
    }
    ?>  