<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" contet="IE=edge">
    <link  href="style/inicio.css" rel="stylesheet">
    <title>Astra Faux</title>    
</head>
<body>
    <header>
        <div id="title">
            <h1 class="logo"> 
                Astra Faux 
            </h1>
        </div>
        <nav>
            <div>
                <ul class="menu-nav">
                    <a href="index.php">Inicio</a>
                    <a href="sobre.php">Sobre</a>
                    <a href="#">Produtos</a>
                    <a href="#">Novidades</a>    
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <section>
                <img class="imagem_fundo" src="./style/Components/images/fundo_foto_inicio.png" alt="img_gabriela">

            <div class="inf">
                <h1>Seja bem-vindx a </h1>
                <h2>Astra Faux</h2>
                <h6 id="slogan">Deixando seu olhar poderoso</h6>
                <br>
                <p class="subtitulo">Vamos começar?</p>
                <button class="login" onclick="window.location.href = 'login_usuario.php'">Login</button>
            </div>
        </section>
    </main>
</body>

    <footer id="rodape">

        <button class="botao_final" onclick="window.location.href = 'https://www.instagram.com/astrafaux'">
            <img class="botao_img_insta" src="./style/Components/images/logo_instagram_preto.png" alt="instagram">
        </button>
        <p class="redes">@Astrafaux</p>
        
        
        <button class="botao_final" onclick="window.location.href = 'https://shopee.com.br/astrafaux'">
            <img class="botao_img_shopee" src="./style/Components/images/logo_shopee_preto.png" alt="shopee">
        </button>
        <p class="redes">Loja virtual</p>
        
        <a class="login_adm" href="login_adm.php">Login adm</a>
    </footer>


</html>