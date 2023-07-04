<!DOCTYPE html>
<html lang="PT-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" contet="IE=edge">
  <link rel="stylesheet" href="style/inicio.css">
  <title>Astra Faux</title>
</head>

<body>
  <header>
    <h1 class="logo">
      Astra Faux
    </h1>
    
    <nav>
      <ul class="menu-nav">
        <li><a href="index.php">Inicio</a></li>
        <li><a href="sobre.php">Sobre</a></li>
        <li><a href="produtos.php">Produtos</a></li>
        <li><a href="novidades.php">Novidades</a></li>
      </ul>
    </nav>
    
  </header>

  <main class="principal">
    
  <section>
      <img class="imagem_fundo" src="./style/Components/images/fundo_foto_inicio.png" alt="img_gabriela">

      <div class="inf">
        <h1>Seja bem-vindo(a) a</h1>
        <h2>Astra Faux</h2>
        <h6 id="slogan">Deixando seu olhar poderoso</h6>
        <p class="subtitulo">Vamos começar?</p>
        <button class="conhecaBotao" onclick="window.location.href = 'produtos.php'">Conheça nossos produtos!</button>
        <button class="conhecaBotao" onclick="window.location.href = 'novidades.php'">Conheça nossas novidades!</button>
      </div>
    </section>

  </main>

  <footer>
    <a class="botao_final" href="https://www.instagram.com/astrafaux" target="_blank">
      <img class="botaoImgRedes" src="./style/Components/images/logo_instagram_preto.png" alt="instagram">
    </a>
    <p class="redes">@Astrafaux</p>

    <a class="botao_final" href="https://shopee.com.br/astrafaux" target="_blank">
      <img class="botaoImgRedes" src="./style/Components/images/logo_shopee_preto.png" alt="shopee">
    </a>
    <p class="redes">Loja virtual</p>

    <div class="login-container">
        <a class="login_adm" href="login_usuario.php">Login</a>
        <a class="login_adm" href="login_adm.php">Login adm</a>

    </div>
  </footer>

</body>

</html>

<?php
    if (!isset($_SESSION)) {
    session_start();
    }

    if (!isset($_SESSION['nome'])) {
    die();
    }
?>
