<?php

//Controle de sessão do ADMIN, apenas ele tem acesso a essa pagina pelo URL, outros users a tela fica Branca e sem opção de interação
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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
        <title>Confirmar exclusao</title>
    </head>

    <body>


    <?php
include('conexao.php');

if (!empty($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    // Usando consulta preparada para evitar SQL injection e garantir a segurança do Banco de Dados
    $consulta = $mysqli->prepare("SELECT * FROM produto WHERE id = ?");
    $consulta->bind_param("i", $id);
    $consulta->execute();
    $resultado = $consulta->get_result();

    //Pasta das imagens do Produtos
    $pasta = "img_produto\\";

    if ($resultado->num_rows > 0) {
        $dadosProduto = $resultado->fetch_assoc();
        $caminhoImagem = $dadosProduto['caminho_da_img'];

        // Excluir o arquivo de imagem usando o dirname pra pegar uma parte do caminho absoluto e dps juntando o caminho imagem com ele pra ter esse camnho
        if (!empty($caminhoImagem)) {
            $diretorioImagens = str_replace('/', '\\', dirname(__FILE__)) . "\\";
            $caminhoAbsoluto = $diretorioImagens . $caminhoImagem;
            $caminhoAbsoluto = str_replace('/', '\\', $caminhoAbsoluto);

            if (file_exists($caminhoAbsoluto)) {
                unlink($caminhoAbsoluto);
                // Usando consulta preparada para a exclusão
                $exclusao = $mysqli->prepare("DELETE FROM produto WHERE id = ?");
                $exclusao->bind_param("i", $id);
                $exclusao->execute();

                //Confirmação e redirecionamento após a exclusão
                echo "<script>alert('Exclusão feita com sucesso!');";
                echo "javascript:window.location='consultar_produto.php';</script>";
            } else {
                echo "O arquivo de imagem não existe: " . $caminhoAbsoluto ;
                echo "Por isso nao conseguimos prosseguir com a exclusão";
            }
        }

        
    } else {
        echo "<script>alert('Erro ao excluir dados');";
        echo "javascript:window.location='consultar_produto.php';</script>";
    }
}
?>









        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="assets/js/bootstrap.min.js"></script>
    </body>

    </html>

