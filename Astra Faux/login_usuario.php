<?php

include ('conexao.php');


if(isset($_POST['email']) || isset($_POST['senha'])){

    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    $sqli = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
    $sqli_query = $mysqli->query($sqli) or die ("Falha na execução da Query procure o suporte para resolução" . $mysqli->error);

    $qtd = $sqli_query->num_rows;

    //Se email e senha estiverem realmente corretos e existirem vamos criar a sessao
    if($qtd == 1){

        $usuario = $sqli_query->fetch_assoc();
        if(!isset($_SESSION)){
            session_start();
            echo '<a href="logoff.php" class="btn btn-outline-secondary" role="button" >Voltar a tela de Login</a>';

        }

        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];


        echo ('<p style="color: #228B22";>Login feito com Sucesso!</p>');
        //header('location: index.html');

        if(isset($_SESSION['atividade']) && (time() - $_SESSION['atividade']) > 10000){
            session_unset();
            session_destroy();
            echo "<script>window.location.href = 'index.html';</script>"; // Redirecionar para a página inicial
            exit(); // Encerrar o script
        }

        $_SESSION['atividade'] = time();
        echo "<p> Usuário Logado: ";
        echo $_SESSION['nome'];

    }else{
        echo ('<p style="color: #FF4500";>Falha no Login, tente novamente!</p>');
    }

}

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" contet="IE=edge">
    <link  href="style/style.css" rel="stylesheet">
    <link href="style/Fonts.css" rel="stylesheet">
    
    <title>Login</title>  
    
    <script>
    setTimeout(function() {
      window.location.href = "index.html";
    }, 10000); // Redireciona para index.html após 2min automaticamente
  </script>
</head>
<body>
    <header>
        <div id="title">
            <h1 class="navFont">Astra Faux</h1>
        </div>
        <ul class="navFont">
            <a href="index.html"><li>Inicio</li></a>
            <a href="sobre.html"><li>Sobre</li></a>
            <a href="#"><li>Produtos</li></a>
            <a href="#"><li>Novidades</li></a>
        </ul>
    </header>
    
    <div>
        <img src="style/Components/images/logo.png" alt="logo">
    </div>
        
    <!--Login da loja--> 
    <section class ="caixaLogin">
        <div class = "conteudoLogin">
            <h2 class="formTitulo">Login</h2>
            <form action="#" method="post">

                <!-- Login-->
                <div class="login">
                    <p class="formulario">Email</p> 
                    <label for="email"></label>
                    <input type="text" name="email" id="email" required placeholder = "Digite seu email" autofocus>
                        
                    <!--Senha-->
                    
                    <p class="formulario">Senha</p>
                    
                    <label for="isen"></label>
                    <input type="password" name="senha" id="senha" required placeholder = "Digite sua senha">
                </div>

                <!--Inserir link para  a página de criar cadastro-->
                <p><a class="newConta" href="cadastro_usuario.html"> Crie sua conta </a></p>

                <button class="entrar" onclick="window.location.href = 'index.html'">Entrar</button>
            </form>
        </div>
    </section>

</body>
</html>