<?= $this->extend('Padrao/PadraoAuthView') ?>
<?= $this->section('Titulo') ?> Aluno > Planejamento <?= $this->endSection() ?>
<?= $this->section('Conteudo') ?>
<div class="limiter">
	<?php if (isset($TreinoAtrasado)) : ?>
		<?php if (!$ExisteTreinoHoje) : ?>
			<div class="container-login100">
				<div class="wrap-login100 p-l-10 p-r-10 p-t-10 p-b-10" width="130" height="130">
					<div class="txt1 text-center p-t-25 p-b-5">
						<h2><?= $TreinoAtrasado->Titulo.' - '.$TreinoAtrasado->Data->format("d/m") ?></h2>
						<span>Você não tem treino hoje! Aproveite para aprender sobre as variaveis e métodos!</span>
					</div>
				</div>
			</div>
		<?php else: ?>
			<div class="container-login100">
				<div class="wrap-login100 p-l-10 p-r-10 p-t-10 p-b-10" width="130" height="130">
					<center><img src="../public/imagens/warning.png" alt="Warning" width="50" height="50"></center>
					<div class="txt1 text-center p-t-25 p-b-5">
						<h2><?= $TreinoAtrasado->Titulo.' - '.$TreinoAtrasado->Data->format("d/m") ?></h2>
						<span>Os treinos estão atrasados</span>
					</div>
				<div class="txt1 text-center p-t-25 p-b-30">
					<span>Informe se você realizou o treino do dia <span id="TreinoAtrasadoData"><?= $TreinoAtrasado->Data->format("d/m") ?></span></span>
				</div>
				<div class="container-login100-form-btn">
					<div class="wrap-login100-form-btn">
						<button id="btn_concluir" class="login100-form-btn bgVerde">Concluído</button>
					</div>
				</div>
				<div class="container-login100-form-btn p-t-15">
					<div class="wrap-login100-form-btn">
						<button id="btn_pular" class="login100-form-btn bgVermelho">Pulei</button>
					</div>
				</div>
			</div>
			<input id="CNC_TRN_ID" type="hidden" value="<?= $TreinoAtrasado->IdTreino ?>" />
			<input id="CNC_DATA" type="hidden" value="<?= $TreinoAtrasado->Data->format('Y-m-d') ?>" />
		<?php endif ?>
	<?php elseif (isset($TreinoDia) && ($TreinoDia->Data <= new \DateTime())) : ?>
		<?php if (!$ExisteTreinoHoje) : ?>
		<div class="container-login100">
			<div class="wrap-login100 p-l-10 p-r-10 p-t-10 p-b-10" width="130" height="130">
				<div class="txt1 text-center p-t-25 p-b-5">
					<center><img src="../public/imagens/book.png" alt="Book" width="50" height="50"></center>
					<h2 id="TreinoDiaHeader"><?= $TreinoDia->Titulo.' - '.$TreinoDia->Data->format("d/m") ?></h2>
					<span>Você não tem treino hoje! Aproveite para aprender sobre as variaveis e métodos!</span>
				</div>
			</div>
		</div>
		<?php else: ?>
			<div class="row">
				<div class="col-12">
					<div class="txt1 text-center p-t-10 p-b-10">
						<h2><?= $TreinoDia->Titulo.' - '.$TreinoDia->Data->format("d/m") ?></h2>
						<span>Informe se você realizou o treino de hoje</span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="wrap-exercise p-l-10 p-r-10 p-t-10 p-b-10 bgBranco">
						<div class="txt3 text-center p-t-10 p-b-10"><span>Variáveis</span></div>
						<div class="container-login100-form-btn p-t-5">
							<div class="wrap-login100-form-btn bgBranco"><button class="form-btn-branco bsSolid brRadius20">SÉRIE: <?= $TreinoDia->Serie ?></button></div>
						</div>
						<div class="container-login100-form-btn p-t-5">
							<div class="wrap-login100-form-btn bgBranco"><button class="form-btn-branco bsSolid brRadius20">REPETIÇÕES: <?= $TreinoDia->Repeticoes ?></button></div>
						</div>
						<div class="container-login100-form-btn p-t-5">
							<div class="wrap-login100-form-btn bgBranco"><button class="form-btn-branco bsSolid brRadius20">VELOCIDADE DA EXECUÇÃO: <?= $TreinoDia->Execucao ?></button></div>
						</div>
						<div class="container-login100-form-btn p-t-5">
							<div class="wrap-login100-form-btn bgBranco"><button class="form-btn-branco bsSolid brRadius20">INTERVALO ENTRE AS SÉRIES: <?= $TreinoDia->IntervaloSeries ?></button></div>
						</div>
						<div class="container-login100-form-btn p-t-5">
							<div class="wrap-login100-form-btn bgBranco"><button class="form-btn-branco bsSolid brRadius20">INTERVALO ENTRE EXERCÍCIOS: <?= $TreinoDia->IntervaloExercicios ?></button></div>
						</div>
						<div class="container-login100-form-btn p-t-5">
							<div class="wrap-login100-form-btn bgBranco"><button class="form-btn-branco bsSolid brRadius20">PERCEPÇÃO DE ESFORÇO: <?= $TreinoDia->Percepcao ?></button></div>
						</div>
						<div class="container-login100-form-btn p-t-20">
							<div class="wrap-login100-form-btn bgPreto"><button onclick="window.open('<?= base_url('Aluno/Variaveis') ?>')"  class="form-btn-preto">Entenda as variáveis</button></div>
						</div>
					</div>
				</div>
				<?php if (count($ExercicosTreino) > 0) : ?>			
				<div class="col">
					<div class="wrap-exercise p-l-10 p-r-10 p-t-10 p-b-10">
						<div class="txt3 text-center p-t-10 p-b-10"><span>Exércicios do dia</span></div>
						<?php foreach ($ExercicosTreino as $ExercicoTreino):?>
							<div class="container-login100-form-btn p-t-5">
								<div class="wrap-login100-form-btn bgBranco"><button onclick="window.open('<?= $ExercicoTreino->EXE_LINK ?>')" class="form-btn-branco"><?= $ExercicoTreino->EXE_TITULO ?></button></div>
							</div>
						<?php endforeach;?>
						<div class="container-login100-form-btn p-t-15 p-b-5">
							<div class="wrap-login100-form-btn">
								<button onclick="window.open('https://api.whatsapp.com/send?phone=5519984409949&text=Oi%20Vitor!%20Preciso%20de%20ajuda!%20T%C3%A1%20dif%C3%ADcil%20ir%20treina!.%20O%20que%20fa%C3%A7o%3F')" class="login100-form-btn bgPreto">Estou com dificuldades</button>
							</div>
						</div>
					</div>
				</div>
				<?php endif ?>
				<?php if (isset($ExercicoTreinoAerobico)) : ?>
				<div class="col">
					<div class="wrap-exercise p-l-10 p-r-10 p-t-10 p-b-10">
						<div class="txt3 text-center p-t-10 p-b-10"><span>Aeróbio</span></div>
						<div class="container-login100-form-btn">
							<div class="wrap-login100-form-btn bgBranco"><button class="form-btn-branco">NOME: <?= $ExercicoTreinoAerobico->Titulo ?></button></div>
						</div>
						<div class="container-login100-form-btn p-t-5">
							<div class="wrap-login100-form-btn bgBranco"><button class="form-btn-branco">ROUNDS: <?= $ExercicoTreinoAerobico->Rounds ?></button></div>
						</div>
						<div class="container-login100-form-btn p-t-5">
							<div class="wrap-login100-form-btn bgBranco"><button class="form-btn-branco">ESTÍMULOS: <?= $ExercicoTreinoAerobico->Estimulos ?></button></div>
						</div>
						<div class="container-login100-form-btn p-t-5">
							<div class="wrap-login100-form-btn bgBranco"><button class="form-btn-branco">INTENSIDADE: <?= $ExercicoTreinoAerobico->Intensidade ?></button></div>
						</div>
						<div class="container-login100-form-btn p-t-5">
							<div class="wrap-login100-form-btn bgBranco"><button class="form-btn-branco">PAUSA: <?= $ExercicoTreinoAerobico->Pausa ?></button></div>
						</div>
						<div class="container-login100-form-btn p-t-5">
							<div class="wrap-login100-form-btn bgBranco"><button class="form-btn-branco">TIPO: <?= $ExercicoTreinoAerobico->Tipo ?></button></div>
						</div>
						<div class="container-login100-form-btn p-t-5">
							<div class="wrap-login100-form-btn bgBranco"><button class="form-btn-branco">TOTAL DE TEMPO: <?= $ExercicoTreinoAerobico->TotalTempo ?></button></div>
						</div>
					</div>
				</div>
				<?php endif ?>
			</div>
			<div class="row">
				<div class="col-12 col-md-2 col-xl-2"></div>
				<div class="col-12 col-md-4 col-xl-4">
					<div class="container-login100-form-btn p-t-15 p-b-5">
						<div class="wrap-login100-form-btn">
							<button id="btn_concluir" class="login100-form-btn bgVerde">Concluído</button>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-4 col-xl-4">
					<div class="container-login100-form-btn p-t-15 p-b-5">
						<div class="wrap-login100-form-btn">
							<button id="btn_pular" class="login100-form-btn bgVermelho">Pulei</button>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-2 col-xl-2"></div>
			</div>
		</div>
		<input id="CNC_TRN_ID" type="hidden" value="<?= $TreinoDia->IdTreino ?>" />
		<input id="CNC_DATA" type="hidden" value="<?= $TreinoDia->Data->format('Y-m-d') ?>" />
		<?php endif ?>
	<?php else: ?>
	<div class="container-login100">
		<div class="wrap-login100 p-l-10 p-r-10 p-t-10 p-b-10" width="130" height="130">
			<div class="txt1 text-center p-b-5">
				<center><img src="../public/imagens/check.png" alt="Finalizado" width="50" height="50"></center>
				<span>Treinos Finalizados! Nos vemos amanhã!!</span>
			</div>
		</div>
	</div>
	<?php endif ?>
</div>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Atenção</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="textoConfirmacao" class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
        <button type="button" id="TRN_Acao" class="btn btn-danger">Sim</button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('Scripts') ?>
	<script>
		$("#btn_concluir").on("click", function () {
			$('#textoConfirmacao').html('Deseja concluir o treino?');
			$("#TRN_Acao").on("click", function () { SalvarStatusTreino(1); });
			$('#exampleModalCenter').modal('show');
		});
		$("#btn_pular").on("click", function () {
			$('#textoConfirmacao').html('Deseja pular o treino?');
			$("#TRN_Acao").on("click", function () { SalvarStatusTreino(0); });
			$('#exampleModalCenter').modal('show');
		});

		function SalvarStatusTreino(status)
        {
			$.ajax({
				url:'<?= base_url('Aluno/Planejamento/SalvarStatusTreino')?>',
				method: 'post',
				data: 
				{ 
					CNC_TRN_ID: $('#CNC_TRN_ID').val(), 
					CNC_DATA: $('#CNC_DATA').val(), 
					CNC_STATUS: status,
					dataType: 'json',
					success: function(retorno) {
						$('#exampleModalCenter').modal('hide');
						location.reload();
					}
				}
			});
        };
	</script>
<?= $this->endSection() ?>