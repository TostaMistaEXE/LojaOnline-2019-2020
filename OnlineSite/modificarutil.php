<!DOCTYPE html>
<?php
include ('include/database.php');
include ('include/login_verification.php'); 
# ---  BUSCAR OS VALORES DO UTILIZADOR ----

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

if(!empty($_POST['modificar_utilizador']))
{
	$Password = $_POST['Password'];
	$Nome = $_POST['Nome'];
	$mysql ="UPDATE clientes SET nome='".$Nome."',password='".$Password."' where n_utilizador=".$num_utilizador."";
	$query = mysqli_query($con, $mysql);
	header("Refresh:0");
}

# ---  BUSCAR OS VALORES DO ENDERECO ENTREGA ----
$mysql = "SELECT * from endereco where n_utilizador='".$num_utilizador."' and tipo_endereco='entrega'";
if($query = mysqli_query($con, $mysql))
{
	if (mysqli_num_rows($query) > 0)
	{
		while ($result = mysqli_fetch_array($query))
		{
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
		$nome_endereco1 = '';
		$Endereco_endereco1 = '';
		$codpos_endereco1 = '';
		$Cidade_endereco1 = '';
		$Pais_endereco1 = '';
		$Telefone1_endereco1 = '';
		$Telefone2_endereco1 = '';
	}
}
# ---  MUDAR OS VALORES DO ENDERECO 1 ----
$mysql = "SELECT * from endereco where n_utilizador='".$num_utilizador."' and tipo_endereco='entrega'";
$query = mysqli_query($con, $mysql);
if(!empty($_POST['modificar_endereco1']) && mysqli_num_rows($query) > 0)
{
	$telefone1 = $_POST['Telefone1'];
	if($_POST['Telefone2'])
	{
		$telefone2 = $_POST['Telefone2'];
	}
	else
	{
		$telefone2='NULL';
	}
	if(!empty($_POST['Pais']))
	{$pais = $_POST['Pais'];}
	else{$pais='';}
	$codpostal = $_POST['CodPostal'];
	$Cidade = $_POST['Cidade'];
	$endereco = $_POST['Endereco'];
	$nome = $_POST['Nome'];
	$mysql = "UPDATE endereco SET nome='".$nome."',Endereco='".$endereco."',CodPostal='".$codpostal."',Cidade='".$Cidade."',Pais='".$pais."',Telefone1='".$telefone1."',Telefone2='".$telefone2."' where n_utilizador=".$num_utilizador." and tipo_endereco='entrega'";
	$query = mysqli_query($con, $mysql);
	header("Refresh:0");
}
elseif (!empty($_POST['modificar_endereco1'])&& mysqli_num_rows($query) <= 0)
{
	$telefone1 = $_POST['Telefone1'];
	if($_POST['Telefone2'])
	{
		$telefone2 = $_POST['Telefone2'];
	}
	else
	{
		$telefone2='NULL';
	}
	if(!empty($_POST['Pais']))
	{$pais = $_POST['Pais'];}
	else{$pais='';}
	
	$codpostal = $_POST['CodPostal'];
	$Cidade = $_POST['Cidade'];
	$endereco = $_POST['Endereco'];
	$nome = $_POST['Nome'];
	$mysql = "INSERT INTO endereco (n_endereco,n_utilizador,tipo_endereco,nome,endereco,codpostal,cidade,pais,telefone1,telefone2)VALUES (null,".$num_utilizador.",'entrega','".$nome."','".$endereco."',".$codpostal.",'".$Cidade."','".$pais."',".$telefone1.",".$telefone2.")";
	echo $mysql;
	$query = mysqli_query($con, $mysql);
	header("Refresh:0");
}
# ---  BUSCAR OS VALORES DO ENDERECO ALTERNATIVO ----
$mysql = "SELECT * from endereco where n_utilizador='".$num_utilizador."' and tipo_endereco='alternativo'";
if($query = mysqli_query($con, $mysql))
{
	if (mysqli_num_rows($query) > 0)
	{
		while ($result = mysqli_fetch_array($query))
		{
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
		$nome_endereco2 = '';
		$Endereco_endereco2 = '';
		$codpos_endereco2 = '';
		$Cidade_endereco2 = '';
		$Pais_endereco2 = '';
		$Telefone1_endereco2 = '';
		$Telefone2_endereco2 = '';
	}
}

# ---  MUDAR OS VALORES DO ENDERECO ALTERNATIVO ----
#SE EXISTER POST E SE EXISTIR RESULTADOS NA QUERY
$mysql = "SELECT * from endereco where n_utilizador='".$num_utilizador."' and tipo_endereco='alternativo'";
$query = mysqli_query($con, $mysql);
if(!empty($_POST['modificar_endereco2']) && mysqli_num_rows($query) > 0)
{
	$telefone1 = $_POST['Telefone1'];
	if($_POST['Telefone2'])
	{
		$telefone2 = $_POST['Telefone2'];
	}
	else
	{
		$telefone2='NULL';
	}
	if(!empty($_POST['Pais']))
	{$pais = $_POST['Pais'];}
	else{$pais='';}
	$codpostal = $_POST['CodPostal'];
	$Cidade = $_POST['Cidade'];
	$endereco = $_POST['Endereco'];
	$nome = $_POST['Nome'];
	$mysql = "UPDATE endereco SET nome='".$nome."',Endereco='".$endereco."',CodPostal='".$codpostal."',Cidade='".$Cidade."',Pais='".$pais."',Telefone1='".$telefone1."',Telefone2='".$telefone2."' where n_utilizador=27 and tipo_endereco='alternativo'";
	$query = mysqli_query($con, $mysql);
	header("Refresh:0");
}
elseif (!empty($_POST['modificar_endereco2'])&& mysqli_num_rows($query) <= 0)
{
	$telefone1 = $_POST['Telefone1'];
	if($_POST['Telefone2'])
	{
		$telefone2 = $_POST['Telefone2'];
	}
	else
	{
		$telefone2='NULL';
	}
	if(!empty($_POST['Pais']))
	{$pais = $_POST['Pais'];}
	else{$pais='';}
	
	$codpostal = $_POST['CodPostal'];
	$Cidade = $_POST['Cidade'];
	$endereco = $_POST['Endereco'];
	$nome = $_POST['Nome'];
	$mysql = "INSERT INTO endereco (n_endereco,n_utilizador,tipo_endereco,nome,endereco,codpostal,cidade,pais,telefone1,telefone2)VALUES (null,".$num_utilizador.",'alternativo','".$nome."','".$endereco."',".$codpostal.",'".$Cidade."','".$pais."',".$telefone1.",".$telefone2.")";
	echo $mysql;
	$query = mysqli_query($con, $mysql);
	header("Refresh:0");
}
?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/d83087e488.js" crossorigin="anonymous">
    </script>
    <title>Document
    </title>
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
    <h2>Detalhes da minha contas
    </h2>
  </div>
  <div class="Login_Form" >
    <form method="post">
      <div class="input-group">
        <label>Nº utilizador
        </label>
        <input type="text" disabled name="nutilizador" value="<?php echo $num_utilizador; ?>" >
      </div>
      <div class="input-group">
        <label>Nome completo
        </label>
        <input type="text" required name="Nome" value="<?php echo $nom_utilizador; ?>" >
      </div>
      <div class="input-group">
        <label>Password
        </label>
        <input type="password" required name="Password" value="<?php echo $pass_utilizador; ?>" >
      </div>
      <div class="input-group">
        <label>Email
        </label>
        <input type="text" required disabled name="Email" value="<?php echo $email_utilizador; ?>" >
      </div>
      <div class="space-5">
      </div>
      <div class="input-group">
        <input type="submit" class="btn" name="modificar_utilizador" value="Modificar">
        </form>
      </div>
    <div class="space-5">
    </div>
  </div>     
</div>
<div class="space">
  <!--Endereço de entrega -->
  <div class="header">
    <h2>Endereço de entrega principal
    </h2>
  </div>
  <div class="Login_Form" >
    <form method="post">
      <div class="input-group">
        <label>Nome completo
        </label>
        <input type="text" required name="Nome" value="<?php echo $nome_endereco1; ?>" >
      </div>
      <div class="input-group">
        <label>Endereço
        </label>
        <input type="text" required name="Endereco"  value="<?php echo $Endereco_endereco1; ?>">
      </div>
      <div class="input-group">
        <label>Codigo Postal
        </label>
        <input type="number" required name="CodPostal"  value="<?php echo $codpos_endereco1; ?>">
      </div>
      <div class="input-group">
        <label>Cidade
        </label>
        <input type="text" required name="Cidade"  value="<?php echo $Cidade_endereco1; ?>">
      </div>
      <div class="input-group">
        <label>Pais
        </label>
         <select id="country" name="Pais" class="form-control" value="asd" required>
			<option disabled selected value="<?php echo $pais_ec;?>"><?php echo $Pais_endereco1;?></option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Åland Islands">Åland Islands</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote D'ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                <option value="Korea, Republic of">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova, Republic of">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-leste">Timor-leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">Virgin Islands, British</option>
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
            </select>
      </div>
      <div class="input-group">
        <label>Telefone 1
        </label>
        <input type="text" required name="Telefone1"  value="<?php echo $Telefone1_endereco1; ?>">
      </div>
      <div class="input-group">
        <label>Telefone 2
        </label>
        <input type="text" name="Telefone2"  value="<?php echo $Telefone2_endereco1; ?>">
      </div>
      <div class="space-5">
      </div>
      <div class="input-group">
        <input type="submit" class="btn" name="modificar_endereco1" value="Modificar">
        </form>
      </div>
    <div class="space-5">
    </div>
  </div>     
  <div class="space">
    <!--Endereço de entrega -->
    <div class="header">
      <h2>Endereço de entrega secundario
      </h2>
    </div>
    <div class="Login_Form" >
      <form method="post">
        <div class="input-group">
          <label>Nome completo
          </label>
          <input type="text" required name="Nome"  value="<?php echo $nome_endereco2; ?>" >
        </div>
        <div class="input-group">
          <label>Endereço
          </label>
          <input type="text" required name="Endereco"  value="<?php echo $Endereco_endereco2; ?>" >
        </div>
        <div class="input-group">
          <label>Codigo Postal
          </label>
          <input type="number" required name="CodPostal"   value="<?php echo $codpos_endereco2; ?>">
        </div>
        <div class="input-group">
          <label>Cidade
          </label>
          <input type="text" required name="Cidade"  value="<?php echo $Cidade_endereco2; ?>" >
        </div>
        <div class="input-group">
          <label>Pais
          </label>
          <select id="country" name="Pais" class="form-control" required>
				<option disabled selected value="<?php echo $pais_ea;?>"><?php echo $Pais_endereco2;?></option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Åland Islands">Åland Islands</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote D'ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                <option value="Korea, Republic of">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova, Republic of">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-leste">Timor-leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">Virgin Islands, British</option>
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
            </select>
        </div>
        <div class="input-group">
          <label>Telefone 1
          </label>
          <input type="text" required name="Telefone1"  value="<?php echo $Telefone1_endereco2; ?>">
        </div>
        <div class="input-group">
          <label>Telefone 2
          </label>
          <input type="text" name="Telefone2" value="<?php echo $Telefone2_endereco2; ?>" >
        </div>
        <div class="space-5">
        </div>
        <div class="input-group">
          <input type="submit" class="btn" name="modificar_endereco2" value="Modificar">
          </form>
        </div>
      <div class="space-5">
      </div>
    </div>
  </div>
  </body>
</html>
