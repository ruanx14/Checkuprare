<?php 
    include "conexao.php";
    session_start();
    $search = $_POST['itemName'];

        $query = "select * from item where name=\"".$search."\"";
        $resultado = mysqli_query($conexao, $query);
        if($resultado){
           $dados = mysqli_fetch_array($resultado);
        ?>
            <div class="craftable">
            <span class="close">&times;</span>
                <h2>Details</h2>
                <div class="info">
                    <p>Name item: <b> <?=$dados['name']?> </b></p>
                    <p>Type item: <b> <?=$dados['typeItem']?> </b></p>
                    <p>Locale:    <b> <?=$dados['locale']?> </b></p>
                    <p>Rate drop: <b> <?=$dados['rateDrop']?> </b></p>
                </div>
            </div>
        <?php        
            }
?>  