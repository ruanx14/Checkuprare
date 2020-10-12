<?php 
require 'conexao.php';
session_start();

if($_SESSION['tipouser']=='admin'){
    $btnAdd = filter_input(INPUT_POST,"btnAdd",FILTER_SANITIZE_STRING);
    if($btnAdd){
        $sql =  "INSERT INTO item(typeItem, name, locale, rateDrop) values (
        '".$_POST['typeItem']."',
        '".$_POST['name']."',
        '".$_POST['locale']."',
        '".$_POST['rateDrop']."'
        )";
            mysqli_query($conexao,$sql);
            $idItem = mysqli_insert_id($conexao);
            $num = mysqli_query($conexao, "select count(*) from user");
            $cont = mysqli_fetch_array($num);
            for($i=1;$i<=$cont['count(*)'];$i++){
                $novaQuery = "INSERT INTO userCheck(user_idUser,item_idItem,done) VALUES (
                '".$i."',
                '".$idItem."',
                'false'
                )";
            $bowbow = mysqli_query($conexao,$novaQuery);
            }
            header('Location: ../index.php'); 
    }
}else{
    header('Location: ../index.php');  
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--     <link rel="stylesheet" href="css/index.css">  -->
    <title>Add item</title>
</head>
<body>
    <form method="POST" action="">
        <select name="typeItem">
            <option value="helm" default>Helm</option>
            <option value="weapon">Weapon</option>
            <option value="cape">Cape</option>
            <option value="armor">Armor</option>
            <option value="shoulder">Shoulder</option>
            <option value="belt">Belt</option>
            <option value="morph">Morph</option>
            <option value="pet">Pet</option>
            <option value="glove">Gloves</option>
            <option value="boot">Boots</option>
            <option value="fullset">Sets Full</option>
            <option value="hardcq">Hard Craft/Quest</option>
        </select>
        <input type="text" name="name" placeholder="Rare Name">
        <input type="text" name="locale" placeholder="Localidade">
        <input type="text" name="rateDrop" placeholder="Rate drop">
        <input type="submit" name="btnAdd" value="Adicionar">
    </form>
</body>
</html>