<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel = "stylesheet" href = "style.css">
    <title>Cadastro de Clientes</title> 
</head>
<body>

    <?php

        //Pegando as informacoes do forms e colocando em variaveis
        include("conexao.php");

        $nome = $_POST["nome"];

        //Senha e Criptografia da Senha
        $senha = $_POST["password"];
        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);


        $data = $_POST["data"];
        $dataFormatada = date('Y-m-d', strtotime($data));
        $email = $_POST["email"];
        $end = $_POST["end"];
        $comple = $_POST["complemento"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $cep = $_POST["cep"];
        $mensagem;

        
        //Criacao do comando sql pra insercao no Banco de Dados
        $sqli = "INSERT INTO usuario 
                    (nome, senha, data_de_nascimento, email, endereco, complemento, cidade, estado, cep)  
                VALUES 
                    ('$nome','$senhaCriptografada', '$dataFormatada', '$email', '$end', '$comple', '$cidade', '$estado', '$cep') ";

        
        //Se o cadastro for feito com sucesso 
        if($mysqli->query($sqli)){
            echo "<script>alert('Conta criada com sucesso!');";
            echo "javascript:window.location='index.php';</script>";


        } else {
            echo ("Falha na execução");

        }



    ?>
    
</body>
</html>
