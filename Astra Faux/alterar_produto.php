<?php

include ('conexao.php');

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    die();
} else {
    echo "<p style='color:rgb(132, 14, 201)'> Usuário Logado: ";
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
    <link href="style/cadastro.css" rel="stylesheet">
    <link href="style/Fonts.css" rel="stylesheet">


    <title>Alterar produto</title>

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
            <h1>Astra Faux</h1>
        </div>
        <!--Páginas principais de navegação-->

        <ul>
            <a href="painel_adm.php">
                <li>Painel</li>
            </a>
            <a href="painel_usuarios.php">
                <li>Usuario</li>
            </a>
            <a href="painel_produtos.php">
                <li>Produtos</li>
            </a>
            <a href="painel_novidades.php">
                <li>Novidades</li>
            </a>
        </ul>
    </header>

    <!--formulário da página que irei estilziar com bootstrap -->

    <?php

    if (!empty($_GET['id'])) {
        include('conexao.php');

        $id = $_GET['id'];

        $sqli = "SELECT * FROM produto WHERE id=$id";
        $resultado = $mysqli->query($sqli);

        if ($resultado->num_rows > 0) {

            while ($dadoProduto = mysqli_fetch_assoc($resultado)) {

                //Nome da variavel | Variavel pra pegar o nome das colunas | nome da coluna no banco de dados
                $id = $dadoProduto["id"];
                $nome = $dadoProduto["nome"];
                $qtd = $dadoProduto["qtd"];
                $descricao = $dadoProduto["descricao"];
                $valor = $dadoProduto["valor"];
                $caminhoImg = $dadoProduto["caminho_da_img"];
            }
        } else {
            header('Location: consultar_produto.php');
        }
    }

    ?>
    <section>
        <div>
            <h4>Editar Produto</h4>
            <!--Inicio do formulário-->
            <form class="row g-3" action="" method="post" enctype="multipart/form-data">

                <!--ID-->

                <div class="col-md-6" >
                    <label for="inputText" class="form-label">ID</label>
                    <input class="form-control" id="id" name="id" type="text" value="<?php echo $id ?>" readonly>
                    <small id="IdInfo" class="form-text text-muted">O ID não pode ser modificado pois pode acarretar em falhas no sistema</small>
                </div>

                <!--Nome-->

                <div class="col-md-6" style="width: 400px;">
                    <label for="inputText" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $nome ?>">
                </div>

                <!--Quantidade-->
                <div class="form-group" style="width: 200px;">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" class="form-control" id="qtd" name="qtd" value="<?php echo $qtd ?>" min="0" step="1">
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

                <div class="form-row">
                    <label for="FormControlTextarea">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="3"><?php echo $descricao ?></textarea>
                </div>

                <!--Imagem-->
                <div class="form-group">
                    <h6>Imagem do produto</h6>
                    <img height="200px" src="<?php echo "./" . $caminhoImg ?>" alt="Imagem do produto">
                    <br><br>
                    <input type="file" class="form-control-file" id="imagem" name="imagem">
                </div>

                <!--Final-->
                </div>
                <div class="col-12">
                    <br>
                    <button type="submit" class="btn btn-warning" id="update" name="update"> Enviar </button>
                    <a href="consultar_produto.php" class="btn btn-outline-secondary" role="button">Voltar</a>
                </div>
            </form>

            <!--Fim do formulário-->
    </section>

    <?php
        if (isset($_POST['update'])) {
            $id = $_POST["id"];
            $nome = $_POST["nome"];
            $quantidade = $_POST['qtd'];
            $valor = $_POST['valor'];
            $descricao = $_POST['descricao'];

            if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
                $imagem = $_FILES['imagem'];

                $pasta = "img_produto/";

                $nomeImagem = $imagem['name'];
                $novoNomeImagem = uniqid();
                $extensaoImagem = strtolower(pathinfo($nomeImagem, PATHINFO_EXTENSION));

                if ($extensaoImagem != 'jpg' && $extensaoImagem != 'png') {
                    die("Tipo de arquivo não aceito, apenas imagens em jpg e png são aceitas.");
                }

                $caminhoNovaImagem = $pasta . $novoNomeImagem . '.' . $extensaoImagem;
                $imagem_banco = move_uploaded_file($imagem['tmp_name'], $caminhoNovaImagem);

                if ($imagem_banco) {
                    // Consultando o caminho da imagem antiga para poder fazer a alteração das imagens
                    $consultaImagemAntiga = $mysqli->query("SELECT caminho_da_img FROM produto WHERE id = $id");
                    if ($consultaImagemAntiga && $consultaImagemAntiga->num_rows > 0) {
                        $dadosImagemAntiga = $consultaImagemAntiga->fetch_assoc();
                        $imagemAntiga = $dadosImagemAntiga['caminho_da_img'];

                        // Desvinculando a imagem antiga e excluindo o arquivo correspondente
                        if (!empty($imagemAntiga) && file_exists($imagemAntiga)) {
                            unlink($imagemAntiga);
                        }
                    }

                    $mysqli->query("UPDATE produto SET
                                nome = '$nome',
                                qtd = '$quantidade',
                                descricao = '$descricao',
                                valor = '$valor',
                                caminho_da_img = '$caminhoNovaImagem'
                            WHERE id = $id") or die($mysqli->error);

                    echo "<script>alert('Dados do produto atualizados com sucesso!');</script>";
                    echo "<script>window.location='consultar_produto.php';</script>";
                } else {
                    echo "<p>Erro ao enviar imagem, tente novamente</p>";
                }
            } else {
                $mysqli->query("UPDATE produto SET
                            nome = '$nome',
                            qtd = '$quantidade',
                            descricao = '$descricao',
                            valor = '$valor'
                        WHERE id = $id") or die($mysqli->error);

                echo "<script>alert('Dados do produto atualizados com sucesso!');</script>";
                echo "<script>window.location='consultar_produto.php';</script>";
            }
        }
    ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

</body>

</html>
