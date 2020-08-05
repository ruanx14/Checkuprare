<?php 
    SESSION_START();
    if(isset($_GET['sair'])){
        unset($_SESSION['logado']);
        unset($_SESSION['user']);
        echo "<meta http-equiv='refresh' content='0 ../'>";
    }
?>