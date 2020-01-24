<?php

    session_start();


    $database_name = "product_details";
    $con = mysqli_connect("localhost","root","",$database_name);
    if (isset($_SESSION["login"])){
		echo "Bem-vindo,  ";
		foreach ($_SESSION["login"]   as $key => $value) {
			$nomeutilizador = $value["username"];
			echo $nomeutilizador;
		}
		
		$ee="SELECT * FROM clientes where utilizador='".$nomeutilizador."'";
		if($result = mysqli_query($con,$ee)){
			while($row = mysqli_fetch_assoc($result)){
				$nutilizador = $row["n_utilizador"];
				
			}	
		}
	}

	if(empty($nomeutilizador)){
		header('Location: login.php');
	}
	if(!empty($_SESSION["login"])){
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
?>
<style>
input{
	display:inline;
    width:auto;
    position: relative;
}
</style>




