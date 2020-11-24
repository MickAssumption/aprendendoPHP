<?php
session_start();
require_once 'db_connect.php';


if(isset($_POST['btn-cadastrar'])):
   // $variavel = filter_input(INPUT_TIPODEENVIO, 'nomedocampodoarray', FILTER_VALIDATE_TIPODEDADO)
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $idade = mysqli_escape_string($connect, $_POST['idade']);

    if(empty($nome) or empty ($sobrenome)or empty ($email)or empty ($idade) or ($idade == 0)):
        $_SESSION['mensagem'] = "preencha todos os campos";
        header('Location: ../index.php');
    else:

    $sql = "INSERT INTO cliente (nome, sobrenome, email, idade) VALUES ('$nome', '$sobrenome', '$email', '$idade')";
    endif;
   
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Cadastrado com sucesso";
        header('location: ../index.php');  
         //a interrogação separa os parametros mostrando na url o resultado, e os dois pontos é para voltar um nível.
    else:
        $_SESSION['mensagem'] = "Erro ao cadastrar";
    header('Location: ../index.php');
    endif;
endif;

?>