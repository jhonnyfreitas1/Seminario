<!DOCTYPE html>
<html lang="pt-br">
<?php 
include "init.php";
?>
	<head>
		 
		 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<title>Manter</title>
	</head>
	<body style="position:center; background:red;"><center>
			<div class="card card-signin col-md-8  m-4 " style="box-shadow: 10px 10px 5px -4px rgba(0,0,0,0.75);">
		<?php 
	$conn = getConn();
	$busca = "SELECT nome,cliente_id,info_adicionais,pessoa_tipo FROM users  ORDER BY nome DESC";
	$total_reg = "3";
	$pagina=$_GET['pagina'];
	if (!$pagina) {
		$pc = "1";
	}else {
		$pc = $pagina;
	}
	$inicio = $pc - 1;
	$inicio = $inicio * $total_reg;

	$limite = $conn -> query("$busca LIMIT $inicio,$total_reg");
	$todos = $conn -> query("$busca");
	$todos -> execute();
		$tr =  $todos-> rowCount(); // verifica o número total de registros
		$tp = $tr / $total_reg; // verifica o número total de páginas
		?>
 		        
           		 <div class="page-header">

					<h4>Clientes</h4>
				</div>
				<div class="row" style="">
					<?php
		// vamos criar a visualização
		while ($linha1= $limite->fetch(PDO::FETCH_ASSOC)) {
			?>
					<a href="view_user.php?id=<?=$linha1['cliente_id'];?>">
						<div class="col-md-4 col-sm-4 w-25 p-1 col-6">
							<div class='report-module ' style=" border-style: ridge;border-radius:0.4em;padding: 1em; background-color: rgba(214, 224, 226, 0.9)">
								<div class='thumbnail' >
									<a href="view_user.php?id=<?=$linha1['cliente_id'];?>">
										<?php if ($linha1['pessoa_tipo'] == "fisica") {?>
										<img class="card-img-top " style="max-height: 11em;" src="img/logo2.png">
										<?php } else {   ?>
										<img class="card-img-top " style="max-height: 11em;" src="img/logo1.png">
										<?php }?>	
									</a>
								</div>
								<div class='post-content'>
									<h3 class='title' style=""><?=$linha1['nome']?></h3>
									<p class='description' style=""><?= substr($linha1['info_adicionais']."...",0 ,80); ?></p>
									<div class="container">
									<div class='post-meta float-left'>
											<a class="btn btn-warning  btn-block" id="but" style="border:1px solid black;" href="edit.php?id=<?php echo $linha1['cliente_id'];?>">Editar</a>
											</div>
									<div class='post-meta float-right'>
										<span class='comments'>

											<a class="btn btn-success 	 btn-block" id="but" style="border:1px solid black;" href="view_user.php?id=<?php echo $linha1['cliente_id'];?>">Ver Cliente</a>
										</span> 
									</div>
								</div> 	
							</div>
						</div>
					</div>
					</a>

			<?php 
		}
		?>
		</div>
		<nav aria-label="...">
			<ul class="pagination">


				<?php

		// agora vamos criar os botões "Anterior e próximo"
				$anterior = $pc -1;
				$proximo = $pc +1;
				if ($pc>1) {
					?>
					<li class="page-item" >
						<a class="page-link"  value='<?php echo $anterior?>' href='?pagina=<?php echo $anterior?>' tabindex="-1">Anterior</a>
					</li>
					<?php 
				}?> 
				<?php 
				for($i=1; $i<=$tp+1; $i++){

					if($pc == $i){
						echo "<li class='page-item  active'><a class='page-link' href='?pagina=".$i."'>".$i."<span class='sr-only'>(current)</span></a></li>";
					}else{
						echo "<li class='page-item'><a class='page-link'  href='?pagina=".$i."'>".$i."</a></li>";
					}
				}
				?>

				<?php 
				if ($pc<$tp) {
					?>
					<li class="page-item">
						<a class="page-link"  onclick="" value='<?php echo $proximo?>' href='?pagina=<?php echo $proximo?>'>Proximo</a>
					</li>
					<?php
				}
				?>
			</ul>
		</nav>
		
			<a class='btn btn-primary' href="adicionar.php">Adicione um Cliente </a>
			</center>
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
</html>
