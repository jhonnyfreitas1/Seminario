<?php 
if (!$_GET['id']) {
    header('location:/');
}
include 'init.php';
$id = $_GET['id'];
		$conn = getConn();
		$query = $conn -> prepare('SELECT * FROM users WHERE cliente_id=?');
		$query -> bindValue(1,$id);
		 $query -> execute();
		 $resultado = $query -> fetch(PDO::FETCH_ASSOC);	
?>  
<!DOCTYPE html>
<html>
<head>
	<title>Cliente</title>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head> 
 <body>
 	<div id="tabela">
		<center>
			<table class="fixed-center  table table-hover col-md-10 border border-dark m-2" id='resultados'>
			  <thead class="thead-dark">
				   <tr>
				      <th class="border border-dark" scope="">Dados do Cliente</th>
				      <th class="border border-dark" class="col-md-8" scope="col"><label style="color:#babaca;">Cliente criado em</label> <?php echo $resultado['created_at']; ?></th>
				    </tr>
				    <tbody> 
					    <tr>
					   
					      <th class="border border-dark" scope="row">Nome do cliente</th>
					      <td id="suarendaanual"><?= $resultado['nome']; ?> </td>  
					    </tr>
					    <tr>
					      <th class="border border-dark" scope="row">Telefone do clinete</th>
					      <td  id="irrf"><?= $resultado['telefone']?></td>  
					    </tr>
					    <tr>
					      <th class="border border-dark" scope="row">Cidade do cliente</th>
					      <td id="seusdebitos"><?= $resultado['cidade']?></td>  
					    </tr>

					    <tr>
					      <th class="border border-dark" scope="row">Estado (UF)</th>
					      <td id="basedecalculo"><?= $resultado['estado']?></td>  
					    </tr>
					    <tr>
					      <th  class="border border-dark" scope="row">E-mail do cliente</th>
					      <td id="eliquota"><?= $resultado['email']?></td>  
					    </tr>
					    <tr>
					      <th class="border border-dark" scope="row">Tipo de Pessoa</th>
					      <td  id="impostoir"><?= 'Pessoa '.$resultado['pessoa_tipo']?></td>  
					    </tr>
					     <tr>
					      <th class="border border-dark" scope="row">Cpf ou cpnj do cliente</th>
					      <td  id="deducao"><?= $resultado['cpf_cnpj']?></td>  
					    </tr>
					      <tr id="vai">
					      <th class="border border-dark " scope="row">Informacoes adicionais</th>
					      <td  class=' border border-dark' id="impostorest"><?= $resultado['info_adicionais']?></td>  
					      <a name="ancora1" id="ancora1"></a>
					    </tr>
				    </tbody>
			    </thead>
			</table>
			<a class="btn btn-primary" style="float:right; margin-right:10em;" href="index.php">Voltar</a>
		 </center>
		
	</div>

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