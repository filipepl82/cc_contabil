<nav class="menuprincipal alt" id="principal">	
	<a href="index.html" class="logo px-3"><img src="<?php echo URL_BASE ?>assets/img/logo-laravel.png" class="d-inline-block img-fluido"></a>
	<ul class="menu-ul menu-lista">
		<small><a href="index.html"><b><i class="fas fa-home"></i> Página Inicial</b></a></small>
		<!--<h1 class="tt px-2"><b> Contábil/Financeiro</b></h1>-->
		<div id="accordion">
			<small><b><i class="fas fa-calculator"></i> Empresa</b></small>
			<ul>
				<li><a href="<?php echo URL_BASE . "empresa" ?>" class="nav-link text-light"> Lista</a></li>							
				<li><a href="<?php echo URL_BASE . "empresa/create" ?>" class="nav-link text-light"> Novo </a></li>
			</ul>
			<small><b><i class="fas fa-calculator"></i> Banco</b></small>
			<ul>
				<li><a href="<?php echo URL_BASE . "banco" ?>" class="nav-link text-light"> Lista</a></li>							
				<li><a href="<?php echo URL_BASE . "banco/create" ?>" class="nav-link text-light"> Novo </a></li>
			</ul>	
			<small><b><i class="fas fa-calculator"></i> Plano de Contas</b></small>
			<ul>
				<li><a href="<?php echo URL_BASE . "planoconta" ?>" class="nav-link text-light"> Lista</a></li>							
				<li><a href="<?php echo URL_BASE . "planoconta/create" ?>" class="nav-link text-light"> Novo </a></li>
			</ul>
			<small><b><i class="fas fa-calculator"></i> Cliente</b></small>
			<ul>
				<li><a href="<?php echo URL_BASE . "cliente" ?>" class="nav-link text-light"> Lista</a></li>							
				<li><a href="<?php echo URL_BASE . "cliente/create" ?>" class="nav-link text-light"> Novo </a></li>
			</ul>
			<small><b><i class="fas fa-calculator"></i> Venda</b></small>
			<ul>							
				<li><a href="<?php echo URL_BASE . "cliente/teste" ?>" class="nav-link text-light"> Novo </a></li>
			</ul>
		</div>
    </ul>
</nav>