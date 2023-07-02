<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="style/cadastro.css"rel="stylesheet">
    <link href="style/Fonts.css" rel="stylesheet">
 
    
    <title>Cadastro</title>
    
</head>
<body>
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

    <!--formulário da página que irei estilziar com bootstrap -->
    
    <?php 
  
          if(!empty($_GET['id'])){
              include('conexao.php');
  
              $id = $_GET['id'];
  
              $sqli = "SELECT * FROM usuario WHERE id=$id";
              $resultado = $mysqli-> query ($sqli);
  
              if($resultado -> num_rows > 0){
  
                  while($dadoUsuario = mysqli_fetch_assoc($resultado)){
  
                      //Nome da variavel | resultado dentro do nome da variavel de array | nome da coluna no banco de dados
                      $nome = $dadoUsuario["nome"];
                      $data = $dadoUsuario["data_de_nascimento"];
                      $email = $dadoUsuario["email"];
                      $endereco = $dadoUsuario["endereco"];
                      $complemento = $dadoUsuario["complemento"];
                      $cidade = $dadoUsuario["cidade"];
                      $estado = $dadoUsuario["estado"];
                      $cep = $dadoUsuario["cep"];
                  }
  
              }else{
                  header('Location: consultar_usuario.php');
              }
          }
  
      ?>
    <section>
        <div>
            <h4>Editar usuario</h4>
            <!--Inicio do formulário-->
            <form class="row g-3" action="salvarAlt_usuario.php" method="post">

                <!--Nome-->

                <div class="col-md-6" style= "width: 400px;">
                  <label for="inputText" class="form-label">Nome</label>
                  <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $nome?>">
                </div>

                <!--Data de Nascimento-->

                <div class="md-6"  style= "width: 400px";>
                  <label for="inputData" class="form-label">Data de Nascimento</label>
                  <input type="date" class="form-control" name="data" id="data" value="<?php echo $data?>">
                </div>

                <!--Email-->

                <div class="col-md-6" style= "width: 400px";>
                  <label for="inputEmail4" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="email" value="<?php echo $email?>">
                  <small id="emailInfo" class="form-text text-muted">Evite modificar o email do usuario pois pode acarretar falhas na comunicação</small>
                </div>

                <!--Senha-->

                  <h4 style= "margin-top: 80px;">Informações da Residência</h4>

                <!--Endereço-->
                
                <div class="col-6" style= "width: 400px; margin-top: 30px;";>

                  <label for="inputAddress" class="form-label">Endereço</label>
                  <input type="text" class="form-control" name="end" id="end" value="<?php echo $endereco?>">
                </div>

                <div class="col-6" style= "width: 400px; margin-top: 30px;";>
                  <label for="inputAddress2" class="form-label">Complemento</label>
                  <input type="text" class="form-control" name="complemento" id="complemento" value="<?php echo $complemento?>">
                </div>

                <!-- UF-->
                <div class="col-md-4" style= "width: 400px; margin-top: 30px;";>
                  <label for="inputState" class="form-label">Estado</label>
                  <select name="estado" id="estado" class="form-select">
                    <option <?php echo ($estado == 'RO') ? 'checked' : ''?>>RO</option>
                    <option>AC</option>
                    <option>AM</option>
                    <option>RR</option>
                    <option>PA</option>
                    <option>AP</option>
                    <option>TO</option>
                    <option>MA</option>
                    <option>PI</option>
                    <option>CE</option>
                    <option>RN</option>
                    <option>PB</option>
                    <option>PE</option>
                    <option>SE</option>
                    <option>BA</option>
                    <option>MG</option>
                    <option>ES</option>
                    <option <?php echo ($estado == 'RJ') ? 'checked' : ''?>>RJ</option>
                    <option>SP</option>
                    <option>PR</option>
                    <option>SC</option>
                    <option>RS</option>
                    <option>MS</option>
                    <option>MT</option>
                    <option>GO</option>
                    <option>DF</option>
                  </select>
                </div>

                <!--Cidade-->
                <div class="col-md-4" style= "width: 200px; margin-top: 30px;";>
                  <label for="inputCity" class="form-label">Cidade</label>
                  <input type="text" class="form-control" name="cidade" id="cidade" value="<?php echo $cidade?>">
                </div>
                <br>

                <!--CEP-->
                <div class="col-md-4" style= "width: 200px; margin-top: 30px;";>
                  <label for="inputZip" class="form-label">CEP</label>
                  <input type="text" class="form-control" name="cep" id="cep" value="<?php echo $cep?>">
                </div>
                <br>

                <!--Final-->
                </div>
                <div class="col-12">
                  <br>
                  <button type="submit" class="btn btn-warning" id="update" name="update"> Enviar </button>
                  <a href="consultar_usuario.php" class="btn btn-outline-secondary" role="button" >Voltar</a>
                </div>
              </form>
              
        
        <!--Fim do formulário-->
    </section>


            
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>