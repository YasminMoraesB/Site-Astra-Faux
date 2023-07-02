<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novidades</title>
</head>
    <header>
        <div id="title">
            <h1>Astra Faux</h1>
        </div>
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
        <!--Páginas principais de navegação-->

        <ul>
            <a href="index.php"><li>Inicio</li></a>
            <a href="sobre.php"><li>Sobre</li></a>
            <a href="produtos.php"><li>Produtos</li></a>
            <a href="novidades.php"><li>Novidades</li></a>
        </ul>
    </header>
<body>
    EM CONSTRUÇÃO...
</body>
</html>


<?php 
    if(!isset($_SESSION)){
        session_start();		
    }
                
    if (!isset($_SESSION['nome'])){
        die ();
    } else {
        echo "<p style = 'color:black'> Usuário Logado: ";
                    echo $_SESSION['nome'];
                    echo '<p><a href="logoff.php"> Logout</a></p>';
    }     
?>