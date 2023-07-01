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
    <title>Consultar Usuario</title>

</head>
<body>
    <header>
        <br><br>
        <h1 class='ml-3'> Consultar Usuários</h1>
        <p class='ml-3'> Bem vindo a tela de consultar usuários, aqui você consegue visualizar os dados dos usuários, Editar e Deletar, basta clicar nas opções na coluna de Ações</p>
    </header>

    <form action="">    
        <input name="busca" placeholder="Digite um nome para pesquisar" type="text">
        <button type="submit">Pesquisar</button>
    </form>

    <?php

        include("conexao.php");

        $sqli = "SELECT * FROM usuario";
        $resultado = $mysqli->query($sqli) or die ("Erro ao consultar dados");
        $qtd = $resultado->num_rows;


        if ($qtd > 0){
            //Criando o nome de cada Coluna, usando Bootstrap junto
            echo "<table class = 'table table-striped table-bordered '>";
            echo "<thead class='thead-dark'>";
            
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Nome</th>";
            echo "<th>Senha</th>";
            echo "<th>Data de Nascimento</th>";
            echo "<th>Email</th>";
            echo "<th>Endereço</th>";
            echo "<th>Complemento</th>";
            echo "<th>Cidade</th>";
            echo "<th>Estado</th>";
            echo "<th>CEP</th>";
            echo "<th>Ações</th>";
            echo "</tr>";

            echo "</thead>";  

            //Obtendo os dados por meio de um loop
            while ($row = mysqli_fetch_array ($resultado)){
                
                
                echo "<tr>";
                echo "<td>".$row['id']. "</td>";
                echo "<td>".$row['nome']. "</td>";
                echo "<td>".$row['senha']. "</td>";
                echo "<td>".$row['data_de_nascimento']. "</td>";
                echo "<td>".$row['email']. "</td>";
                echo "<td>".$row['endereco']. "</td>";
                echo "<td>".$row['complemento']. "</td>";
                echo "<td>".$row['cidade']. "</td>";
                echo "<td>".$row['estado']. "</td>";
                echo "<td>".$row['cep']. "</td>";
                echo "<td> 
                        <a class='btn btn-primary' href='alterar_usuario.php?id=$row[id]'>Editar</a>
                        </a>
                        <a class='btn btn-danger' href='excluir_usuario.php?id=$row[id]'>Excluir</a>
                        </a>";
                echo "</tr>";

            }

            echo "</table>";
           
        //Caso não tenha dados cadastros entra aqui
        
        }else{
            echo "<p class='alert alert-danger'>Não existe nenhum registro no Banco de Dados!</p>";
        }

    ?>
    
</body>
</html>