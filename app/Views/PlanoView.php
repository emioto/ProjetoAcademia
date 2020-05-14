<?= $this->extend('Padrao/PadraoView') ?>
<?= $this->section('Titulo') ?> Planos <?= $this->endSection() ?>
<?= $this->section('Estilos') ?> 
    <style>

        body
        {
            /*background-color: rgba(0,0,0,0.05);*/
        }

        .nav{
            padding-left: 20px;
        }

        .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
            color: #ec3e5f;
            background-color: unset;
        }

        .nav-pills .nav-link {
            color: #999fa4;
            border-bottom: 1px solid;
            margin-right: 20px;
            border-radius: unset;
        }

        .nav-pills .nav-link:hover {
            color: #ec3e5f;
        }
        h4.heading {
            text-transform: uppercase;
            border-bottom: 1px solid;
            padding-bottom: 3px;
            margin-top: 30px;
            font-size: 14px;
        }
        .input100 {
            padding: 20px 7px 0 43px;
            font-size: smaller;
        }
        .wrap-login100-form-btn {
            width: 300px;
        }
        ul[class*="ui-autocomplete"] {
            background-color: #fff;
            z-index: 9999;
            width: 200px;
            list-style-type : none!important;
            padding-left: 5px!important;
            padding-right: 5px!important;
        }
        .ui-menu-item:hover {
            background-color: #ec3e5f;
            cursor: pointer;
        }
        .ui-helper-hidden-accessible {
            visibility: hidden;
        }
        .btn-primary
        {
            display:block;
            border: none;
            margin-top:-5px;
            width: 150px;
            cursor: pointer;
            background-color: #ec3e5f;
        }
        .btn-primary:hover
        {
            background-color: #ec3e5f;
        }

        select {
            border:none;
        }

        #rowPrincipal {
            width: 900px;
            margin-top: 10vh;
            margin-left: auto;
            margin-right: auto;
        }

        #blocoFixo {
            height: 400px;
            background-color: #edf2f1;
            border: 5px solid #fff;
            border-radius: 20px;
        }

        #blocoFixoDegrade {
            height: 400px;
            background: linear-gradient(0deg, rgba(253,45,63,1) 22%, rgba(245,52,127,1) 93%);
            border: 5px solid #fff;
            border-radius: 20px;
        }

        .form-btn-branco {
            color: #000;
        }

        @media screen and (max-width: 768px) {
            #rowPrincipal 
            {
                width: 100%;
                margin-top: 10px;
            }
        }
    </style>
