<!DOCTYPE html>
<html>
<head>
<script src="https://kit.fontawesome.com/d83087e488.js" crossorigin="anonymous"></script>
<title>Registo</title>
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
  	<h2>Registro</h2>
  </div>
  <form method="POST">
  <div class="Login_Form" method="post">
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" required>
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" required>
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1"  minlength="8" required>
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2"  minlength="8" required>
  	</div>
	<div class="input-group">
  	  <label>Nome Completo</label>
  	  <input type="name" name="nome" required>
  	</div>
  	<div class="input-group">
  	  <input type="submit" name="action" class="btn" value="Registo">
  	</div>
  	<p>
  		Já é membro? <a href="login.php">Inicie a sua sessão</a>
  	</p>
	</form>
  </div>
</body>
</html>
<?php
    $database_name = "product_details";
    $con = mysqli_connect("localhost","root","",$database_name);

    $mysql = "SELECT * from clientes;";
	$result = mysqli_query($con,$mysql);
	if(isset($_POST["username"])) {
		$username = htmlspecialchars($_POST["username"],ENT_QUOTES, 'UTF-8');			 
		$password = htmlspecialchars($_POST["password_1"],ENT_QUOTES, 'UTF-8');
		$password2 = htmlspecialchars($_POST["password_2"],ENT_QUOTES, 'UTF-8');
		$nome = htmlspecialchars($_POST["nome"],ENT_QUOTES, 'UTF-8');
		$email = htmlspecialchars($_POST["email"],ENT_QUOTES, 'UTF-8');
	}	
    if (isset($_REQUEST["action"])){
		$error = 0;
		while ($resultado = mysqli_fetch_array($result)) {
			if($username==$resultado["utilizador"]){
				$error = 1;
			}
			if($username==$resultado["email"]){
				$error = 2;
			}	
			if($email==$resultado["email"] || $username==$resultado["utilizador"]){
				$error = 3;
			}	
			if($password!=$password2){
				$error = 4;
			}
		}
		switch ($error){
			case 1:
				echo "Username já existe";
				break;
			case 2:
				echo "Email já existe";
				break;
			case 3:
				echo "Username  e email já existe";
				break;
			case 4:
				echo "Password inválida";
				break;
			default:
				$query =  $con->prepare("INSERT INTO clientes VALUES (null,?,?,?,?);");
				$query->bind_param('ssss', $username,$password,$nome,$email);
				$query->execute();
				$query->close();
				header('Location: login.php');
				break;
			
		}	
	}	
?>