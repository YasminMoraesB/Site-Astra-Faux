<?php

include ('conexao.php');



if(isset($_POST['email']) || isset($_POST['senha'])){

    //Evitando a injeção no Banco de Dados
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    $sqli = "SELECT * FROM usuario WHERE email = '$email' ";
    $sqli_query = $mysqli->query($sqli) or die ("Falha na execução da Query procure o suporte para resolução");


    $qtd = $sqli_query->num_rows;
    
    if($qtd == 1){
        $usuario = $sqli_query->fetch_assoc();

        if(password_verify($senha, $usuario['senha'])){
            if(!isset($_SESSION)){
                session_start();
                
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];

                echo ('<p style="color: #228B22";>Login feito com Sucesso!</p>');
                echo "<p> Usuário Logado: </p>";
                echo $_SESSION['nome'];
                echo '<p><a href="logoff.php"> Logout</a></p>';
            }
            
        }
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
    <link href="style/style.css" rel="stylesheet">
    <link href="style/Fonts.css" rel="stylesheet">
    
    <title>Login</title>  
    
    <script>
            var timeoutID;

            function resetTimer() {
                clearTimeout(timeoutID);
                timeoutID = setTimeout(function() {
                window.location.href = "logoff_inatividade.php";
                }, 120000); // Redireciona para logoff_inatividade para dar o motivo do logoff e depois pro index.html, após 2 minutos (120 segundos) de inatividade
            }

            document.addEventListener("mousemove", resetTimer);
            document.addEventListener("keydown", resetTimer);
    </script>

</head>
<body>
    <header>
        <div id="title">
            <h1 class="navFont">Astra Faux</h1>
        </div>
        <ul class="navFont">
            <a href="index.php"><li>Inicio</li></a>
            <a href="sobre.php"><li>Sobre</li></a>
            <a href="produtos.php"><li>Produtos</li></a>
            <a href="novidades.php"><li>Novidades</li></a>
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

                <button class="entrar" onclick="window.location.href = 'index.php'">Entrar</button>
            </form>
        </div>
    </section>

</body>
</html>