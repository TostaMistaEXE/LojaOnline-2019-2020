<?php
session_start();
$button = $_POST['button'];
$id = $_POST['id'];
if($button=='+')
{
	if (!empty($_SESSION["cart"]))
	{
		foreach ($_SESSION["cart"] as $key => $value)
		{

			if($id==$value['product_id'])
			{
				
				$cc = $value['product_quantity'];
				$cc = $cc + 1;
				$_SESSION['cart'][$key]['product_quantity'] = $cc;
				header('Location: carrinho.php');
				
			}
		}
	}
	
}
if($button=='-')
{
	if (!empty($_SESSION["cart"]))
	{
		
		foreach ($_SESSION["cart"] as $key => $value)
		{
			if($id==$value['product_id'])
			{
				
				$cc = $value['product_quantity'];
				if($cc>1){$cc = $cc - 1;}
				$_SESSION['cart'][$key]['product_quantity'] = $cc;
				header('Location: carrinho.php');
				
			}

		}
	}
}

?>