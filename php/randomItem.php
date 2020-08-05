<?php
$result = mysqli_query($conexao,"select itemRandom from randomDay");
    $bancoResult = mysqli_fetch_array($result);
    $itemAnterior = $bancoResult['itemRandom'];


    $result = mysqli_query($conexao,"select idItem from item");
    $qtdItems= mysqli_num_rows($result); 
    $randomItem = random_int(1,$qtdItems);

    $diaHoje = date('d');

    $result = mysqli_query($conexao,"select day from randomDay");
    $bancoResult = mysqli_fetch_array($result);
    $diaBanco = $bancoResult['day'];

    
    if($diaBanco==$diaHoje){
        $sqlRandom = "select name from item where idItem=".$itemAnterior;
        $result1 = mysqli_query($conexao,$sqlRandom);
        $bancoRec = mysqli_fetch_array($result1);
        $itemRandom = $bancoRec['name'];  
    }else{
        $sqlDay = "update randomday set day='".$diaHoje."' where idRandomDay=1";
        $result = mysqli_query($conexao,$sqlDay);

        $sqlItem = "update randomday set itemRandom='".$randomItem."' where idRandomDay=1";
        $result = mysqli_query($conexao,$sqlItem);

        $sqlRandom = "select name from item where idItem=".$randomItem;
        $result1 = mysqli_query($conexao,$sqlRandom);
        $bancoRec1 = mysqli_fetch_array($result1);

        $itemRandom = $bancoRec1['name'];  
    }
    
?>