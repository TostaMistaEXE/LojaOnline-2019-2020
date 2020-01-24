<?php 
	session_start();	
	$database_name = "product_details";
    $con = mysqli_connect("localhost","root","",$database_name);
    $mysql = "SELECT * from produtos;";
	
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
               echo '<script>alert("Product is already Added to Cart")</script>';
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
<body><?php
if($result = mysqli_query($con,$mysql)){
		while($row = mysqli_fetch_array($result)){
			echo $row['n_produto'].'<br>';
			echo $row['preco'].'<br>';
			echo $row['stock'].'<br>';
			echo $row['nome_produto'].'<br>';
			$id = $row['n_produto'];

		?>
	<form method="POST" name="addtocart-<?php echo $id;?>" >
		<input type="number" value="1" name="quantity">
		<input type="hidden" value="<?php echo $id;?>" name="id">
		<input type="submit" name="add">
	</form>
	
	<?php }
	}?>
<body>
