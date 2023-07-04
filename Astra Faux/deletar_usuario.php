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


    <?php
        include('conexao.php');

        if (!empty($_GET['id'])) {
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

            // Usando consulta preparada para evitar SQL injection e garantir a segurança do Banco de Dados
            $consulta = $mysqli->prepare("SELECT * FROM usuario WHERE id = ?");

            //Aqui esta associando o $id , esse i é de Inteiro e isso tudo é associado ao objeto consulta que será executado na proxima linha e o resultado na proxima
            $consulta->bind_param("i", $id);
            $consulta->execute();

            //Aqui retorna um objeto com o Resultado da Consulta, ou seja, estamos fazendo a consulta com ajuda do Paradigma de POO
            $resultado = $consulta->get_result();

            //Se o resultado for Maior que 0 é que existe o registro
            if ($resultado->num_rows > 0) {
                // Usando consulta preparada para a exclusão
                $exclusao = $mysqli->prepare("DELETE FROM usuario WHERE id = ?");
                $exclusao->bind_param("i", $id);
                $exclusao->execute();

                //Confirmação e Redirecionamento após a exclusão
                echo "<script>alert('Exclusão feita com sucesso!');";
                echo "javascript:window.location='consultar_usuario.php';</script>";

                //Esse else é caso nao tenha o ID na tabela
            } else {
                echo "<script>alert('Erro ao Excluir dados');";
                echo "javascript:window.location='consultar_usuario.php';</script>";

            }
        }

    ?>

        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="assets/js/bootstrap.min.js"></script>
    </body>

    </html>

