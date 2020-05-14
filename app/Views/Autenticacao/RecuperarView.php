<?= $this->extend('Padrao/PadraoView') ?>
<?= $this->section('Titulo') ?>Recuperar Senha<?= $this->endSection() ?>
<?= $this->section('Conteudo') ?>
<div class="container">
    <div class="container-login100"> 
		<div class="wrap-login100 p-l-10 p-r-10 p-t-10 p-b-10">
            <center><?= view('/errors/_message_block') ?></center>
			<form class="login100-form validate-form" action="<?= base_url('Autenticacao/EnviarInstrucoes') ?>" method="post">
				<center><img src="../public/imagens/logo_dimauro.png" alt="Treinamento Di Mauro" width="110" height="130"></center>
				<div class="txt1 m-t-40" data-validate = "Esqueceu sua senha?">
					<span class="txt1">Esqueceu sua senha?</span>
				</div>
				<div class="txt1 m-t-23" data-validate = "Esqueceu sua senha?">
					<span class="txt1">Sem problemas! Digite seu e-mail que enviaremos as instruções para recuperação.</span>
				</div>	
				<div class="wrap-input100 validate-input m-b-23" data-validate="O campo e-mail deve ser preenchido">
					<span class="label-input100"></span>
					<input class="input100" type="text" name="ALN_EMAIL" placeholder="digite seu email">
					<span class="focus-input100" data-symbol="&#xf15a;"></span>
				</div>					
				<div class="container-login100-form-btn">
					<div class="wrap-login100-form-btn">
						<div class="login100-form-bgbtn"></div>
						<button class="login100-form-btn">
                               Enviar instruções
						</button>
					</div>
				</div>	
				<div class="flex-col-c p-t-20">
					<a href="<?= base_url("Login")?>" class="txt2">Voltar</a>
				</div>							
			</form>
		</div>
	</div>
</div>
<?= $this->endSection() ?>