<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" contet="IE=edge">
    
    <title>Logout</title> 

</head>
  
    <?php 
        if(!isset($_SESSION)){
            session_start();
        }
   
        if($_SESSION){
            session_unset();
            session_destroy();
        }

        if(!$_SESSION){
            echo "<script>alert('Logout com sucesso!');";
            echo "javascript:window.location='index.php';</script>";
            echo '<br>';
        }
    ?>
    
</html>