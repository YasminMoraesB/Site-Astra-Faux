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
            <h1>Astra Faux</h1>
        </div>
        <ul>
            <a href="index.html"><li>Inicio</li></a>
            <a href="sobre.html"><li>Sobre</li></a>
            <a href="#"><li>Produtos</li></a>
            <a href="#"><li>Novidades</li></a>
        </ul>
    </header>
    <div>
        <img src="style/Components/images/logo.png" alt="logo">
    </div>
        <div>
            <h2>Login</h2>

            <!--Login da loja--> 

    <form action="#" method="post">

        <!-- Login-->
        <div><p>Email</p> </div>
        <label for="email"></label>
        <input type="text" name="usu" id="email" required placeholder="Digite seu email" autofocus>
        
        <!--Senha-->
        <p>Senha</p>
        <label for="isen"></label>
        <input type="password" nome="sen" id="sen" required placeholder="Digite sua senha">

       <span> 
        <!--Inserir link para  a página de criar cadastro-->
        <a href="cadastro_usuario.html"> Crie sua conta</a>

       </span>
        <input type="submit" value="entrar">
    </form>
</div>

</body>
</html>