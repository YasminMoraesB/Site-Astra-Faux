<?php 
    if(!isset($_SESSION)){
        session_start();
        
        if($_SESSION != NULL){
            $nomeUsuario = $_SESSION['nome'];

            echo "<p style = 'color:black'> Usuário Logado: ";
            echo $nomeUsuario;
            echo '<p><a href="logoff.php"> Logout</a></p>';	
        }else{
            $nomeUsuario = NULL;
        }
    }
                
         
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/produto.css"rel="stylesheet">
    <link href="style/Fonts.css" rel="stylesheet">
    <title>Produtos</title>
</head>
    <header>
        <div id="title">
            <h1>Astra Faux</h1>
        </div>
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
        <!--Páginas principais de navegação-->

        <ul>
            <a href="index.php"><li>Inicio</li></a>
            <a href="sobre.php"><li>Sobre</li></a>
            <a href="produtos.php"><li>Produtos</li></a>
            <a href="novidades.php"><li>Novidades</li></a>
        </ul>
    </header>
<body>

    <?php
    include ('conexao.php');

    $sqli = "SELECT * FROM produto";
    $resultado = $mysqli->query($sqli) or die ("Erro ao consultar dados");

    if($resultado->num_rows > 0){
        while ($dados = $resultado->fetch_assoc()){
            ?>
            
            <div class="produto">
                <img class="produtoImagem" src=<?php  echo "./" . $dados["caminho_da_img"]; ?> alt="Imagem do Produto">
                <h1 class="produtoNome"><?php echo $dados['nome']; ?></h1>
                <p class="produtoDescricao"><?php echo $dados['descricao']; ?></p>
                <p class="produtoPreco">R$ <?php echo $dados['valor']; ?></p>
                
                <!-- Se estiver logado abre uma nova aba onde os produtos da Gabi estão, se não estiver logado, vai pra aba de Login do Usuário , 
                    futuramente da pra criar a aba de carrinhos e executar as vendas por esse site-->
                
                <?php if($nomeUsuario){ ?>
                    <button class="produtoComprar"><a class="link"href="https://shopee.com.br/astrafaux?is_from_login=true" target="_blank">Comprar</a></button>
                <?php }else{ ?>
                    <button class="produtoComprar" onclick="window.location.href = 'login_usuario.php'">Comprar</button>
                <?php } ?>

            </div>
            
            <?php
        }
    }

    ?>
      
</body>
</html>