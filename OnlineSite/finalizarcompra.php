<?php

include ('include/database.php');
include ('include/login_verification.php'); 
foreach ($_SESSION["login"] as $key => $value)
{
	$username = $value['username'];
}
$mysql = "SELECT * from clientes where utilizador='" . $username . "'";
$query = mysqli_query($con, $mysql);
while ($result = mysqli_fetch_array($query))
{
	$num_utilizador = $result['n_utilizador'];
	$nom_utilizador = $result['nome'];
	$pass_utilizador = $result['password'];
	$email_utilizador = $result['email'];
}

$mysql = "SELECT * from endereco where n_utilizador='".$num_utilizador."' and tipo_endereco='entrega'";
if($query = mysqli_query($con, $mysql))
{
	if (mysqli_num_rows($query) > 0)
	{
		while ($result = mysqli_fetch_array($query))
		{
			$numero_endereco1 = $result['n_endereco'];
			$nome_endereco1 = $result['nome'];
			$Endereco_endereco1 = $result['Endereco'];
			$codpos_endereco1 = $result['CodPostal'];
			$Cidade_endereco1 = $result['Cidade'];
			$Pais_endereco1 = $result['Pais'];
			$Telefone1_endereco1 = $result['Telefone1'];
			$Telefone2_endereco1 = $result['Telefone2'];
			

		}
	}
	else
	{
		$numero_endereco1 = '';
		$nome_endereco1 = '';
		$Endereco_endereco1 = '';
		$codpos_endereco1 = '';
		$Cidade_endereco1 = '';
		$Pais_endereco1 = '';
		$Telefone1_endereco1 = '';
		$Telefone2_endereco1 = '';
	}
}
$mysql = "SELECT * from endereco where n_utilizador='".$num_utilizador."' and tipo_endereco='alternativo'";
if($query = mysqli_query($con, $mysql))
{
	if (mysqli_num_rows($query) > 0)
	{
		$endereco_existe = 1;
		while ($result = mysqli_fetch_array($query))
		{
			$numero_endereco2 = $result['n_endereco'];
			$nome_endereco2 = $result['nome'];
			$Endereco_endereco2 = $result['Endereco'];
			$codpos_endereco2 = $result['CodPostal'];
			$Cidade_endereco2 = $result['Cidade'];
			$Pais_endereco2 = $result['Pais'];
			$Telefone1_endereco2 = $result['Telefone1'];
			$Telefone2_endereco2 = $result['Telefone2'];
			

		}
	}
	else
	{
		$numero_endereco2 = '';
		$nome_endereco2 = '';
		$Endereco_endereco2 = '';
		$codpos_endereco2 = '';
		$Cidade_endereco2 = '';
		$Pais_endereco2 = '';
		$Telefone1_endereco2 = '';
		$Telefone2_endereco2 = '';
	}
}
?>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>

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

    <div class="space">
        <!-- -->
      <div class="header">
          <h2>Finalizar compra</h2>
      </div>
         
      <div class="Login_Form" >
        
<?php
if(isset($_POST['valor'])){ $post = $_POST['valor']; }
if(isset($_POST['end'])){ $post = $_POST['end']; }
if(isset($post)){
switch($post){
	case 'end1':
	$endereco = 1;
	break;
	case 'end2':
	$endereco = 2;
	break;
	default:
	$endereco = 1;
}}

