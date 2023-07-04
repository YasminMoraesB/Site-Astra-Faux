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

<?php

        //Pegando as informacoes do forms e colocando em variaveis
        include("conexao.php");

        $titulo = $_POST["titulo"];
        $autor = $_POST["autor"];
        $texto = $_POST["textArea"];

        
        //Criacao do comando sql pra insercao no Banco de Dados
        $sqli = "INSERT INTO novidade
                    (data_da_publicacao, titulo, autor,texto)  
                VALUES 
                    (NOW(), '$titulo','$autor', '$texto') ";

        
        //Se o cadastro for feito com sucesso 
        if($mysqli->query($sqli)){
            echo "<script>alert('Novidade criada com sucesso!');";
            echo "javascript:window.location='painel_novidades.php';</script>";


        } else {
            echo ("Falha na execução");

        }



    ?>