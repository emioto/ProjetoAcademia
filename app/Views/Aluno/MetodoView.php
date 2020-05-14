<?= $this->extend('Padrao/PadraoAuthView') ?>
<?= $this->section('Titulo') ?> Aluno > Metodos <?= $this->endSection() ?>
<?= $this->section('Conteudo') ?>
    <div class="row">
        <div class="col">
            <div class="wrap-geral m-b-20 m-t-20">
				<center><form class="login100-form"><span class="txt3color">Métodos</span></form></center>
			</div>
		</div>
	</div>
    <div class="row">
        <div class="col">	
            <div class="wrap-geral m-b-20">
				<center><form class="login100-form p-r-30 p-l-30 p-t-30 p-b-30 text-justify">
					<span class="txt1">Todos os métodos estão descritos de forma didática e ilustrada no E-book: "Métodos de Treinamento na Musculação: Explicações para aplicações práticas". Leia abaixo a descrição do método que foi prescrito para você. Recomendamos a leitura completa do material. O conhecimento básico é fundamental para os melhores resultados. Boa leitura!!</span>
				</form></center>
			</div>		
			<div class="wrap-geral m-b-20">
				<object data="../public/ebooks/met_trein.pdf" type="application/pdf" width="100%" height="600px;">
					<p>Seu navegador não tem um plugin pra PDF</p>
				</object>
			</div>
        </div>
    </div>
<?= $this->endSection() ?>