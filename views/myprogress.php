<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include "../php/conexao.php";
        session_start();
        if(!isset($_SESSION['logado'])){
            header("Location: ../");
        }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css"> 
    
    <title>My Progress</title>
</head>
<body>
<header class="header">
    <nav class="nav">
        <ul class="barrowpoint">
            <li><a href="#"><?=$_SESSION['user']?></a></li>
            <li><a href="../">All items</a></li>
            <li><a href="javascript:location.reload()">My progress</a></li>
            <li><a href="../views/help.html">Help, what?!</a></li>
            <li><a href="../php/logout.php?sair=logout">Logout</a></li>
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
                    <li><a class="search" id="hardcq" href="#rarelisthere">Hard Craft/Quest Only</a></li>
                </ul>
        </section>
        <section class="greenguard-2"> <article>CONGRATS FOR ALL, THATS YOUR CHECKLIST ! </article>  </section>
    </div>

    <div class="livingstone"> 
        <h2>You can see your list complete here =)</h2>
    </div>

    <div class="skulltower" id="rarelisthere"> 
            
            <?php 
            $query = "select i.idItem, i.name from user u join userCheck uc on u.idUser=uc.user_idUser left join item i on uc.item_idItem=i.idItem where uc.done='true' and u.idUser=".$_SESSION['idUser']." group by i.idItem";
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
            ?>
            
     </div>
</container>
<div class="blackscreen">   
</div>
<footer>
    <a href="https://twitter.com/KuuhakuAQ3D">Made by: (Twitter)Kuuhaku</a>
</footer>
</body>
<script src="../js/myprogress.js"></script>
</html>