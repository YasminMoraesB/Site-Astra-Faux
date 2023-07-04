<?php 
    if(!isset($_SESSION)){
        session_start();
        
        if($_SESSION != NULL){
            $nomeUsuario = $_SESSION['nome'];

            echo "<p style = 'color:black'> Usuário Logado: ";
            echo $nomeUsuario;
            echo '<p><a href="logoff.php"> Logout</a></p>';	
        }else{
            $nomeUsuario = NULL;
        }
    }
                
         
?>


<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  href="style/novidades.css" rel="stylesheet">
    <link href="style/Fonts.css" rel="stylesheet">
    <title>Novidades</title>
</head>
    <header>
        <div id="title">
            <h1>Astra Faux</h1>
        </div>
        <!--Páginas principais de navegação-->

        <ul>
            <a href="index.php"><li>Inicio</li></a>
            <a href="sobre.php"><li>Sobre</li></a>
            <a href="produtos.php"><li>Produtos</li></a>
            <a href="novidades.php"><li>Novidades</li></a>
        </ul>
    </header>
<body>
<?php
        include('conexao.php');

        $query = "SELECT * FROM novidade ORDER BY NOW()";
        $result = mysqli_query($mysqli, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $titulo = $row['titulo'];
            $texto = $row['texto'];
            $autor = $row['autor'];
            $dataFormatada = $row['data_da_publicacao'];
            

            echo "<div class='container'>";
            echo "<h3>$titulo</h3>";
            echo "<p>$texto</p>";
            echo "<p>$autor</p>";
            echo "<p>Data: $dataFormatada</p>";
            echo "</div>";
        }
    ?>
</body>
</html>
