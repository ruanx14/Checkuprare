<?php 
    include "conexao.php";
    SESSION_START();
    $btnCadastro = filter_input(INPUT_POST,"btnCadastro",FILTER_SANITIZE_STRING);
    $erro = false;
if($btnCadastro){
    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $dados_st = array_map("strip_tags",$dados_rc);
    $dados = array_map("trim",$dados_st);
    
    if(in_array("",$dados)){
        $erro = true;
        $_SESSION['msg'] = "<p class='error'>No empty fields bro, this is seriously!</p>";
        echo "<meta http-equiv='refresh' content='0 URL=../'>";
    }else if(stristr($dados['password'],"'") || stristr($dados['user'],"'")){
        $erro = true;
        $_SESSION['msg'] = "<p class='error'>Nop, not, nothing ' here ò.ó! !</p>";
        echo "<meta http-equiv='refresh' content='0 URL=../'>";
    }else if(strlen($dados['password'])<4){
        $erro = true;
        $_SESSION['msg'] =  "<p class='error'>You need a better password bro!</p>";
        echo "<meta http-equiv='refresh' content='0 URL=../'>";
    }else if(stristr($dados['password'],";") || stristr($dados['user'],";")){
        $erro = true;
        $_SESSION['msg'] =  "<p class='error'>Nop, not ; too ò.ó!</p>";
        echo "<meta http-equiv='refresh' content='0 URL=../'>";
    }    


    if(!$erro){
        $sql1 = "select * from user where user='".$dados['user']."' limit 1";  
        $resultadoLogin = mysqli_query($conexao,$sql1);
            if(mysqli_num_rows($resultadoLogin)==1){
                $bdDados = mysqli_fetch_assoc($resultadoLogin);
                if(password_verify($dados['password'],$bdDados['password'])){
                        $_SESSION['logado'] = true;
                        $_SESSION['user'] = $bdDados['user'];
                        $_SESSION['idUser'] = $bdDados['idUser'];
                        echo "<meta http-equiv='refresh' content='0 ../'>";
                    }else{
                        echo "<meta http-equiv='refresh' content='0 ../'>";
                        $_SESSION['msg'] = "<p class='error'> Wrong password or exist already !</p>";
                    }
            }else{
                $dados['password'] = password_hash($dados['password'],PASSWORD_DEFAULT);
                $sql2 = "INSERT INTO user (user,password) VALUES (
                    '".$dados['user']."',
                    '".$dados['password']."'
                    )";
               $cadastrarFoi = mysqli_query($conexao,$sql2);

               if($cadastrarFoi){
                    $_SESSION['logado'] = true;
                    $_SESSION['user'] = $dados['user'];
                    $_SESSION['idUser'] = mysqli_insert_id($conexao);
                    $num = mysqli_query($conexao, "select count(*) from item");
                    $cont = mysqli_fetch_array($num);
                    for($i=1;$i<=$cont['count(*)'];$i++){
                        $novaQuery = "INSERT INTO userCheck(user_idUser,item_idItem,done) VALUES (
                        '".$_SESSION['idUser']."',
                        '".$i."',
                        'false'
                        )";
                    $bowbow = mysqli_query($conexao,$novaQuery);
                    }
                    header("Location: ../");
               }

              /*  if($cadastrarFoi){
                   $_SESSION['msg'] = "<p class='success'>Cadastrado com sucesso, você pode logar</p>";
                   header("Location: ../");
               }else{
                   $_SESSION['msg'] = "<p class='p'>Alguma coisa aconteceu de errado, nos desculpe</p>"; 
               }
            } */
        }
    }
     
    
}else{
        echo "<meta http-equiv='refresh' content='0 ../'>";
        $_SESSION['msg'] = "<p class='error'> Don't dare try this ò.ó!</p>";
    } 
?>  