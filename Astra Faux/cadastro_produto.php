<?php

include ('conexao.php');



    if(!isset($_SESSION)){
        session_start();		
        }
                
        if (!isset($_SESSION['username'])){
            die ();
        } else {
                    echo "<p style = 'color:rgb(132, 14, 201)'> Usuário Logado: ";
                    echo $_SESSION['username'];
                    echo '<p><a href="logoff.php"> Logout</a></p>';
                    
    } 

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="style/cadastro.css"rel="stylesheet">
    <link href="style/Fonts.css" rel="stylesheet">
 
    
    <title>Cadastro</title>
    
</head>
<header>
        <div id="title">
            <h1>Astra Faux</h1>
        </div>
        <!--Páginas principais de navegação-->

        <ul>
            <a href="painel_adm.php"><li>Painel</li></a>
            <a href="painel_usuarios.php"><li>Usuario</li></a>
            <a href="painel_produtos.php"><li>Produtos</li></a>
            <a href="painel_novidades.php"><li>Novidades</li></a>
        </ul>
</header>

<body>

    <!--formulário da página para cadastro de Produtos -->

    <section>
        <div>
            <h4>Criar cadastro produto</h4>
            <!--Inicio do formulário-->
            <form class="row g-3" enctype="multipart/form-data" action="" method="post">

                <!--Nome-->

                <div class="col-md-6" style= "width: 400px;">
                  <label for="inputText" class="form-label">Nome</label>
                  <input type="text" class="form-control" name="nome" id="nome">
                </div>

                <!--Quantidade-->
                <div class="form-group" style= "width: 200px;">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" class="form-control" id="qtd" name="qtd" min="0" step="1">
                </div>

                <!--Valor-->
                <div class="form-group" style= "width: 450px;">
                    <label for="valor">Valor</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R$</span>
                        </div>
                        <input type="text" class="form-control" id="valor" name="valor" placeholder="0.00" pattern="\d+(\.\d{2})?" required>
                        <small>Ao invés de (,) insira (.) para dividir a casa decimal. Exemplo: 2.00</small>
                    </div>
                </div>

                <!--Descricao-->

                <div class="form-row" style= "width: 400px">
                    <label for="FormControlTextarea">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
                </div>

                <!--Imagem-->
                <div class="form-group">
                    <h6>Imagem do produto</h6>
                    <input type="file" class="form-control-file" id="imagem" name="imagem">
                </div>

                <div class="col-12">
                  <br>
                  <button type="submit" class="btn btn-warning"> Enviar </button>
                  <a href="painel_produtos.php" class="btn btn-outline-secondary" role="button" >Voltar</a>
                </div>
            </form>
        </div>
    </section>

    <?php 
    if(isset($_FILES['imagem'])) {
        $imagem = $_FILES['imagem'] ;
            
        if($imagem['error']){
            echo "<p>Erro ao enviar imagem, tente novamente.</p>";
        }
        
        $pasta = "img_produto/";
                
        $nomeImagem = $imagem['name'];
        $novoNomeImagem = uniqid();
        $extensaoImagem = strtolower (pathinfo($nomeImagem, PATHINFO_EXTENSION));
                
        if($extensaoImagem != 'jpg' && $extensaoImagem != 'png'){
            die("Tipo de arquivo não aceito, apenas imagens em jpg e png são aceitas.");
        }
        
        $imagem_banco = move_uploaded_file($imagem['tmp_name'], $pasta . $novoNomeImagem . '.' . $extensaoImagem);
                
        if($imagem_banco){
            $nome = $_POST["nome"];
            $quantidade = $_POST['qtd'];
            $valor = $_POST['valor'];
            $descricao = $_POST['descricao'];
            $caminhoImg = $pasta . $novoNomeImagem . "." . $extensaoImagem;

            $mysqli->query("INSERT INTO produto
                                (nome, qtd, descricao, valor, caminho_da_img)  
                            VALUES 
                                ('$nome','$quantidade', '$descricao', '$valor', '$caminhoImg')") or die($mysqli->error);
                    
            echo "<script>alert('Cadastro de Produto feito com Sucesso!');";
            echo "javascript:window.location='painel_produtos.php';</script>";
 
        }else{
            echo "<p>Erro ao enviar imagem, tente novamente</p>";
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>