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
        <p class='ml-3'> I- Para uma busca por nome <b style = "color:rgb(132, 14, 201)">digite o nome da pessoa</b> na barra de busca e <b style = "color:rgb(132, 14, 201)">clique em pesquisar</b></p>
        <p class='ml-3'> II- Para mostrar todos os registros <b style = "color:rgb(132, 14, 201)">deixe a barra de busca vazia e clique em pesquisar</b></p>
    </header>

    <form action="">    
        <input name="busca" placeholder="Digite um nome para pesquisar" type="text">
        <button type="submit">Pesquisar</button>
    </form>

    <?php

        include("conexao.php");


        if(!isset($_GET ['busca'])){
            $sqli = "SELECT * FROM usuario";
            $resultado = $mysqli->query($sqli) or die ("Erro ao consultar dados". $mysqli -> error);
        } else {

                   // Por questão de segurança e para evitar a injeção no banco de dados é feito esse comando real_escape_string

            $busca = $mysqli ->real_escape_string ($_GET['busca']);
            $sqlBusca = "SELECT * FROM usuario WHERE nome LIKE '%$busca%'";
            $resultado = $mysqli->query($sqlBusca) or die ("Erro ao consultar dados". $mysqli -> error);

            if ($resultado ->num_rows ==0 ){
                echo "<td>Nenhum resultado encontrado</td>";
            }else {    
                while ($dados = $resultado->fetch_assoc()){
                
                
                echo "<tr>";
                echo "<td>".$dados['id']. "</td>";
                echo "<td>".$dados['nome']. "</td>";
                echo "<td>".$dados['senha']. "</td>";
                echo "<td>".$dados['data_de_nascimento']. "</td>";
                echo "<td>".$dados['email']. "</td>";
                echo "<td>".$dados['endereco']. "</td>";
                echo "<td>".$dados['complemento']. "</td>";
                echo "<td>".$dados['cidade']. "</td>";
                echo "<td>".$dados['estado']. "</td>";
                echo "<td>".$dados['cep']. "</td>";
                
                ?>

                <td> 
                    <a class='btn btn-primary' href='alterar_usuario.php?id=$row[id]'>Editar</a>
                    <a class='btn btn-danger' href='excluir_usuario.php?id=$row[id]'>Excluir</a>
                </tr>
                <?php


                }

            }
            
        }

        echo "</table>";
        



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
           
        //Caso não tenha dados cadastros entra aqui
        

    ?>
    
</body>
</html>