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
            <div class="tablediv">
                <h2>Historico Compras</h2>
                <br>
				
            <table class="zui-table">
                <thead>

                    <tr>
                        <th>Nº Ecomenda</th>
                        <th>Estado</th>
                        <th>Preço Total</th>
                        <th>Data</th>

                    </tr>
                </thead>
                <tbody>									<?php
				$mysql = "SELECT * from encomendas where n_utilizador='".$num_utilizador."'";
if($query = mysqli_query($con, $mysql))
{
	while ($result = mysqli_fetch_array($query))
	{
			$n_encomenda = $result['n_encomenda'];
			$preco_total = $result['p_encomenda'];

?>
      
                    <tr>
                  <td><?php echo $n_encomenda; ?></td>
                        <td></td>
                        <td><?php echo $preco_total; ?></td>
                        <td>#</td>
						
                     </tr>
                <?php }} ?>
                </tbody>
            </table>
        </div>     
        </div>
          
    
    

</body>
</html>