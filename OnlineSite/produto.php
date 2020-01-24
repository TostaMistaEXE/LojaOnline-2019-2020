<?php
	session_start();
	if(!empty($_SESSION["login"])){
		$login = 1; //Se a sessão login existir
	}
	else{	// Se não
		$login = 0; 
	}	
	if(isset($_GET['produto'])){
	$database_name = "product_details";
    $con = mysqli_connect("localhost","root","",$database_name);
    $mysql = "SELECT * from produtos;";
	 if (isset($_REQUEST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET['produto'],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET['produto'],
					'product_quantity' => '1',

                );
                $_SESSION["cart"][$count] = $item_array;
              //  echo '<script>window.location="Cart.php"</script>';
            }else{
               echo '<script>alert("O produto já foi adicionado ao carrinho!")</script>';
               echo '<script>window.location="carrinho.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET['produto'],
				'product_quantity' => '1',
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }
	

	
    $mysql = "SELECT * from produtos where n_produto='".$_GET['produto']."'";
		if($result = mysqli_query($con,$mysql)){
				if($row = mysqli_fetch_array($result)){
					$row['n_produto'].'<br>';
					$preco = $row['preco'];
					$stock = $row['stock'].'<br>';
					$nome = $row['nome_produto'].'<br>';
					$marca = $row['marca'];
					$imagem = $row['image'];
					
				}
				else {
				$preco = "Não encontrado";
				$stock = "Não encontrado";
				$nome = "Não encontrado";
				$marca = "Não encontrado";
				$image = "Não encontrado";

		}
				
		}
	
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/d83087e488.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

    <!--- HEADER --->
<script src="jquery/w3data.js"></script>
<div w3-include-html="menu.php"></div> 
<script>
w3IncludeHTML();
</script>
<!--- HEADER --->

    <div class="space-back">
        
            <div class="card">
                    <img src="<?php echo "img/".$imagem; ?>" alt="Imagem" style="width:100%">
                    <h1><?php echo $nome; ?>  </h1>
                    <p class="price"><?php echo $preco.',00 €' ?> </p>
                    <p>
                      <b>Referência:</b><?php ?> <br>
                      <div class="space"></div>
                      <b>Marca:</b><?php echo $marca; ?> <br>
                      <div class="space"></div>
                      <b>Stock:</b><?php echo $stock; ?> <br>
                      <div class="space"></div>
                     
                    </p>
                    <div class="spacebuton"></div>
					
					<form method="POST" name="addtocart-<?php echo $id;?>" >
						<input type="hidden" value="<?php echo $id;?>" name="id">
						<p><button name="add" style="background: #006400;">Adicionar ao carrinho</button></p>
					</form>
               
                  </div>
		
    </div>

</body>
</html>