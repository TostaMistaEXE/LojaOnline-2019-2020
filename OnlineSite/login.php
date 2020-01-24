<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script src="https://kit.fontawesome.com/d83087e488.js" crossorigin="anonymous"></script>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/html" href="index.css">
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
  	<h2>Login</h2>
  </div>
	 
  <div class="Login_Form" >
  <form method="post">
  	<div class="input-group">
  		<label>Usuario</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Palavra-Passe</label>
		  <input type="password" name="password">
		  
	  </div>
	  <div class="space-5"></div>
  	<div class="input-group">
  		<input type="submit" class="btn" name="action" value="Login">
          </form>
	  </div>
	  <div class="space-5"></div>
  	<p>
  		Ainda não e menbro ? <a href="register.php"> Registe-se</a>
  	</p>
</div>
</body>
</html>
<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
    $database_name = "product_details";
    $con = mysqli_connect("localhost","root","",$database_name);
    $mysql = "SELECT * from clientes;";
	$result = mysqli_query($con,$mysql);
	
	if(isset($_POST["username"])) {
		$username = htmlspecialchars($_POST["username"],ENT_QUOTES, 'UTF-8');			 
		$password = htmlspecialchars($_POST["password"],ENT_QUOTES, 'UTF-8');
	} 
	
    if (isset($_REQUEST["action"])){
		$error = 0;
		while ($resultado = mysqli_fetch_array($result)) {
			if($resultado["utilizador"]==$username && $resultado["password"]==$password){
				$error = 1;
				break;
			}
			else{
				$error = 2;
			}
		}
		switch($error){
			case 1:
				header('Location: produtos.php');
				$login = array('username' => $username);
				$_SESSION["login"][0] = $login;
				break;
			case 2:
				echo "Erro";
				break;
		}
	}	

?>