<?php
	session_start();
	if (isset($_SESSION["login"])){
	  $login=1;
	}
	else{
		echo '<script type="text/javascript">
           window.location = "./login.php"
      </script>';
	
	}
?>