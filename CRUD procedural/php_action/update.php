<?php
session_start();
require_once 'db_connect.php';


if(isset($_POST['btn-editar'])):
   // $variavel = filter_input(INPUT_TIPODEENVIO, 'nomedocampodoarray', FILTER_VALIDATE_TIPODEDADO)
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $idade = mysqli_escape_string($connect, $_POST['idade']);
    $id = mysqli_escape_string($connect, $_POST['id']);

    

    if(empty($nome) or empty ($sobrenome)or empty ($email)or empty ($idade) or ($idade == 0)):
        $_SESSION['mensagem'] = "preencha todos os campos";
        header('Location: ../index.php');
    else:

        $sql = "UPDATE cliente SET nome = '$nome', sobrenome= '$sobrenome', email = '$email', idade = '$idade' WHERE  id = '$id'"; //O where é importante pra não atualizar todos os registros.
    endif;
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Atualizado com sucesso";
        header('location: ../index.php');  
         //a interrogação separa os parametros mostrando na url o resultado, e os dois pontos é para voltar um nível.
    else:
        $_SESSION['mensagem'] = "Erro ao atualizar";
    header('Location: ../index.php');
    endif;

endif;

?>