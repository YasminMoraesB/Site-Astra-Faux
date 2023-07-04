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
    <!-- Meta tags Obrigat�rias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Consultar Novidades</title>

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
        <br><br>
        <h1 class='ml-3'> Consultar Novidades</h1>
        <p class='ml-3'> I- Para uma busca por título <b style = "color:rgb(132, 14, 201)">digite o título da matéria</b> na barra de busca e <b style = "color:rgb(132, 14, 201)">clique em pesquisar</b></p>
        <p class='ml-3'> II- Para mostrar todos os registros <b style = "color:rgb(132, 14, 201)">deixe a barra de busca vazia e clique em pesquisar</b></p>
    </header>

    <form action="">    
        <input style="width:300px; margin-left: 15px; " name="busca" placeholder="Digite um título para pesquisar" type="text">
        <button type="submit" class="btn btn-primary">Pesquisar</button>
        <a class="btn btn-outline-dark" href="painel_novidades.php" role="button">Voltar ao painel</a>
    </form>



    <?php

        include("conexao.php");

        
            //Criando o nome de cada Coluna, usando Bootstrap junto
            echo "<table class = 'table table-striped table-bordered '>";
            echo "<thead class='thead-dark'>";
            
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Título</th>";
            echo "<th>Texto</th>";
            echo "<th>Autor</th>";
            echo "<th>Data da Publicação</th>";
            echo "<th>Ações</th>";
            echo "</tr>";

            echo "</thead>"; 

        if(!isset($_GET ['busca'])){
            $sqli = "SELECT * FROM novidade";
            $resultado = $mysqli->query($sqli) or die ("Erro ao consultar dados");
        } else {

            // Por questão de segurança e para evitar a injeção no banco de dados é feito esse comando real_escape_string

            $busca = $mysqli ->real_escape_string ($_GET['busca']);
            $sqlBusca = "SELECT * FROM novidade WHERE titulo LIKE '%$busca%'";
            $resultado = $mysqli->query($sqlBusca) or die ("Erro ao consultar dados");

            if ($resultado ->num_rows ==0 ){
                echo "<td>Nenhum resultado encontrado</td>";
            }else {    
                while ($dados = $resultado->fetch_assoc()){
                
                
                echo "<tr>";
                echo "<td>".$dados['id']. "</td>";
                echo "<td>".$dados['titulo']. "</td>";
                echo "<td>".$dados['texto']. "</td>";
                echo "<td>".$dados['autor']. "</td>";
                //Transformando a Data do Banco cujo formato é YYYY/MM/DD para o formato que conhecemos DD/MM/YYYY
                echo "<td>".$dataFormatada = date("d/m/Y", strtotime($dados['data_da_publicacao'])). "</td>";

                

                echo "<td>
                    <a class='btn btn-primary' href='alterar_novidade.php?id=$dados[id]'>Editar</a>
                    <a class='btn btn-danger' href='excluir_novidade.php?id=$dados[id]'>Excluir</a>
                </tr>";


                }

            }
            
        }

        echo "</table>";
    
    ?>
    
</body>
</html>