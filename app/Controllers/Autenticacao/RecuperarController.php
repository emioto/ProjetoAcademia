<?php namespace App\Controllers\Autenticacao;

use App\Controllers\Padrao\PadraoController;
use App\Libraries\ServicoDeAutenticacao;

class RecuperarController extends PadraoController
{
    private $servicoDeAutenticacao;
    private $servicoDeEmail;

	function __construct()
    {
        // Sempre preencher o nome da view no construtor do controller
        // caso a classe herdada possua outro construtor chamar antes o método
        // parent::__construct para que seja executado os métodos da classe pai.
        $this->viewName = 'Autenticacao/RecuperarView';

        // Carregar aqui também todos os serviços que serão utilizados pelo controller.
        // os serviços deverão ser declarados como privado e receberão a instância
        // da classe neste trecho.
        // Ex.: $this->servicoDeAplicacaoDeLogin = new ServicoDeAplicacaoDeLogin();
        $this->servicoDeEmail = \Config\Services::email();
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

    public function EnviarInstrucoes() 
    {
        $post = $this->request->getPost();
        $cadastroAluno = $this->servicoDeAutenticacao->ObterAlunoPorEmail($post)->getRow();

        if(isset($cadastroAluno))
        {
            $cadastroAluno->ALN_CHAVEMAIL = $cadastroAluno->ALN_ID.md5(date("dmYHisHms"));

            $this->repositorioDeAluno->AlterarChave($cadastroAluno);

            $this->servicoDeEmail->setFrom('contato@treinamentodimauro.com.br', 'Treinamento Di Mauro');
            $this->servicoDeEmail->setTo($cadastroAluno->ALN_EMAIL);
    
            $this->servicoDeEmail->setSubject("Trocar Senha - Treinamento Di Mauro");
            $this->servicoDeEmail->setMessage("<h3>Oi, </h3>
                <p>Foi solicitado uma alteração de senha para o sistema Treinamento Di Mauro. </p>
                <p>Entre no link abaixo para finalizar o processo:</p>
                <a href='https://www.treinamentodimauro.com.br/sis/pg/psw/tcpsw.php?c={$cadastroAluno->ALN_CHAVEMAIL}'>Trocar Senha</a>
                <br/>
                <p>Muito obrigado e até logo!</p>");
    
            $this->servicoDeEmail->send();

            session()->setFlashdata('message', 'Não foi possível enviar o email, por favor contate o administrador do sistema');
            $this->RedirecionarErro('Autenticacao/Recuperar');
        }

        session()->setFlashdata('error', 'Não foi possível enviar o email, por favor contate o administrador do sistema');
        $this->RedirecionarErro('Autenticacao/Recuperar');
    }
}