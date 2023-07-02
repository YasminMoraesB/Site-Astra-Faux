<?php

include ('conexao.php');

//A senha do administrador não foi criptografada, pois o cadastro do unico administrador do Banco foi feita direta no Banco de Dados, futuramente posso criar uma pagina
//de Cadastro de Usuario Administrador, junto com um CRUD completo dele, por agora vai servir

if(isset($_POST['username']) || isset($_POST['senha'])){

    $username = $mysqli->real_escape_string($_POST['username']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    $sqli = "SELECT * FROM adm WHERE username = '$username' AND senha = '$senha'";
    $sqli_query = $mysqli->query($sqli) or die ("Falha na execução da Query procure o suporte para resolução");

    $qtd = $sqli_query->num_rows;

    //Se email e senha estiverem realmente corretos e existirem vamos criar a sessao
    if($qtd == 1){

        $usuario = $sqli_query->fetch_assoc();
        if(!isset($_SESSION)){
            session_start();

        }

        $_SESSION['username'] = $usuario['username'];

        echo ('<p style="color: #228B22";>Login feito com Sucesso! </p>');
        echo "<p> Usuário Logado: </p>";
        echo $_SESSION['username'];


    }else{
        echo ('<p style="color: #FF4500";>Falha no Login, tente novamente!</p>');
    }

    header("Location: painel_adm.php");

}

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" contet="IE=edge">
    <link href="style/style.css" rel="stylesheet">
    <link href="style/Fonts.css" rel="stylesheet">
    
    <title>Login</title>  

</head>
<body>
    <header>
        <div id="title">
            <h1 class="navFont">Astra Faux</h1>
        </div>
        <ul class="navFont">
            <a href="index.php"><li>Inicio</li></a>
            <a href="sobre.php"><li>Sobre</li></a>
            <a href="#"><li>Produtos</li></a>
            <a href="#"><li>Novidades</li></a>
        </ul>
    </header>
    
    <div>
        <img src="style/Components/images/logo.png" alt="logo">
    </div>

    <div class="admtitulo">
    <h2 class="admlogin">Administrador</h2>
    </div>
        
    <!--Login da loja--> 
    <section class ="caixaLogin">
        <div class = "conteudoLogin">
            <h2 class="formTitulo">Login</h2>
            <form action="#" method="post">

                <!-- Login-->
                <div class="login">
                    <p class="formulario">Username</p> 
                    <label for="username"></label>
                    <input type="text" name="username" id="username" required placeholder = "Digite seu username" autofocus>
                        
                    <!--Senha-->
                    
                    <p class="formulario">Senha</p>
                    
                    <label for="isen"></label>
                    <input type="password" name="senha" id="senha" required placeholder = "Digite sua senha">
                </div>

                <!--Inserir link para  a página de criar cadastro-->
                <p><a class="newConta" href="index.php"> Voltar ao modo comum </a></p>

                <button class="entrar" onclick="window.location.href = 'index.php'">Entrar</button>
            </form>
        </div>
    </section>

</body>
</html>