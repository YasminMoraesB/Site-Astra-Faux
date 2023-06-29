<?php

include ('conexao.php');

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
                    <input type="password" nome="senha" id="senha" required placeholder = "Digite sua senha">
                </div>

                <!--Inserir link para  a página de criar cadastro-->
                <p><a class="newConta" href="cadastro_usuario.html"> Crie sua conta </a></p>

                <button class="entrar" onclick="window.location.href = 'index.html'">Entrar</button>
            </form>
        </div>
    </section>

</body>
</html>