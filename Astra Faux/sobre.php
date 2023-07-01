
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" contet="IE=edge">
    <link  href="style/sobre.css" rel="stylesheet">
    <link href="style/Fonts.css" rel="stylesheet">
    <title>Sobre</title>
</head>
<body>
    <header>
        <div id="title">
            <h1>Astra Faux</h1>
        </div>
        <script>
            var timeoutID;

            function resetTimer() {
                clearTimeout(timeoutID);
                timeoutID = setTimeout(function() {
                window.location.href = "index.php";
                }, 120000); // Redireciona para index.php após 2 minutos (120 segundos) de inatividade
            }

            document.addEventListener("mousemove", resetTimer);
            document.addEventListener("keydown", resetTimer);
        </script>
        <!--Páginas principais de navegação-->

        <ul>
            <a href="index.php"><li>Inicio</li></a>
            <a href="sobre.php"><li>Sobre</li></a>
            <a href="produtos.php"><li>Produtos</li></a>
            <a href="novidades.php"><li>Novidades</li></a>
        </ul>
    </header>

    <!--Sobre a Gabriela (centralizar)-->

    <div class="about">
        <img class="about-img"src="style/Components/images/foto_gabriela.png" alt="Foto Gabriela">
        <p class="p-about">Paulistana de 29 anos, mãe e esposa que tornou um hobby em algo profissional prezando pela<b class="negrito"> qualidade e preço acessível </b>para que todos que amam maquiagem e cílios postiços possam comprar e fazer <b class="negrito">a diferença</b> apenas com uma maquiagem.</p>
    </div>
    
    <div class="container">
        <!--Sobre a Astra Faux-->
        <div class="container1">

            <img class="img-container1" src="style/Components/images/foto_astra_ref.png" alt="Personagem referência: Astra do jogo Valorant">
    

                <h4> Conta pra gente os detalhes sobre a fundação da empresa?</h4>
                <p><b>R:</b> Estava eu, nobre camponesa assistindo vídeos no tiktok sobre maquiagens que as gringas usavam e <b class="negrito">vendo o quanto os cílios postiços faziam diferença na maquiagem como um todo</b>, pensei, por que não vender aqui no Brasil?</p>
                <h4>O que te motivou a criar a Astra faux?</h4>
                <p><b>R:</b> O principal motivo de fundar a Astra Faux foi disponibilizar a facilidade dos cílios importados para que, nós brasileiras, pudessemos fazer as maquiagens que tanto gostamos<b class="negrito"> com cílios que façam a diferença na maquiagem!</b></p>
                <h4>Seu objetivo com a Astra Faux?</h4>
                <p> <b>R:</b> Ser <b class="negrito">referência</b> quando se trata de cílios postiços.</p>
        <!--Sobre a Empresa-->
        </div>
         
        <div class="container2">

        
              <img class="img-container2"src="style/Components/images/cilios_molde.png" alt="Foto cílios">

            <h4>Quais valores você preza para sua empresa?</h4>
            <p><b>R:</b> Qualidade e preço justo.</p>
            <h4>Quais são as pessoas que você quer atingir?</h4>
            <p><b>R:</b> Meu público-alvo são <b class="negrito">pessoas que amam cosméticos e que encontram sua auto estima nesse mundo chamado maquiagem .</b></p>
            <h4>Porque o nome Astra Faux?</h4>
            <p><b>R:</b> Pensei em um <b class="negrito">nome único</b> que combine com suas cores de uma personagem que tanto gosto.</p> 
            <button class="produto" onclick="window.location.href = 'produto.php'">Conheça nossos produtos</button>
        </div>
      </div>
</body>
</html>
<?php 
    if(!isset($_SESSION)){
        session_start();		
    }
                
    if (!isset($_SESSION['nome'])){
        die ();
    } else {
        echo "<p style = 'color:white'> Usuário Logado: ";
                    echo $_SESSION['nome'];
                    echo '<p><a href="logoff.php"> Logout</a></p>';
    }     
?>