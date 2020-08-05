<?php 
    include "conexao.php";
    SESSION_START();
    if($_POST['tela']=='index'){
        $idItem = $_POST['idItem'];
        $query = "update userCheck set done='true' where user_idUser=".$_SESSION['idUser']." and item_idItem=".$idItem;
        //echo "<script>alert('".$query."')</script>";
        $resultado = mysqli_query($conexao, $query);
    }else if($_POST['tela']=='myprogress'){
        $idItem = $_POST['idItem'];
        $query = "update userCheck set done='false' where user_idUser=".$_SESSION['idUser']." and item_idItem=".$idItem;
        echo "<script>alert('".$query."')</script>";
        $resultado = mysqli_query($conexao, $query);
    }else{
          //echo "<script>alert('".$query."')</script>";
    }
    ?>
