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
            <a href="painel_adm.php"><li>Painel</li></a>
            <a href="painel_usuarios.php"><li>Usuario</li></a>
            <a href="painel_produtos.php"><li>Produtos</li></a>
            <a href="painel_novidades.php"><li>Novidades</li></a>
        </ul>
    </header>

    <!--formulário da página que irei estilziar com bootstrap -->

    <section>
        <div>
            <h4>Criar cadastro</h4>
            <!--Inicio do formulário-->
            <form class="row g-3" action="cadastro_usuario_adm_salvar.php" method="post">

                <!--Nome-->

                <div class="col-md-6" style= "width: 400px;">
                  <label for="inputText" class="form-label">Nome</label>
                  <input type="text" class="form-control" name="nome" id="nome">
                </div>

                <!--Data de Nascimento-->

                <div class="md-6"  style= "width: 400px";>
                  <label for="inputData" class="form-label">Data de Nascimento</label>
                  <input type="date" class="form-control" name="data" id="data">
                </div>

                <!--Email-->

                <div class="col-md-6" style= "width: 400px";>
                  <label for="inputEmail4" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="email@email.com">
                  <small id="emailInfo" class="form-text text-muted">Por questão de segurança não compartilhe o e-mail cadastrado com ninguém.</small>
                </div>

                <!--Senha-->

                <div class="col-md-6" style= "width: 400px";>
                  <label for="inputPassword4" class="form-label">Senha</label>
                  <input type="password" class="form-control" name="password" id="password">
                  <small id="emailInfo" class="form-text text-muted">Por questão de segurança não compartilhe a senha cadastrada com ninguém.</small>
                </div>


                  <h4 style= "margin-top: 80px;">Informações da Residência</h4>

                <!--Endereço-->
                
                <div class="col-6" style= "width: 400px; margin-top: 30px;";>

                  <label for="inputAddress" class="form-label">Endereço</label>
                  <input type="text" class="form-control" name="end" id="end" placeholder="Rua das margaridas, n° 123">
                </div>

                <div class="col-6" style= "width: 400px; margin-top: 30px;";>
                  <label for="inputAddress2" class="form-label">Complemento</label>
                  <input type="text" class="form-control" name="complemento" id="complemento" placeholder="Apartamento 4">
                </div>

                <!-- UF-->
                <div class="col-md-4" style= "width: 400px; margin-top: 30px;";>
                  <label for="inputState" class="form-label">Estado</label>
                  <select name="estado" id="estado" class="form-select">
                    <option selected>Selecione...</option>
                    <option>RO</option>
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
                    <option>RJ</option>
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
                  <input type="text" class="form-control" name="cidade" id="cidade">
                </div>
                <br>

                <!--CEP-->
                <div class="col-md-4" style= "width: 200px; margin-top: 30px;";>
                  <label for="inputZip" class="form-label">CEP</label>
                  <input type="text" class="form-control" name="cep" id="cep" placeholder="00000-000">
                </div>
                <br>

                <!--Final-->
                </div>
                <div class="col-12">
                  <br>
                  <button type="submit" class="btn btn-warning"> Enviar </button>
                  <a href="painel_usuarios.php" class="btn btn-outline-secondary" role="button" >Voltar</a>
                </div>
              </form>
        
        <!--Fim do formulário-->
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>