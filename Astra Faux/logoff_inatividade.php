<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" contet="IE=edge">
    <link  href="style/style.css" rel="stylesheet">
    <link href="style/Fonts.css" rel="stylesheet">
    
    <title>Logout</title> 

</head>


<body>
    <header>
        <div id="title">
            <h1 class="navFont">Astra Faux</h1>
        </div>
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
            echo "<script>alert('Devido a inatividade você esta sendo deslogado por questões de segurança');";
            echo "javascript:window.location='index.php';</script>";
            echo '<br>';
        }
    ?>
    
    

</body>
</html>