<!-- Um Sistema bastante simplório de login para estudo, análise e pesquisa.
-->
<!DOCTYPE html>
<?php
//requisitar o arquivo de conexão
require_once 'conectar.php';

//para quando logar
session_start();


//se o post estiver o sinal de que o botão foi clicado, pegar o login, senha e preparar a variável dos erros.
if(isset($_POST['btn-entrar'])):
    $erros = array();
    $login = mysqli_escape_string($connect, $_POST['login']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);

    //se alguns do campos login e senha estiver vazio
    if(empty($login) or empty ($senha)):
        $erros[] = "<li> o campo longin/senha precisa ser preenchido </li>";
    else:
        //prepara a query de busca na variavel sql.
        $sql = "SELECT login FROM usuario WHERE login = '$login'";
        //faz a busca com a função que retorna 1 e 0, true ou falso.
        $resultado = mysqli_query($connect, $sql);
        //busca pela senha
        if(mysqli_num_rows($resultado) > 0):
            //criptografia da senha
            $senha = md5($senha);
            $sql = "SELECT * FROM usuario WHERE senha = '$senha' AND login = '$login' ";
            $resultado = mysqli_query($connect, $sql);
            //cria uma sessão para logado e de id.
                if(mysqli_num_rows($resultado) == 1):
                    $dados = mysqli_fetch_array($resultado);
                    $_SESSION['logado'] = true;
                    $_SESSION['id_usuario'] = $dados['id'];
                    header('Location: home.php');
                    mysqli_close($connect);
                else:
                    $erros[] = "<li> Usuário e senha não conferem </li>";
                    mysqli_close($connect);
                endif;
        else:
            $erros[] = "<li> usuário inexistente </li>";
            mysqli_close($connect);
        endif;
    endif;
endif;
?>


<head>
<title> login</title>
<meta charset="utf-8">
</head>
<body>
<h1> Login </h1>

<!--lista de erros-->
<ul>
<?php
if (!empty($erros)):
 
    foreach($erros as $erro):
        echo $erro;
    endforeach;
   
endif;
?>
</ul>

<hr>
<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="POST">
Login: <input type="text" name="login"><br>
Senha: <input type="password" name="senha"><br>
<button type="submit" name="btn-entrar"> Entrar </button>
</form>
</body>
</html>

