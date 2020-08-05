<?php 
    SESSION_START();
    if(isset($_GET['sair'])){
        unset($_SESSION['logado']);
        unset($_SESSION['user']);
        unset($_SESSION['idUser']);
        echo "<meta http-equiv='refresh' content='0 ../'>";
    }
?>