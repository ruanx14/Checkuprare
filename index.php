<?php 
    include "php/conexao.php";
    SESSION_START();
    include "php/randomItem.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
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
            <li><a href="#"><?=$_SESSION['user']?></a></li>
            <li><a href="#">All items</a></li>
            <li><a href="./views/myprogress.php">My progress</a></li>
            <li><a href="./views/help.html">Help, what?!</a></li>
            <li><a href="php/logout.php?sair=logout">Logout</a></li>
            
        </ul>
    </nav>
</header>
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
                    <li><a class="search" id="hardcq" href="#rarelisthere">Hard Craft/Quest Only</a></li>
                </ul>
        </section>
        <section class="greenguard-2"> <article>Your luck today are in the item: <p id="itemRandom"> <?=$itemRandom?> </p></article>  </section>
    </div>

    <div class="livingstone"> <h2>If you got ! You must click in your item to check up in your list =)</h2></div>

    <div class="skulltower" id="rarelisthere"> 

    </div>
</container>
<?php }else{ ?>
<header class="headerlo">
    <nav class="navlo">
        Rare checklist
    </nav>
</header>

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
    <a href="https://twitter.com/KuuhakuAQ3D">Made by: (Twitter)Kuuhaku</a>
</footer>
</body>
<script src="js/index.js"></script>
</html>