if(isset($endereco_existe)){
if($endereco_existe==1){?>
        <p>
		<form method="post" action="#" name="end">
            <select id="end" name="end" onchange="this.form.submit()">
                <option value="end1" <?php if(isset($endereco)){if($endereco==1){ echo "selected"; }} ?>>Endereco Primario</option>
                <option value="end2" <?php if(isset($endereco)){if($endereco==2){ echo "selected"; }} ?>>Endereco Segundario</option>
              </select>
			<input type="hidden"  name="valor" value="<?php echo $post; ?>" >
		</form>
        </p>
<?php }}if(isset($endereco)){if($endereco==1){?>
          <div class="input-group">
            <label><b><?php echo $nome_endereco1; ?></b></label>
          </div>

          <div class="input-group">
            <label><?php echo $Endereco_endereco1; ?></label>
          </div>

          <div class="input-group">
            <label><?php echo $codpos_endereco1;?></label>
          </div>
          <div class="input-group">
            <label><?php echo $Cidade_endereco1; ?>
            </label>
          </div>
          <div class="input-group">
            <label><?php echo $Pais_endereco1; ?>
            </label>
          </div>
          <div class="input-group">
            <label><?php echo $Telefone1_endereco1; ?>
            </label>
          </div>
          <div class="input-group">
            <label><?php echo $Telefone2_endereco1; ?>
            </label>
          </div>
<?php } if($endereco==2){?>
<div class="input-group">
            <label><b><?php echo $nome_endereco2; ?></b></label>
          </div>

          <div class="input-group">
            <label><?php echo $Endereco_endereco2; ?></label>
          </div>

          <div class="input-group">
            <label><?php echo $codpos_endereco2;?></label>
          </div>
          <div class="input-group">
            <label><?php echo $Cidade_endereco2; ?>
            </label>
          </div>
          <div class="input-group">
            <label><?php echo $Pais_endereco2; ?>
            </label>
          </div>
          <div class="input-group">
            <label><?php echo $Telefone1_endereco2; ?>
            </label>
          </div>
          <div class="input-group">
            <label><?php echo $Telefone2_endereco2; ?>
            </label>
          </div>
<?php }}else { ?>
          <div class="input-group">
            <label><b><?php echo $nome_endereco1; ?></b></label>
          </div>

          <div class="input-group">
            <label><?php echo $Endereco_endereco1; ?></label>
          </div>

          <div class="input-group">
            <label><?php echo $codpos_endereco1;?></label>
          </div>
          <div class="input-group">
            <label><?php echo $Cidade_endereco1; ?>
            </label>
          </div>
          <div class="input-group">
            <label><?php echo $Pais_endereco1; ?>
            </label>
          </div>
          <div class="input-group">
            <label><?php echo $Telefone1_endereco1; ?>
            </label>
          </div>
          <div class="input-group">
            <label><?php echo $Telefone2_endereco1; ?>
            </label>
          </div>
		  <?php  }?>
		  <form method ="post">
            <h3> Como Deseja pagar ?
            </h3>
            </p>
          <p>
            <input type="radio"  name="pagar" value="dinheiro" >Dinheiro
            <input type="radio" name="pagar" value="cb" checked>Cartão Multibanco
            <input type="radio" name="pagar" value="btc">BitCoin
			<input type="hidden"  name="valor" value="<?php echo $endereco; ?>" >

          </p>
          <p>
          <h3> Metedo de entrega ?
          </h3>
          </p>
        <p>
          <input type="radio" name="envio" value="carro" checked>Carro
          <input type="radio" name="envio" value="barco">Barco
          <input type="radio" name="envio" value="aviao ">Aviao
        </p>

          <div class="space-5"></div>
          <div class="input-group">
              <input type="submit" class="btn" name="action" value="Enviar">
              </form>
          </div>
          <div class="space-5"></div>

    </div>
<?php


if(isset($_REQUEST['action'])){
$endereco = $_POST['valor'];
if($_REQUEST["action"])
{
	$pagamento = $_POST['pagar'];
	$metodo = $_POST["envio"];

$total =0;
	if (!empty($_SESSION["cart"]))
{
    foreach ($_SESSION["cart"] as $key => $value)
    {
        $query = "SELECT * FROM produtos where n_produto='" . $value["product_id"] . "'";
        $result = mysqli_query($con, $query);

        while ($resultado = mysqli_fetch_array($result))
        {
            $total = $total + ($resultado["preco"] * $value["product_quantity"]);
		}
	}
}
    if (!empty($_SESSION["cart"]))
    {
		if($endereco==1){        $ee = "INSERT INTO encomendas values (null," . $total . "," . $numero_endereco1. ",".$num_utilizador.",'" . $metodo . "','" . $pagamento . "')";}
		if($endereco==2){        $ee = "INSERT INTO encomendas values (null," . $total . "," . $numero_endereco2. ",".$num_utilizador.",'" . $metodo . "','" . $pagamento . "')";}
		$result = mysqli_query($con, $ee);
        $mysql = "SELECT n_encomenda from encomendas order by n_encomenda desc limit 1;";
        $result = mysqli_query($con, $mysql);
        $resultado = mysqli_fetch_array($result);
        $resultado['n_encomenda'];
        foreach ($_SESSION["cart"] as $key => $value)
        {
			if(isset($value["product_quantity"])){$quantidade = $value['product_quantity'];}
            $query = "INSERT INTO encomendas_detalhes values (" . $resultado['n_encomenda'] . "," . $value['product_id'] . "," . $quantidade . ")";
			$result = mysqli_query($con, $query);
        }
    }
}

}
?>
</body>
</html>