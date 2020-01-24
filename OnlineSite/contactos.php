<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/d83087e488.js" crossorigin="anonymous"></script>
    <title>Contactos</title>
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
        <!-- Detalhes da conta -->
      <div class="header">
          <h2>Contacte-nos</h2>
      </div>
         
      <div class="Login_Form" >
      <form method="post">

                

            <div class="input-group">
                <label>Nome</label>
                <input type="text" disabled name="Nome" >
            </div>

            <div class="input-group">
                <label>Email</label>
                <input type="text" required name="Endereco" >
            </div>

            <div class="input-group">
                <label>Mensagem</label>
                <textarea name="Mensagem" rows="10" cols="30"></textarea>
            </div>

          <div class="space-5"></div>
          <div class="input-group">
              <input type="submit" class="btn" name="action" value="Modificar">
              </form>
          </div>
          <div class="space-5"></div>
        </div>     
        
    </div>
</body>
</html>