<!DOCTYPE html>
<?php 

	session_start();	
	$database_name = "product_details";
    $con = mysqli_connect("localhost","root","",$database_name);
	
	if(!empty($_GET["cat"]))
	{
		    $mysql = "SELECT * from produtos where cat='".$_GET["cat"]."'";

		
	}
	else{
		$mysql = "SELECT * FROM PRODUTOS";
	}
	 if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_POST["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_POST["id"],
					'product_quantity' => $_POST["quantity"],

                );
                $_SESSION["cart"][$count] = $item_array;
              //  echo '<script>window.location="Cart.php"</script>';
            }else{
               echo '<script>alert("O produto já está adicionado ao carrinho!")</script>';
               echo '<script>window.location="carrinho.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_POST["id"],
				'product_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }
   

?>

	
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

		<div class="produto" style="margin:auto; justify-content: center;">
		<ul class="menu-list" style="display:flex;flex-wrap:wrap;">
			<?php   
			
			if($result = mysqli_query($con,$mysql)){
					while($row = mysqli_fetch_array($result)){
						$id = $row['n_produto'];
			 ?>
				<a href="produto.php?produto=<?php echo $id ?>" class="produto-image" style="display:flex;text-align:center;      text-decoration:none;
">
					<li class="li-produto loja3 hover" style="height: 270px; ">
						<img class="imagem" src="img/<?php echo $id = $row['image'];?>" alt="" >
						<div class="nome">
							<h3 class="nome-txt"><?php echo $row['nome_produto'].'<br>'; ?></h3>
						</div>
						<div class="preco">
							<div style="color: #ff6b01;"><?php echo $row['preco'].' €<br>';?></div>
						</div>
					</li>
				</a>
				
				<?php } } ?>
			</ul>

		</div>
    </div>
    
</body>
</html>