<?= $this->endSection() ?>
<?= $this->section('Conteudo') ?>
    <div id="rowPrincipal" class="row"> 
        <div class="col-12 col-md-12 col-xl-12">
            <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-plano" role="tab" aria-controls="pills-plano" aria-selected="true">Plano</a></li>
                <li class="nav-item"><a class="nav-link disabled" id="pills-cadastro-tab" data-toggle="pill" href="#pills-cadastro" role="tab" aria-controls="pills-cadastro" aria-selected="false">Cadastro</a></li>
                <li class="nav-item"><a class="nav-link disabled" id="pills-pagamento-tab" data-toggle="pill" href="#pills-pagamento" role="tab" aria-controls="pills-pagamento" aria-selected="false">Pagamento</a></li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-plano" role="tabpanel" aria-labelledby="pills-plano-tab">
                    <div class="container-login100">
                        <div class="row">
                            <div id="blocoFixo" class="col-12 col-md-4 col-xl-4">
                                <center><span class="txt3"><?= $Titulo ?></span></center>        
                                <center>
                                    <div class="mt-4 mb-4">
                                        <div class="txt1">R$
                                            <div class="txt4" id="valorTotal" style="display: inline;"> <?= number_format($Valor, 2, ',', '.'); ?></div>
                                        </div>
                                    </div>
                                </center>
                                <div style="padding: 0 20px 0 20px;">
                                    <span class="txt1"><?= $Detalhes ?></span>
                                </div>
                                <div class="container-login100-form-btn">
                                    <div class="wrap-login100-form-btn">
                                        <div class="form-btn-branco-cinza bsSolid brRadius30">Plano Escolhido</div>
                                    </div>
                                </div>
                            </div>
                            <div id="blocoFixo" class="col-12 col-md-4 col-xl-4">
                                <div style="margin-top: 10vh;">
                                    <center><div class="txt2">Já sou <b>Cadastrado</b></div></center>
                                    <center><?= view('/errors/_message_block') ?></center>
                                    <form name="formUsuario" id="formUsuario" method="post" action="javascript:void(0)">
                                        <?= csrf_field() ?>
                                        <div class="wrap-input100 validate-input m-b-20" data-validate="O campo usuário deve ser preenchido">
                                            <input class="input100" type="text" name="ALN_EMAIL" autocomplete="on" placeholder="Digite seu e-mail" />
                                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                                        </div>
                                        <div class="wrap-input100 validate-input" data-validate="O campo senha deve ser preenchido">
                                            <input id="campoSenha" class="input100" type="password" name="ALN_SENHA" placeholder="Digite sua senha" />
                                            <span class="focus-input100" data-symbol="&#xf190;"></span>
                                            <div id="verSenha" class="fa fa-eye-slash" style="position: absolute; top: 50%; right: 15px; cursor: pointer;"></div>
                                        </div>
                                        <div class="txt1 text-right p-t-8 p-b-20">
                                            <a href="<?= base_url('Autenticacao/Recuperar') ?>">Esqueceu a senha?</a>
                                        </div>
                                        <div class="container-login100-form-btn">
                                            <div class="wrap-login100-form-btn">
                                                <div class="login100-form-bgbtn"></div>
                                                <button type="submit" class="login100-form-btn">
                                                    Entrar
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="blocoFixoDegrade" class="col-12 col-md-4 col-xl-4">
                                <div style="margin-top: 50%;">
                                    <div class="txt3 text-center p-t-10" style="color: #fff"><span>Ainda não tenho</span></div>
                                    <div class="txt3b text-center p-b-10" style="color: #fff"><span>Cadastro</span></div>                                
                                    <div class="wrap-exercise bgBranco">
                                        <div class="container-login100-form-btn">
                                            <div class="wrap-login100-form-btn bgBranco">
                                                <button id="btnNovoCadastro" class="form-btn-branco">Cadastre-se agora</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-cadastro" role="tabpanel" aria-labelledby="pills-cadastro-tab">         
                    <form class="login100-form validate-form" name="formPessoa" id="formPessoa" method="post">
						<input name="ALN_ID" type="hidden" />
                        <input name="ALN_IBGE" type="hidden" />
                        <div class="row">
                            <div id="blocoFixo" class="col-12 col-md-4 col-xl-4">
                                <center><span class="txt3"><?= $Titulo ?></span></center>        
                                <center>
                                    <div class="mt-4 mb-4">
                                        <div class="txt1">R$
                                            <div class="txt4" id="valorTotal" style="display: inline;"> <?= number_format($Valor, 2, ',', '.'); ?></div>
                                        </div>
                                    </div>
                                </center>
                                <div style="padding: 0 20px 0 20px;">
                                    <span class="txt1"><?= $Detalhes ?></span>
                                </div>
                                <div class="container-login100-form-btn">
                                    <div class="wrap-login100-form-btn">
                                        <div class="form-btn-branco-cinza bsSolid brRadius30">Plano Escolhido</div>
                                    </div>
                                </div>
                            </div>
							<div id="blocoFixo" class="col-12 col-md-4 col-xl-4">
								<h4 class="heading">Dados Pessoais</h4>
								<div class="row">
									<div class="col-12 col-md-12 col-xl-12">
										<div class="wrap-input100 validate-input m-b-10" data-validate="Nome deve ser Preenchido">
											<input class="input100" type="text" name="ALN_NOME" placeholder="Nome completo">
											<span class="focus-input100" data-symbol="&#xf207;"></span>
										</div>
									</div>
								</div>
								<div class="row">
                                    <div class="col-12 col-md-12 col-xl-6">
                                        <div class="wrap-input100 validate-input m-b-10" data-validate="CPF deve ser preenchido">
                                            <input class="input100" type="text" name="ALN_CPF" placeholder="CPF">
                                            <span class="focus-input100" data-symbol="&#xf106;"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 col-xl-6">
                                        <div class="wrap-input100 validate-input m-b-10" data-validate="Data de Nascimento deve ser preenchida">
                                            <input class="input100" type="date" name="ALN_DATANASC" placeholder="Data de Nascimento">
                                            <span class="focus-input100" data-symbol="&#xf332;"></span>
                                        </div>
                                    </div>
                                </div>
								<h4 class="heading">Dados de Acesso</h4>
								<div class="row">
									<div class="col-12 col-md-12 col-xl-12">
										<div class="wrap-input100 validate-input m-b-10" data-validate="Email deve ser preenchido">
											<input class="input100" type="text" name="ALN_EMAIL" placeholder="Endereço de E-mail">
											<span class="focus-input100" data-symbol="&#xf206;"></span>
										</div>
										<div class="wrap-input100 validate-input m-b-10" data-validate="Senha deve ser preenchida">
                                            <input id="campoSenha2" class="input100" type="password" name="ALN_SENHA" placeholder="Senha de acesso" />
                                            <span class="focus-input100" data-symbol="&#xf190;"></span>
                                            <div id="verSenha2" class="fa fa-eye-slash" style="position: absolute; top: 50%; right: 15px; cursor: pointer;"></div>
										</div>
									</div>
								</div>		
							</div>
							<div id="blocoFixo" class="col-12 col-md-4 col-xl-4">
								<h4 class="heading">Endereço</h4>
								<div class="row">
                                    <div class="col-12 col-md-12 col-xl-4">
										<div class="wrap-input100 validate-input m-b-10" data-validate="CEP deve ser preenchido">
											<input class="input100" type="text" name="ALN_CEP" placeholder="CEP">
											<span class="focus-input100" data-symbol="&#xf1ab;"></span>
										</div>
									</div>
									<div class="col-12 col-md-12 col-xl-8">
										<div class="wrap-input100 validate-input m-b-10" data-validate="Endereço ser preenchida">
											<input class="input100" type="text" name="ALN_ENDERECO" placeholder="Endereço">
											<span class="focus-input100" data-symbol="&#xf175;"></span>
										</div>
									</div>
                                </div>
								<div class="row">
									<div class="col-12 col-md-12 col-xl-4">
										<div class="wrap-input100 validate-input m-b-10" data-validate="Número deve ser preenchido">
											<input class="input100" type="text" name="ALN_ENDNUMERO" placeholder="Número">
											<span class="focus-input100" data-symbol="&#xf3bd;"></span>
										</div>
									</div>
									<div class="col-12 col-md-12 col-xl-8">
										<div class="wrap-input100 validate-input m-b-10" data-validate="Bairro deve ser preenchido">
											<input class="input100" type="text" name="ALN_BAIRRO" placeholder="Bairro">
											<span class="focus-input100" data-symbol="&#xf1a1;"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12 col-md-12 col-xl-6">
										<div class="wrap-input100 validate-input m-b-10" data-validate="Município deve ser preenchido">
											<input id="municipios" class="input100" type="text" name="ALN_CIDADE" placeholder="Município">
											<span class="focus-input100" data-symbol="&#xf196;"></span>
										</div>
									</div>
									<div class="col-12 col-md-12 col-xl-6">
										<div class="wrap-input100 validate-input m-b-10" data-validate="UF deve ser preenchido">
											<input id="estados" class="input100" type="text" name="ALN_ESTADO" placeholder="UF">
											<span class="focus-input100" data-symbol="&#xf299;"></span>
										</div>
									</div>
								</div>
								<div class="wrap-input100 m-b-10" data-validate="Complemento deve ser preenchido">
									<input class="input100" type="text" name="ALN_COMPLEMENTO" placeholder="Complemento">
									<span class="focus-input100" data-symbol="&#xf1f8;"></span>
								</div>
							</div>
						</div>
                        <div class="row">
                            <div class="col-12 col-md-12 col-xl-12">
                                <div class="container-login100-form-btn m-b-30">
                                    <div class="wrap-login100-form-btn">
                                        <div class="login100-form-bgbtn"></div>
                                        <button type="submit" class="login100-form-btn">Realizar Cadastro</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-pagamento" role="tabpanel" aria-labelledby="pills-pagamento-tab">
                    <div class="row">
                        <div id="blocoFixo" class="col-12 col-md-4 col-xl-4">
                            <center><span class="txt3"><?= $Titulo ?></span></center>        
                            <center>
                                <div class="mt-4 mb-4">
                                    <div class="txt1">R$
                                        <div class="txt4" id="valorTotal" style="display: inline;"> <?= number_format($Valor, 2, ',', '.'); ?></div>
                                    </div>
                                </div>
                            </center>
                            <div style="padding: 0 20px 0 20px;">
                                <span class="txt1"><?= $Detalhes ?></span>
                            </div>
                            <div class="container-login100-form-btn">
                                <div class="wrap-login100-form-btn">
                                    <div class="form-btn-branco-cinza bsSolid brRadius30">Plano Escolhido</div>
                                </div>
                            </div>
                        </div>
                        <div id="blocoFixo" class="col-12 col-md-8 col-xl-8">
                            <center>
                                <div class="txt3 p-t-20">Olá <span id="nomeAlunoCompra"></span> seja bem vindo!</div>
                                <div class="txt3 p-b-20">Você escolheu adquirir <?= $Titulo ?> no valor total de R$ <?= number_format($Valor, 2, ',', '.'); ?></div>
                                <!--<div class="input-group mb-3">
                                    <div style="width: calc(100% - 155px); float: left;" class="wrap-input100 m-b-10">
                                        <span class="label-input100">Cupom</span>
                                        <input class="input100" type="text" id="codigoCupom"  autocomplete="on" placeholder="Digite aqui um cupom válido" />
                                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                                    </div>
                                    <button style="position: absolute; bottom: 10px; right: 0; height: 50px;"id="btnAdicionarCupom" class="btn btn-primary" type="button">Adicionar</button>
                                </div>
                                <div id="validacaoCupom">Nenhum cupom adicionado!</div>-->
                                <div>
                                    <div class="txt2"><b>Escolha sua forma de pagamento: </b></div>
                                    <form name="formUsuarioCompra" method="post" action="">
                                        <input name="PLN_ID" type="hidden" value="<?= $Id ?>" />
                                        <input name="ALN_ID" id="ALN_ID" type="hidden" value="" />
                                        <input name="CPN_ID" id="CPN_ID" type="hidden" value="" />
                                        <input type="image" class="pagseguro" width="200" id="btnCmpFinalizar" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-comprar-laranja-assina.gif" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
                                        <input type="image" class="paypal" width="200" id="btnCmpFinalizarPay" src="../public/imagens/btn_checkoutpaypal.jpg" border="0" alt="Pague com Paypal!" />
                                    </form>
                                    <div class="txt2"><b>você será redirecionado para a pagina de pagamento da administradora selecionada</b></div>
                                </div>
                            </center>
                        </div>
                    </div>
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

    $("#verSenha2").on("click", function () {
		var campoSenha = $("#campoSenha2");
   		if (campoSenha.attr('type') === 'password') {
       		campoSenha.attr('type', 'text');
			$("#verSenha2").removeClass('fa fa-eye-slash');
			$("#verSenha2").addClass('fa fa-eye');
		}
   		else {
       		campoSenha.attr('type', 'password');
			$("#verSenha2").removeClass('fa fa-eye');
			$("#verSenha2").addClass('fa fa-eye-slash');
		}
	});
