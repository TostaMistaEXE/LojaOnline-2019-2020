 <?php

include ('include/database.php');
include ('include/login_verification.php');
 ?>
<div class="menu-bar1">   
	<ul>
		<li>
			<i class="fas fa-user-circle"></i><a href='#'>Conta</a>			
				<div class="sub-menu">
					<ul>    
					<?php if(!empty($login)){ ?>
						<li><a href=''>Historico das compras</a><i class="fas fa-angle-right"></i></li>
						<li><a href='modificarutil.php'>Dados</a><i class="fas fa-angle-right"></i></li>
						<li><a href='logout.php'>Logout</a><i class="fas fa-angle-right"></i></li>
						 <?php } else{ ?>  
						 
						<li><a href='login.php'>Login</a><i class="fas fa-angle-right"></i></li>
						<li><a href='register.php'>Registo</a><i class="fas fa-angle-right"></i></li>
					     <?php } ?>
        
					</ul>	
				</div>		
		</li>
		<li><i class="fas fa-paper-plane"></i><a href='portes.html'>Pagamento envio</a></li>
		<li><i class="fas fa-mobile-alt"></i><a href='contactos.php'>Contactos-nos </a></li>				
            

       
	</ul>
</div>
    <div class="space">

    </div>

    <div class="menu-bar2">
        <ul>
            <li><i class="fas fa-candy-cane"></i><a href='#'>Doces</a><i class="fas fa-angle-down"></i>
            <div class="sub-menu-1">
                <ul>
                    <li><a href='produtos.php?cat=gomas'>Gomas</a><i class="fas fa-angle-right"></i></li>
                    <li><a href='produtos.php?cat=chupas'>Chupas</a><i class="fas fa-angle-right"></i></li>
                    <li><a href='produtos.php?cat=pastilhas'>Pastilhas</a><i class="fas fa-angle-right"></i></li>
                </ul>
            </div>
            </li>

            <li><i class="fas fa-cookie"></i><a href='#'>Bolachas</a><i class="fas fa-angle-down"></i>
            <div class="sub-menu-1">
                <ul>
                    <li><a href='produtos.php?cat=Caseiras'>Caseiras</a><i class="fas fa-angle-right"></i></li>
                    <li><a href='produtos.php?cat=proteicas'>Proteicas</a><i class="fas fa-angle-right"></i></li>
                    <li><a href='produtos.php?cat=semgluten'>Sem Gluten</a><i class="fas fa-angle-right"></i></li>
                </ul>
            </div>
            </li>
            <li><i class="fas fa-birthday-cake"></i><a href='#'>Bolos</a><i class="fas fa-angle-down"></i>
                <div class="sub-menu-1">
                    <ul>
                        <li><a href='produtos.php?cat=aniversario'>Aniversario</a><i class="fas fa-angle-right"></i></li>
                        <li><a href='produtos.php?cat=casamento'>Casamento</a><i class="fas fa-angle-right"></i></li>
                        <li><a href='produtos.php?cat=costumizados'>Costumizados</a><i class="fas fa-angle-right"></i></li>
                    </ul>
                </div>
            </li>
			<?php if(!empty($login)){ ?>
            <div class="sub-menu-1-right">
                    <li><i class="fas fa-shopping-cart"></i><a href='carrinho.php'>Carrinho</a></li>
                </div>
			<?php } ?>
        </ul>
    </div>
 