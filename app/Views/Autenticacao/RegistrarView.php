<?= $this->extend('Padrao/PadraoView') ?>
<?= $this->section('Titulo') ?>Registrar<?= $this->endSection() ?>
<?= $this->section('Conteudo') ?>
<div class="container">
    <div class="container-login100"> 
		<div class="wrap-login100 p-l-10 p-r-10 p-t-10 p-b-10">
            <center><?= view('/errors/_message_block') ?></center>
			<form class="login100-form validate-form">
				<center><img src="../public/imagens/logo_dimauro.png" alt="Treinamento Di Mauro" width="110" height="130"></center>
				<div class="wrap-input100 validate-input m-b-23" data-validate = "E-mail deve ser preenchido">
					<span class="label-input100">E-mail</span>
					<input class="input100" type="text" name="ALN_EMAIL" placeholder="Digite seu e-mail">
					<span class="focus-input100" data-symbol="&#xf15a;"></span>
				</div>
				<div class="wrap-input100 validate-input m-b-23" data-validate="Senha deve ser preenchida">
					<span class="label-input100">Senha</span>
					<input class="input100" type="password" name="ALN_SENHA" placeholder="Digite sua senha">
					<span class="focus-input100" data-symbol="&#xf190;"></span>
					<span class="ffa-eye-slash" data-symbol="&#xf190;"></span>
				</div>		
				<div class="wrap-input100 validate-input m-b-23" data-validate="Repita sua senha">
					<span class="label-input100">Repetir Senha</span>
					<input class="input100" type="password" name="ALN_RE_SENHA" placeholder="Digite sua senha novamente">
					<span class="focus-input100" data-symbol="&#xf180;"></span>
				</div>			
				<div class="container-login100-form-btn">
					<div class="wrap-login100-form-btn">
						<div class="login100-form-bgbtn"></div>
						<button class="login100-form-btn">
							Registrar
						</button>
					</div>
				</div>
				<div class="flex-col-c p-t-20">
					<span class="txt1 p-b-15">Já é registrado? <a href="<?= base_url("Login")?>" class="txt2">Acesse agora</a></span>
				</div>
			</form>
		</div>
	</div>
</div>
<?= $this->endSection() ?>