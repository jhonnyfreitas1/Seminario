<?php 
	include "init.php";


	$sql = "insert into users(nome,telefone,cidade,estado,email,info_adicionais,pessoa_tipo,cpf_cnpj) values(?,?,?,?,?,?,?,?)";	
	$conn = getConn();
	

		if (isset($_POST['nome']) && isset($_POST['telefone']) && isset($_POST['cidade']) && isset($_POST['estado']) && isset($_POST['email']) && isset($_POST['info_adicionais']) && isset($_POST['tipo_pessoa'])  && isset($_POST['cnpj/cpf']) )
		 {
					
			$nome = $_POST['nome']; $telefone = $_POST['telefone']; 
			$cidade = $_POST['cidade']; $estado = $_POST['estado']; 
			$email = $_POST['email']; $info = $_POST['info_adicionais'];
			$tipo_pessoa = $_POST['tipo_pessoa']; $create = $_POST['created_at'];
			$cnpj_cpf = $_POST['cnpj/cpf'];
			
			$query = $conn ->prepare($sql);
			$query-> bindValue(1,$nome);
			$query-> bindValue(2,$telefone);
			$query-> bindValue(3,$cidade);
			$query-> bindValue(4,$estado);
			$query-> bindValue(5,$email);
			$query-> bindValue(6,$info);
			$query-> bindValue(7,$tipo_pessoa);
			$query-> bindValue(8,$cnpj_cpf);		
			$result = $query -> execute();
			
			if ($result === false) {
				header('location:adicionar.php?result=falha_na_insercao');

			}else{
				header('location:adicionar.php?result=sucesso_na_insercao');
			}

		}else{
				header('location:adicionar.php?result=falta_parametros');
		}
		
