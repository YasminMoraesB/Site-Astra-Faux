<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" contet="IE=edge">
    <link  href="style/style.css" rel="stylesheet">
    <link href="style/Fonts.css" rel="stylesheet">
    
    <title>Login</title> 
    
    <script>
    setTimeout(function() {
      window.location.href = "index.html";
    }, 120000); // Redireciona para index.html após 2min automaticamente
  </script>
</head>


<body>
    <header>
        <div id="title">
            <h1 class="navFont">Astra Faux</h1>
        </div>
        <ul class="navFont">
            <a href="index.html"><li>Inicio</li></a>
            <a href="sobre.html"><li>Sobre</li></a>
            <a href="#"><li>Produtos</li></a>
            <a href="#"><li>Novidades</li></a>
        </ul>
    </header>
         
    <?php 
        if(!isset($_SESSION)){
            session_start();
        }
   
        if($_SESSION){
            session_unset();
            session_destroy();
        }

        if(!$_SESSION){
            echo "<script>alert('Conta criada com sucesso!');";
            echo "javascript:window.location='index.html';</script>";
            echo '<br>';
        }
    ?>
    
    

</body>
</html>