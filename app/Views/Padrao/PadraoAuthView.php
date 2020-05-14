<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
		<title>Di Mauro :: <?= $this->renderSection('Titulo') ?></title>
        <link rel="shortcut icon" type="image/png" href="../favicon.ico" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../public/estilos/demo.css" />
		<link rel="stylesheet" type="text/css" href="../public/estilos/component.css" />
		<link rel="stylesheet" type="text/css" href="../public/estilos/material-design-iconic-font.min.css">
		<link rel="stylesheet" type="text/css" href="../public/estilos/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../public/estilos/animate.css">
		<link rel="stylesheet" type="text/css" href="../public/estilos/hamburgers.min.css">
		<link rel="stylesheet" type="text/css" href="../public/estilos/animsition.min.css">
		<link rel="stylesheet" type="text/css" href="../public/estilos/select2.min.css">
		<link rel="stylesheet" type="text/css" href="../public/estilos/daterangepicker.css">
		<link rel="stylesheet" type="text/css" href="../public/estilos/util.css">
		<link rel="stylesheet" type="text/css" href="../public/estilos/main.css">
		<?= $this->renderSection('Estilos') ?>
        <body>
		<div class="container">
			<ul id="gn-menu" class="gn-menu-main">
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu"><span>Menu</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller">
							<ul class="gn-menu">
								<li><a href="<?= base_url('Aluno/Planejamento') ?>" class="gn-icon gn-icon-assignment">Meu Planejamento</a></li> 
								<li><a href="<?= base_url('Aluno/Treinos') ?>" class="gn-icon gn-icon-file">Treinos</a></li>
								<!--<li><a href="<?= base_url('Aluno/Resultados') ?>" class="gn-icon gn-icon-plan-check">Resultados</a></li>-->
								<li><a href="<?= base_url('Aluno/Exercicios') ?>" class="gn-icon gn-icon-exercise">Exercícios</a></li>
								<li><a href="<?= base_url('Aluno/Metodos') ?>" class="gn-icon gn-icon-folder">Métodos</a></li>
								<li><a href="<?= base_url('Aluno/Variaveis') ?>" class="gn-icon gn-icon-layers">Variáveis</a></li>
								<li><a href="<?= base_url('Aluno/MaterialDeApoio') ?>" class="gn-icon gn-icon-library">Materiais de Apoio</a></li>
								<li><a href="<?= base_url('Aluno/Streaming') ?>" class="gn-icon gn-icon-video">Streaming</a></li>
								<li><a href="<?= base_url('Aluno/Conta') ?>" class="gn-icon gn-icon-account">Conta</a></li>
								<li><a href="<?= base_url('Logout') ?>" class="gn-icon gn-icon-forward">Sair</a></li>
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				<div style="text-align: center;padding-right: 60px;"><img src="../public/imagens/logo_dimauro.png" alt="Treinamento Di Mauro" width="42" height="50"></div>
			</ul>
			<header>
                <?= $this->renderSection('Conteudo') ?>
			</header>
		</div><!-- /container -->
		<script src="../public/javascripts/modernizr.custom.js"></script>
		<script src="../public/javascripts/classie.js"></script>
		<script src="../public/javascripts/gnmenu.js"></script>
		<script>new gnMenu( document.getElementById( 'gn-menu' ) );</script>
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script>
		<script src="../public/javascripts/animsition.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="../public/javascripts/select2.min.js"></script>
		<script src="../public/javascripts/moment.min.js"></script>
		<script src="../public/javascripts/daterangepicker.js"></script>
		<script src="../public/javascripts/countdowntime.js"></script>
		<script src="../public/javascripts/main.js"></script>	
        <?= $this->renderSection('Scripts') ?>
    </body>
</html>