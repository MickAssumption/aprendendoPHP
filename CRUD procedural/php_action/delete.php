<?php
session_start();
require_once 'db_connect.php';


if(isset($_POST['btn-deletar'])):
   // $variavel = filter_input(INPUT_TIPODEENVIO, 'nomedocampodoarray', FILTER_VALIDATE_TIPODEDADO)
  
    $id = mysqli_escape_string($connect, $_POST['id']);

    $sql = "DELETE FROM cliente WHERE id = '$id'";

   
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Apagado com sucesso";
        header('location: ../index.php');  
         //a interrogação separa os parametros mostrando na url o resultado, e os dois pontos é para voltar um nível.
    else:
        $_SESSION['mensagem'] = "Erro ao apagar";
    header('Location: ../index.php');
    endif;

endif;

?>