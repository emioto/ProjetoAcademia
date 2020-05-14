<?= $this->extend('Padrao/PadraoView') ?>
<?= $this->section('Titulo') ?>Login<?= $this->endSection() ?>
<?= $this->section('Estilos') ?>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
<?= $this->endSection() ?>
<?= $this->section('Conteudo') ?>
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() { FB.init({appId: '202283884335947', cookie: true, xfbml: true, version: 'v6.0' }); FB.AppEvents.logPageView(); };
  (function(d, s, id){ var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) {return;} js = d.createElement(s); js.id = id; js.src = "https://connect.facebook.net/en_US/sdk.js"; fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));

	function statusChangeCallback(response) 
	{
    	if (response.status === 'connected') { autenticarUsuarioFacebook(); } 
  	}

  	function checkLoginState() 
	{
    	FB.getLoginStatus(function(response) 
		{
      		statusChangeCallback(response);
    	});
  	}
	
	function facebookAuth() 
	{
		FB.login(function(response) {
			checkLoginState();
		}, {scope: 'email'});
	}

  	function autenticarUsuarioFacebook() 
	{
    	FB.api('/me?locale=pt_br&fields=email', function(response) {
      		console.log(response);
			$.ajax({
				url : "<?= base_url('Autenticacao/FacebookLogIn') ?>",
				type : 'post',
				data : { ALN_EMAIL : response.email },
				success: function() {
					window.location = "<?= base_url('Aluno/Planejamento') ?>";
				}
			});
		});
  	}

</script>
<script>
      function googleAuth() {
		gapi.load('auth2', function() {
			auth2 = gapi.auth2.init({
				client_id: '914804476682-98nd0r3ej835e6pkbplfrvel1mc34t6d.apps.googleusercontent.com',
				fetch_basic_profile: false,
				scope: 'email'
			});

			// Sign the user in, and then retrieve their ID.
			auth2.signIn().then(function(response) {
				var profile = response.getBasicProfile();
				$.ajax({
					url : "<?= base_url('Autenticacao/GoogleLogIn') ?>",
					type : 'post',
					data : { ALN_EMAIL : profile.getEmail() },
					success: function() {
						window.location = "<?= base_url('Aluno/Planejamento') ?>";
					}
				});
			});
	  	});
      }
</script>
<div class="container">
	<div class="container-login100"> 
		<div class="wrap-login100 p-l-10 p-r-10 p-t-10 p-b-10">
			<center><?= view('/errors/_message_block') ?></center>
			<form class="login100-form validate-form" action="<?= base_url('Autenticacao/LogIn') ?>" method="post">
				<?= csrf_field() ?>
				<center><img src="../public/imagens/logo_dimauro.png" alt="Treinamento Di Mauro" width='110' height='130'></center>
				<div class="wrap-input100 validate-input m-b-20" data-validate = "O campo usuário deve ser preenchido">
					<span class="label-input100">Usuário</span>
					<input class="input100" type="text" name="ALN_EMAIL" autocomplete="on" placeholder="Digite seu e-mail">
					<span class="focus-input100" data-symbol="&#xf206;"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate="O campo senha deve ser preenchido">
					<span class="label-input100">Senha</span>
					<input id="campoSenha" class="input100" type="password" name="ALN_SENHA" placeholder="Digite sua senha">
					<span class="focus-input100" data-symbol="&#xf190;"></span>
					<div id="verSenha" class="fa fa-eye-slash" style="position: absolute; top: 50%; right: 15px; cursor: pointer;"></div>
				</div>			
				<div class="txt1 text-right p-t-8 p-b-20">
					<a href="<?= base_url('Recuperar') ?>">Esqueceu a senha?</a>
				</div>				
				<div class="container-login100-form-btn">
					<div class="wrap-login100-form-btn">
						<div class="login100-form-bgbtn"></div>
						<button type="submit" class="login100-form-btn">
							Entrar
						</button>
					</div>
				</div>
				<div class="txt1 text-center p-t-25 p-b-20">
					<span>
						Ou conecte-se com
					</span>
				</div>
			</form>
			<div class="flex-c-m">
				<button onClick="facebookAuth()" class="login100-social-item bg1">
					<i class="fa fa-facebook"></i>
				</button>
				<button onClick="googleAuth()" class="login100-social-item bg3">
						<i class="fa fa-google"></i>
				</button>
			</div>
			<div class="flex-col-c p-t-20">
				<span class="txt1">Ainda não tem conta? <a href="<?= base_url('Registrar') ?>" class="txt2">Crie agora</a></span>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection() ?>
<?= $this->section('Scripts') ?>
	<script>
		$("#verSenha").on("click", function () {
				var campoSenha = $("#campoSenha");
    				if (campoSenha.attr('type') === 'password') {
        				campoSenha.attr('type', 'text');
						$("#verSenha").removeClass('fa fa-eye-slash');
						$("#verSenha").addClass('fa fa-eye');
					}
    				else {
        				campoSenha.attr('type', 'password');
						$("#verSenha").removeClass('fa fa-eye');
						$("#verSenha").addClass('fa fa-eye-slash');
					}
		});
	</script>
<?= $this->endSection() ?>