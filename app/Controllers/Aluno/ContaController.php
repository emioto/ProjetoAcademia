<?php namespace App\Controllers\Aluno;

use App\Controllers\Padrao\PadraoAuthController;
use App\Libraries\ServicoDeConta;

class ContaController extends PadraoAuthController
{
    private $servicoDeConta;

    function __construct()
    {
        parent::__construct();

        // Sempre preencher o nome da view no construtor do controller
        // caso a classe herdada possua outro construtor chamar antes o método
        // parent::__construct() para que seja executado os métodos da classe pai.
        $this->viewName = 'Aluno/ContaView';

        // Carregar aqui também todos os serviços que serão utilizados pelo controller.
        // os serviços deverão ser declarados como privado e receberão a instância
        // da classe neste trecho.
        // Ex.: $this->servicoDeAplicacaoDeInicio = new ServicoDeAplicacaoDeInicio();
        $this->servicoDeConta = new ServicoDeConta();
    }

    /**
	 * Este método sempre será chamado ao abrir a tela
	 * executar aqui todos os procedimentos antes de renderizar
     * a view ao usuário.
	 */
	public function Index()
	{
        $this->UpdateViewModel = $this->servicoDeConta->Obter($this->aluno->ALN_ID);
		$this->CarregarView();
    }

    public function AlterarUsuario()
	{
        $UsuarioAlterar = $this->request->getPost();
        $this->servicoDeConta->AlterarUsuario($UsuarioAlterar);
    }

    public function AlterarPessoa()
	{
        $PessoaAlterar = $this->request->getPost();
        $this->servicoDeConta->AlterarPessoa($PessoaAlterar);
    }
}
