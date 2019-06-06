<!DOCTYPE html>
<html>
<head>
    <title>Cadastre-se</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Page-->

    <link rel="shortcut icon" href="favicon.ico" />
        <!-- Fontfaces CSS-->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Bootstrap JS-->
         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

        <script src="js/jquery.inputmask.bundle.js"></script>
        

</head>
<body><div class="container col-md-12">
    <div class="row">
        <div class="col-sm-9 col-md-12 col-lg-6      my-5  mx-auto" >
            <div class="card card-signin  " style="box-shadow: 10px 10px 5px -4px rgba(0,0,0,0.75);">
                      <center><img id="logo" style="width: 60%; margin-top: 1em;" class="position-auto" src="img/logo.png"></center>
                <div class="card-body  col-md-12 col-lg-12">
                   
                        <form method="post" action="cliente_save.php" class="">
                              <?php if ($_GET['result'] == 'sucesso_na_insercao') { ?>
                                        <div class="alert alert-success" role="alert">
                                             SUCESSO NO CADASTRO DO CLIENTE!
                                        </div>  
                              <?php }?>
                                <?php if ($_GET['result'] == 'falha_na_insercao') { ?>
                                        <div class="alert alert-danger" role="alert">
                                             FALHA NO CADASTRO DO CLIENTE
                                        </div>  
                              <?php }?>
                              <?php if ($_GET['result'] == 'falta_parametros') { ?>
                                        <div class="alert alert-danger" role="alert">
                                             PREENCHA TODOS OS CAMPOS PARA REALIZAR O CADASTRO
                                        </div>  
                              <?php }?>
                            <div class="form-label-group">
                                <label for="nome" class="text-center">Nome </label>
                                <input type="text" class=" form-control" name="nome" placeholder="Ex: jose da silva">
                            </div>
                                <div class="form-label-group">
                                    <label for="nome" class="text-center">Telefone </label>
                                    <input type="text" id="user_telefone" class="form-control" name="telefone" placeholder="Ex:(00) 0000-0000">
                                </div>
                                
                                <div class="form-label-group ">
                                    <label id="cpf" class="text-center" for="user_cpf" >CPF/CNPJ</label>
                                    <input id="user_cpf" class="form-control user_cpf" type="text" name="cnpj/cpf" value="" required placeholder="a" maxlength="20" id="user_cpf">
                                   
                                <div class="form-label-group ">
                                    <label for="inputMatricula" class="text-center">Cidade</label>
                                    <input type="text" class=" form-control " name="cidade" placeholder="Ex: Santa Cruz">
                                  
                                </div>
                            </div>
                            <div class="row">
                            <div class="form-label-group col-md-6">
                                <label for="email" style="" class="text-center">Selecione o Estado</label>
                               <select name="estado" class=" form-control" style="">
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                    <option value="ES">Estrangeiro</option>
                                 </select>
                               
                            </div>
                            <div class="form-label-group ml-3 col-md-5">
                                  <label class="text-center" for="user_telefone">Tipo de pessoa</label><br>
                                    <input type="radio" class="" name="tipo_pessoa" value="fisica">Fisica
                                    <input type="radio" class="ml-4" name="tipo_pessoa" value="juridica">Juridica
                               </div>
                         </div>
                                <div class="form-label-group ">
                                    <label class="text-center" for="senha">E-mail</label>
                                    <input type="text"  class="form-control" name="email" placeholder="Ex: saojoao@saojoao.com"></br>
                                    <label class="text-center" for="senha">Informacoes adicionais</label>
                                    <textarea maxlength="254" name="info_adicionais" class="form-control"></textarea></br>
                                </div>
                                <input type="hidden" name="created_at" value="<?php echo date('Y-m-d'); ?>" readonly="readonly">
                                <button class="btn btn-lg btn-warning btn-block text-uppercase" id="enviar" type="submit">
                                Cadastrar
                                </button>                   
                        </div>
                    </form>
                    <div class="custom-control custom-checkbox mb-3">
                        <a href="/" style="text-decoration: none;">
                            <button style="float: right;"  class="btn btn-info text-uppercase" id="enviar" type="submit">
                                Voltar
                            </button>  
                        </a>                 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src='js/script.js'>
            
</script>
</body>
<style type="text/css">
    
    div#index {
        margin: 0px 25px 0px 25px;
    }
    div#titulo h1{
        color: #666;
    }
    .form-row, .form-group{
        text-align: left;
    }
    body{
        background: #666;
  background: linear-gradient(to right, #DBA901,#F5DA81,#F5DA81,#DBA901 );
    }
     label{
        border-bottom: 1px solid #DBA901;
    }
</style>
</html>