<?= $this->extend('Padrao/PadraoAuthView') ?>
<?= $this->section('Titulo') ?> Aluno > Streaming <?= $this->endSection() ?>
<?= $this->section('Conteudo') ?>
    <div class="row">
        <div class="col">
            <div class="wrap-geral m-b-20 m-t-20">
				<center><form class="login100-form"><span class="txt3color">Streaming</span></form></center>
			</div>	        	
            <div class="wrap-geral m-b-20 m-t-20">
            	<center><form class="login100-form p-r-30 p-l-30 p-t-30" ><span class="txt3">Cartilha Glúteos</span></form></center>
				<center><form class="login100-form p-b-10 p-t-10">
					<img style="width: 80%; height: 80%;" src="../public/imagens/gluteos.jpg" alt="Treinamento Di Mauro">
				</form><center>
				<center><form class="login100-form p-b-10 p-t-10">
					<span class="txt1">Cartilha de Glúteos (nova versão).</span>
				</form></center>
				<center><div class="container-login100-form-btn w-25 p-b-30">
					<div class="wrap-login100-form-btn">
						<div class="login100-form-bgbtn"></div>
						<button class="form-btn-branco">
							<a href="../public/ebooks/CartilhaGluteos.pdf" download="CartilhaGluteos.pdf" target="_blank">
								<font color=white>Baixar PDF</font>
							</a>
						</button>
					</div>
				</div></center>
			</div>
        </div>
    </div>
<?= $this->endSection() ?>