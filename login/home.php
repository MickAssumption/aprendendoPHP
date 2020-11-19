<!-- Para usar os parametros passados na index.php, como nome de usuário e dados do banco, fazemos um requerimento na conexao ao banco e abrimos uma sessao.-->
<?php
require_once 'conectar.php';

session_start();

//verificação se ele pode acessar esta página.

if($_SESSION['logado'] <> 1):
    header('Location: index.php');
endif;


//pega o ID do usuário, faz a query de busca com base no id, conecta e busca no banco, separa o resutlado de busca organizado em um array na variável dados.
$id = $_SESSION['id_usuario'];
$sql= "SELECT * FROM usuario WHERE id = '$id'";
$resultado = mysqli_query ($connect, $sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($connect);
?>
<html>


<head>

<title>Login</title>
<meta charset="uft-8">

</head>

<body>

    <h1> Olá, <?php echo $dados['nome']; ?> <br></h1> 
    <hr>
    <a href="logout.php">Sair</a>
</body>

</html>