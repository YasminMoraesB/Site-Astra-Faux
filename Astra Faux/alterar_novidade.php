<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="style/cadastro.css"rel="stylesheet">
    <link href="style/Fonts.css" rel="stylesheet">
 
    
    <title>Alterar Novidade</title>
    
</head>
<body>
<header>
        <div id="title">
            <h1>Astra Faux</h1>
        </div>
        <!--Páginas principais de navegação-->

        <ul>
            <a href="painel_adm.php"><li>Painel</li></a>
            <a href="painel_usuarios.php"><li>Usuario</li></a>
            <a href="painel_produtos.php"><li>Produtos</li></a>
            <a href="painel_novidades.php"><li>Novidades</li></a>
        </ul>
    </header>

    <!--formulário da página que irei estilziar com bootstrap -->

    <?php 
  
        if(!empty($_GET['id'])){
        include('conexao.php');

        $id = $_GET['id'];

        $sqli = "SELECT * FROM novidade WHERE id=$id";
        $resultado = $mysqli-> query ($sqli);

        if($resultado -> num_rows > 0){

            while($dadoNovidade = mysqli_fetch_assoc($resultado)){

                //Nome da variavel | Variavel pra pegar o nome das colunas | nome da coluna no banco de dados
                
                $titulo = $dadoNovidade['titulo'];
                $autor = $dadoNovidade['autor'];
                $texto = $dadoNovidade['texto'];
            }
        }
        else{
            header('Location: consultar_novidade.php');
        }
  }
?>


    <section>
        <div>
            <h4>Alterar Novidade</h4>
            <!--Inicio do formulário-->
            
            
            <form class="row g-3" action="salvarCadastro_novidade.php" method="post">

                <!-- Titulo da novidade-->
            <div class="col-md-6" style= "width: 400px;">
                  <label for="inputText" class="form-label">Título</label>
                  <input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo $titulo?>" >
                </div>

                <!--Autor da novidade-->
            <div class="col-md-6" style= "width: 400px;">
                  <label for="inputText" class="form-label">Autor</label>
                  <input type="text" class="form-control" name="autor" id="autor"value = "<?php echo $autor?>">
                </div>
            <br>


            <!--Area de texto-->
            <div class="form-row" style= "width: 400px">
                    <label for="textarea">Texto</label>
                    <textarea class="form-control" id="textArea" name="textArea" rows="3" ><?php echo $texto?></textarea>
                </div>          
            <div class="col-12">
                  <br>
                  <button type="submit" class="btn btn-warning"> Enviar </button>
                  <a href="painel_novidades.php" class="btn btn-outline-secondary" role="button" >Voltar</a>
                </div>
              </form>
              </form>
        
        <!--Fim do formulário-->
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>