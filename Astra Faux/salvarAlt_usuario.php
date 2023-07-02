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
    <title>Editar cliente</title>
  </head>
  <body>
    <?php 
        include("conexao.php");

        if (isset($_POST['update'])){
            
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $data = $_POST['data'];
            $dataFormatada = date('Y-m-d', strtotime($data));
            $email = $_POST['email'];
            $endereco = $_POST['end'];
            $complemento = $_POST['complemento'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
            $cep = $_POST['cep'];

            $sqliUpdate = "UPDATE usuario SET 
                    nome = '{$nome}', 
                    data_de_nascimento = '{$dataFormatada}',
                    email = '{$email}',
                    endereco = '{$endereco}',
                    complemento = '{$complemento}',
                    cidade = '{$cidade}',
                    estado = '{$estado}',
                    cep = '{$cep}'
 
                WHERE 
                    id = '$id'";

            $resultado = $mysqli->query ($sqliUpdate);

            if ($resultado){
                echo "<script> alert('Editado com Sucesso!');</script>";
                header('Location: consultar_usuario.php');
            
            }else{
                echo "<script> alert('Não foi possivel editar');</script>";
                header('Location: consultar_usuario.php');
            }      
        }

        
    
    ?>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>