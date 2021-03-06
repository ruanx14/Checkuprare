<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include "php/conexao.php";
        session_start();
        include "php/randomItem.php";
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css"> 
    <title>Rare Check-list</title>
</head>
<body>
<?php  if(isset($_SESSION['logado'])) { ?>
<header class="header">
    <nav class="nav">
        <ul class="barrowpoint">
            <?php 
            if($_SESSION['tipouser']=='admin'){
            ?>
            <li><a href="php/addRareGeneral.php">Add item</a></li>
            <?php    
            }
            ?>
            <li><a href="#"><?=$_SESSION['user']?></a></li>
            <li><a href="#">All items</a></li>
            <li><a href="./views/myprogress.php">My progress</a></li>
            <li><a href="./views/help.html">Help, what?!</a></li>
            <li><a href="php/logout.php?sair=logout">Logout</a></li>
        </ul>
    </nav>
</header>
<div class="mobile menuvindicator">
    <div class="mobile tengu" id="tenguzao"><div class="kuuhaku">=</div></div>
    <div class="mobile naturesilvan">Rare checklist</div>
</div>
<container class="container">
    <div class="heartwood">
        <section class="greenguard-1">
                <ul>
                    <li><a class="search" id="helm" href="#rarelisthere">Helms Only</a></li>
                    <li><a class="search" id="weapon" href="#rarelisthere">Weapons Only </a></li>
                    <li><a class="search" id="cape" href="#rarelisthere">Capes Only </a></li>
                    <li><a class="search" id="shoulder" href="#rarelisthere">Shoulders Only </a></li>
                    <li><a class="search" id="armor" href="#rarelisthere">Armors Only</a></li>
                    <li><a class="search" id="belt" href="#rarelisthere">Belts Only </a></li>
                    <li><a class="search" id="fullset" href="#rarelisthere">Full Sets Only </a></li>
                    <li><a class="search" id="pet" href="#rarelisthere">Pets Only</a></li>
                    <li><a class="search" id="morph" href="#rarelisthere">Morphs Only</a></li>
                    <li><a class="search" id="glove" href="#rarelisthere">Gloves Only</a></li>
                    <li><a class="search" id="boot" href="#rarelisthere">Boots Only</a></li>
                    <li><a class="search" id="hardcq" href="#rarelisthere">Hard Craft/Quest Only</a></li>
                </ul>
        </section>
        <section class="greenguard-2"> <article>Your luck today are in the item: <p id="itemRandom"> <?=$itemRandom?> </p></article>  </section>
    </div>

    <div class="livingstone"> <h2>If you got ! You must click in your item to check up in your list =)</h2></div>

    <div class="skulltower" id="rarelisthere"> 

        <?php 
            $query = "select i.idItem, i.name from user u join userCheck uc on u.idUser=uc.user_idUser left join item i on uc.item_idItem=i.idItem where uc.done='false' and u.idUser=".$_SESSION['idUser']." group by i.idItem";
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
        ?>

    </div>
</container>
<?php }else{ ?>
<header class="headerlo">
    <nav class="navlo">
        Rare checklist
    </nav>
</header>
<div class="dragonslayer">
    <div class="ninjaclass">
        <p>DOESN'T NEED YOUR AE ACCOUNT. </p>
        <p>You can create or login a new account here to check your progress.</p>
    </div>
</div>
<container class="container">
    <div class="firezard">
        <form method="post" action="php/verifUser.php">
            <?php 
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                } 
            ?>
            <input type="text" name="user" placeholder="User">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="btnCadastro" value="Go in, let me check!">
        </form>
    </div>
</container>
<?php } ?>
<div class="blackscreen">   
</div>
<footer>
    <a href="#">Made by: Kuuhaku</a>
</footer>
</body>
<script src="js/index.js"></script>
</html>