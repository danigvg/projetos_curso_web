<? require_once "validador_acesso.php" ?>
<?php

    //Abrir o arquivo para ler
    $arquivo_form = fopen('formulario.txt' , 'r');
    $dados_chamados = array();
    //enquanto houver linhas a a serem recuperadas fara o seguinte
    //feof >> função nativa que indentifica o final do arquivo, retornando so ao final do arquivo true
    while(!feof($arquivo_form)){
      $dados_arquivo_form = fgets($arquivo_form);
      $chamados[] = $dados_arquivo_form;
    }
    $dado_vazio = array_pop($chamados);
    //fechar o arquivo aberto;
    fclose($arquivo_form);

?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

   <? include "menu.php"; ?>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
            <? foreach($chamados as $chamado) { ?>
              <?php               
                $chamado_dados = explode('#', $chamado);

                if($_SESSION['perfil_id'] == 2){
                  if($_SESSION['id'] != $chamado_dados[0]){
                    continue;
                  }
                }
                
              ?>

              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?=$chamado_dados[1]?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?=$chamado_dados[2]?></h6>
                  <p class="card-text"><?=$chamado_dados[3]?></p>

                </div>
              </div>

            <? } ?>
           
              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>