<?php namespace App\Controllers\Autenticacao;

use App\Controllers\Padrao\PadraoController;
use App\Libraries\ServicoDeAutenticacao;

class LoginController extends PadraoController
{
    private $servicoDeAutenticacao;

    function __construct()
    {
        // Sempre preencher o nome da view no construtor do controller
        // caso a classe herdada possua outro construtor chamar antes o método
        // parent::__construct para que seja executado os métodos da classe pai.
        $this->viewName = 'Autenticacao/LoginView';

        // Carregar aqui também todos os serviços que serão utilizados pelo controller.
        // os serviços deverão ser declarados como privado e receberão a instância
        // da classe neste trecho.
        // Ex.: $this->servicoDeAplicacaoDeLogin = new ServicoDeAplicacaoDeLogin();
        $this->servicoDeAutenticacao = new ServicoDeAutenticacao();
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

    public function LogIn() 
	{
        $post = $this->request->getPost();
        $alunoValido = $this->servicoDeAutenticacao->ObterParaLogin($post)->getRow();

		return $this->Autenticar($alunoValido);
    }

    public function FacebookLogIn() 
	{
        $post = $this->request->getPost();
        $alunoValido = $this->servicoDeAutenticacao->ObterAlunoPorEmail($post)->getRow();

        $this->Autenticar($alunoValido);
    }

    public function GoogleLogIn() 
	{
        $post = $this->request->getPost();
        $alunoValido = $this->servicoDeAutenticacao->ObterAlunoPorEmail($post)->getRow();

        $this->Autenticar($alunoValido);
    }

    public function Autenticar($alunoValido) 
    {
        if(isset($alunoValido))
		{
            session()->set('aluno', $alunoValido);
            return $this->Redirecionar('Aluno/Planejamento');
        }
        else
        {
            session()->setFlashdata('error', 'Usuário ou senha inválido');
            $this->RedirecionarErro('Autenticacao/Login');
        }
    }
}