<?php namespace App\Controllers\Autenticacao;

use App\Controllers\Padrao\PadraoController;

class RegistrarController extends PadraoController
{
	function __construct()
    {
        // Sempre preencher o nome da view no construtor do controller
        // caso a classe herdada possua outro construtor chamar antes o método
        // parent::__construct para que seja executado os métodos da classe pai.
        $this->viewName = 'Autenticacao/RegistrarView';

        // Carregar aqui também todos os serviços que serão utilizados pelo controller.
        // os serviços deverão ser declarados como privado e receberão a instância
        // da classe neste trecho.
        // Ex.: $this->servicoDeAplicacaoDeLogin = new ServicoDeAplicacaoDeLogin();
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

    public function Registrar() 
    {
        $novoAluno = $this->request->getPost();
    }
}