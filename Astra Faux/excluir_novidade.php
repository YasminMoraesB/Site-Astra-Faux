<?php

//Controle de sessão do ADMIN, apenas ele tem acesso a essa pagina pelo URL, outros users a tela fica Branca e sem opção de interação
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
        <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
        <title>Confirmar exclusao</title>
    </head>

    <body>


        <?php 

            include ('conexao.php');
            $id = $_GET['id'];
  
            $sqli = "SELECT titulo FROM novidade WHERE id=$id";
            $resultado = $mysqli-> query ($sqli);
            $dadoNovidade = mysqli_fetch_assoc($resultado);

            $titulo = $dadoNovidade['titulo'];
        ?>


        <div class="jumbotron mx-auto" style="max-width:850px">
            <h3 class="display-4">Deseja confirmar a Exclusão?</h3>
            
            <form action="deletar_novidade.php" method="get">
                <div class="row">
                    <!--ID-->
                    <div class="col" style="max-width:200px">
                        <small>ID</small>
                        <input type="text" class="form-control" name ="id" id= "id" value="<?php echo $id?>" readonly>
                    </div>
                    
                    <!--Nome-->
                    <div class="col" style="max-width:500px">
                        <small>Titulo</small>
                        <input type="text" class="form-control" name = "titulo" id ="titulo" value="<?php echo $titulo?>" readonly>
                    </div>
                </div>

                <br>
                <p class="lead" style="max-width:650px"><b>OBS.: </b> Ao confirmar a exclusão <b>esta novidade será permanentemente excluída</b>, não sendo possivel recupera-los posteriormente, confirme abaixo se realmente deseja prosseguir com a exclusão.</p>
                
                <a class="btn btn-primary" type = "submit" href="deletar_novidade.php?id=<?php echo $id ?>" role="button">Confirmar</a>
                <a class="btn btn-outline-danger" href="consultar_novidade.php" role="button">Não</a>

            </form>

    
           
        </div>


        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="assets/js/bootstrap.min.js"></script>
    </body>

    </html>