</script>
<script>
    $("#formUsuario").submit(function(e) {
        $.ajax({
            url: "<?= base_url('Plano/LogIn') ?>",
            type: "POST",
            data: $('#formUsuario').serialize(),
            success: function(retorno) {
                if(retorno.sucesso)
                {
                    $('#ALN_ID').val(retorno.idAluno);
                    $("#nomeAlunoCompra").html(retorno.nomeAlunoCompra);
                    $('#pills-pagamento-tab').removeClass('disabled');
                    $('[href="#pills-pagamento"]').tab('show');
                }
                else
                    location.reload();
            }
        });
    });

    $("#formPessoa").submit(function(e) {
        if(e.result == true)
        {
            $.ajax({
                url: "<?= base_url('Plano/Cadastrar') ?>",
                type: "POST",
                data: $('#formPessoa').serialize(),
                success: function() {
                    location.reload();
                }
            });
        }
    });

    $('#btnNovoCadastro').on('click', function () 
    { 
        $('#pills-cadastro-tab').removeClass('disabled');
        $('[href="#pills-cadastro"]').tab('show'); 
    });

    $('#btnCadastrar').on('click', function () 
    { 
        $('#ALN_ID').val(1);
        $('#pills-pagamento-tab').removeClass('disabled');
        $('[href="#pills-pagamento"]').tab('show'); 
    });

    $('#btnAdicionarCupom').on('click', function () 
    { 
        $.ajax({
            url: "<?= base_url('Plano/ObterCupom') ?>",
            type: "POST",
            data: { codigo: $('#codigoCupom').val() },
            success: function(retorno) {
                if(retorno.Codigo)
                {
                    var valorOriginal = Number('<?= $Valor ?>');
                    $('#CPN_ID').val(retorno.CPN_ID);
                    $('#valorTotal').html((valorOriginal - (((valorOriginal * retorno.Valor) / 100))).toLocaleString('pt-BR'));
                    $('#validacaoCupom').html('Cupom adicionado com sucesso!');
                }
                else
                {
                    $('#CPN_ID').val('');
                    $('#valorTotal').html(('<?= number_format($Valor, 2, ',', '.'); ?>'));
                    $('#validacaoCupom').html('Cupom Inválido!');
                }
            }
        });
    });
  </script>
  <?= $this->endSection() ?>