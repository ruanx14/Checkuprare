<!DOCTYPE html>
<html lang="pt-br">
<?php 

session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css"> 
    <link rel="stylesheet" href="../css/myprogress.css"> 
    <title>My Progress</title>
</head>
<body>
<header class="header">
    <nav class="nav">
        <ul class="barrowpoint">
    
            <li><a href="#"><?=$_SESSION['user']?></a></li>
            <li><a href="../">All items</a></li>
            <li><a href="#">My progress</a></li>
            <li><a href="../views/help.html">Help, what?!</a></li>
            <li><a href="../php/logout.php?sair=logout">Logout</a></li>
        </ul>
    </nav>
</header>    
<container class="container">
    <div class="westmere">
        
    </div>
</container>
<footer>
    <a href="https://twitter.com/KuuhakuAQ3D">Kuuhaku</a>
</footer>
</body>
</html>