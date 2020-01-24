<?php

    session_start();

	
    $database_name = "product_details";
    $con = mysqli_connect("localhost","root","",$database_name);

	if(isset($_REQUEST['submit_user'])){
		$nutilizador = $_POST ['valor'];	
	
	}

	
?>
<style>
input{
	display:inline;
    width:auto;
    position: relative;
}
</style>

<body>
	<form method="POST">
		<input type="text" name='valor'>
		<input type="submit" name="submit_user">
	</form>
	
	<span>Ultimas encomendas feitas:</span>
	<form method="POST">
		<input type="submit" name="submit_last">
	</form>
</body>

<?php		
	if(isset($nutilizador)){
		$ee="SELECT * FROM encomendas where n_utilizador=".$nutilizador;
		if($result = mysqli_query($con,$ee)){
			while($row = mysqli_fetch_assoc($result)){
				echo '<br>'.'Número da Encomenda: '.$row['n_encomenda'].'<br>';
				$detalhes = "SELECT * from encomendas_detalhes where n_encomenda=".$row['n_encomenda'];
				if($result1 = mysqli_query($con,$detalhes)){
					while($row1 = mysqli_fetch_assoc($result1)){
						echo 'Número do Produto: '.$row1['n_produto'].'<br>';
					}
				}
				echo '<hr>';
			}	
		}
	}
	
	if(isset($_REQUEST['submit_last'])){
		$ee="SELECT * FROM encomendas LIMIT 10";
		if($result = mysqli_query($con,$ee)){
			while($row = mysqli_fetch_assoc($result)){
				echo '<br>'.'Número da Encomenda: '.$row['n_encomenda'];
				echo '<br>'.'Número do Utilizador: '.$row['n_utilizador'].'<br>';
				$detalhes = "SELECT * from encomendas_detalhes where n_encomenda=".$row['n_encomenda'];
				if($result1 = mysqli_query($con,$detalhes)){
					while($row1 = mysqli_fetch_assoc($result1)){
						echo 'Número do Produto: '.$row1['n_produto'].'<br>';
					}
				}
				echo '<hr>';
			}	
		}
	}

?>