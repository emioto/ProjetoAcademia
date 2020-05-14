<?php namespace App\Controllers\Aluno;

use App\Controllers\Padrao\PadraoAuthController;

class CursoController extends PadraoAuthController
{
    function __construct()
    {
        parent::__construct();

        // Sempre preencher o nome da view no construtor do controller
        // caso a classe herdada possua outro construtor chamar antes o método
        // parent::__construct() para que seja executado os métodos da classe pai.
        $this->viewName = 'Aluno/CursoView';

        // Carregar aqui também todos os serviços que serão utilizados pelo controller.
        // os serviços deverão ser declarados como privado e receberão a instância
        // da classe neste trecho.
        // Ex.: $this->servicoDeAplicacaoDeInicio = new ServicoDeAplicacaoDeInicio();
    }

    /**
	 * Este método sempre será chamado ao abrir a tela
	 * executar aqui todos os procedimentos antes de renderizar
     * a view ao usuário.
	 */
	public function Index()
	{
		$this->CarregarView();
    }
}
