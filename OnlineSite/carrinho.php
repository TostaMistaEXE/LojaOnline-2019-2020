<?php
include ('include/database.php');
include ('include/login_verification.php');
$database_name = "product_details";
$con = mysqli_connect("localhost", "root", "", $database_name);
if (isset($_SESSION["login"]))
{
    $login = 1;
    foreach ($_SESSION["login"] as $key => $value)
    {
        $nomeutilizador = $value["username"];
    }
}

if (isset($_POST["add"]))
{
    if (isset($_SESSION["cart"]))
    {
        $item_array_id = array_column($_SESSION["cart"], "product_id");
        if (!in_array($_GET["id"], $item_array_id))
        {
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][$count] = $item_array;
            echo '<script>window.location="Cart.php"</script>';
        }
        else
        {
            echo '<script>alert("O produto já está adicionado ao carrinho")</script>';
            echo '<script>window.location="Cart.php"</script>';
        }
    }
    else
    {
        $item_array = array(
            'product_id' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'product_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"],
        );
        $_SESSION["cart"][0] = $item_array;
    }
}
if (isset($_GET["action"]))
{
    if ($_GET["action"] == "delete")
    {
        foreach ($_SESSION["cart"] as $keys => $value)
        {
            if ($value["product_id"] == $_GET["id"])
            {
                unset($_SESSION["cart"][$keys]);
                echo '<script>alert("O produto foi removido	...!")</script>';
                echo '<script>window.location="carrinho.php"</script>';
            }
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

     <div id="includedContent"></div>

    <div class="space-back">

        <div class="tablediv">
             <h2>Carro de compras</h2>
                <br>

            
            <table class="zui-table">
                <thead>
                    <tr>
                      <th>Produto</th>
                      <th>Quantidade</th>
                      <th>Preço</th>
                      <th>Preço Total</th>
                      <th></th>
                    </tr>
                </thead>
            <?php
			    $total = 0;

if (!empty($_SESSION["cart"]))
{
    foreach ($_SESSION["cart"] as $key => $value)
    {

        $query = "SELECT * FROM produtos where n_produto='" . $value["product_id"] . "'";
        $result = mysqli_query($con, $query);

        while ($resultado = mysqli_fetch_array($result))
        {
            $asd = $resultado['n_produto'];
?>
					<input type="hidden" value="<?php echo $value["product_quantity"]; ?>">	
					<tbody>		
					<tr>
					<td><?php echo $resultado["nome_produto"]; ?></td>
                    <td><form method="post" action="ajax.php">
										<input name ="id" type="hidden" value="<?php echo $value["product_id"]; ?>">	
					<input type="submit" value="-" name="button"><?php echo $value["product_quantity"]; ?> 
					<input  type="submit" value="+"  name="button"></form> 
					
					</input></td>
                    <td><?php echo $resultado["preco"] . ',00€'; ?></td>
                    <td><?php echo number_format($value["product_quantity"] * $resultado["preco"], 2); ?>€</td>
                    <td><a style="text-decoration:none; color:red;"href="carrinho.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span class="text-danger">Remover Produto</span></a></td>
							<?php $total = $total + ($resultado["preco"] * $value["product_quantity"]);
        }
    }
} 
 
?>

<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>

					</tr>
					<tr>
					<td></td>
					<td></td><?php if($total>1){?>
					<td>Total</td>
					<td><?php
					echo number_format($total, 2);
					?>€<?php }else{} ?></td>
					<td></td>
					</tr>
                    </tbody>
                    
            </table>
            
            <br>
				<form method="post">
            <div class="input-group">
                <input type="submit" class="btn" name="efetuarcompra" value="Finalizar compra">
            </div>
            </form>
        </div>
        
    </div>

</body>
</html>
			

			<?php
			
			
			
if (isset($_REQUEST['efetuarcompra']))
{
    if (!empty($_POST['envio'])) $metodo = $_POST['envio'];
    if (!empty($_POST['pagamento'])) $pagamento = $_POST['pagamento'];

    if (!empty($_SESSION["login"]))
    {
        $ee = "SELECT * FROM clientes";
        $result = mysqli_query($con, $ee);
        $resultado = mysqli_fetch_array($result);
        $nutilizador = $resultado["n_utilizador"];
    }
    if (!empty($_SESSION["cart"]))
    {
        $ee = "INSERT INTO encomendas values (null," . $total . "," . $nutilizador . ",'" . $metodo . "','" . $pagamento . "')";
	
        $result = mysqli_query($con, $ee);
        $mysql = "SELECT n_encomenda from encomendas order by n_encomenda desc limit 1;";
        $result = mysqli_query($con, $mysql);
        $resultado = mysqli_fetch_array($result);
        $resultado['n_encomenda'];
        foreach ($_SESSION["cart"] as $key => $value)
        {
            $query = "INSERT INTO encomendas_detalhes values (" . $resultado['n_encomenda'] . "," . $value['product_id'] . "," . $value['product_quantity'] . ")";
            $result = mysqli_query($con, $query);
        }
    }
    echo "<script type='text/javascript'> window.location.href = '#' </script>	";
	if(isset($_REQUEST['efetuarcompra'])){header('Location: finalizarcompra.php');}
}

?>
