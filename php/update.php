<?php 
    include "conexao.php";
    session_start();
    $idItem = $_POST['idItem'];
    $query = "update usercheck set done='true' where user_idUser=".$_SESSION['idUser']." and item_idItem=".$idItem;
    $resultado = mysqli_query($conexao, $query);

    ?>
