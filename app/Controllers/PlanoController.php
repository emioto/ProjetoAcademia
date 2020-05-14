<?php namespace App\Controllers;

use App\Controllers\Padrao\PadraoController;
use App\Libraries\ServicoDeAutenticacao;
use App\Libraries\ServicoDePlano;
use App\Libraries\ServicoDeCupom;
use App\Libraries\ServicoDeCompra;

class PlanoController extends PadraoController
{
    private $servicoDeEmail;
    private $servicoDeAutenticacao;
    private $servicoDePlano;
    private $servicoDeCupom;
    private $servicoDeCompra;

    function __construct()
    {
        // Sempre preencher o nome da view no construtor do controller
        // caso a classe herdada possua outro construtor chamar antes o método
        // parent::__construct para que seja executado os métodos da classe pai.
        $this->viewName = 'PlanoView';

        // Carregar aqui também todos os serviços que serão utilizados pelo controller.
        // os serviços deverão ser declarados como privado e receberão a instância
        // da classe neste trecho.
        // Ex.: $this->servicoDeAplicacaoDeInicio = new ServicoDeAplicacaoDeInicio();
        $this->servicoDeEmail = \Config\Services::email();
        $this->servicoDeAutenticacao = new ServicoDeAutenticacao();
        $this->servicoDePlano = new ServicoDePlano();
        $this->servicoDeCupom = new ServicoDeCupom();
        $this->servicoDeCompra = new ServicoDeCompra();;
    }

    /**
	 * Este método sempre será chamado ao abrir a tela
	 * executar aqui todos os procedimentos antes de renderizar
     * a view ao usuário.
	 */
	public function Index($idPlano)
	{
        $this->UpdateViewModel = $this->servicoDePlano->Obter($idPlano);
		$this->CarregarView();
    }

    public function LogIn()
	{
        $post = $this->request->getPost();

        if($post['ALN_EMAIL'] != "" && $post['ALN_SENHA'] != "")
        {
            $alunoValido = $this->servicoDeAutenticacao->ObterParaLogin($post)->getRow();
            return $this->Autenticar($alunoValido);
        }
        else
        {
            session()->setFlashdata('error', 'Os campos usuário e senha devem estar preenchidos');
        }
    }
    
    public function Autenticar($alunoValido) 
    {
        if(isset($alunoValido))
		{
            session()->set('aluno', $alunoValido);
            return $this->response->setJSON(
                [
                    'sucesso' => true,
                    'nomeAlunoCompra' => trim(explode(' ', $alunoValido->ALN_NOME)[0]),
                    'idAluno' => $alunoValido->ALN_ID
                ]);
        }
        else
        {
            session()->setFlashdata('error', 'Usuário ou senha inválido');
        }
    }

    public function Cadastrar()
    {
        $post = $this->request->getPost();
        $idAluno = $this->servicoDeAutenticacao->InserirAluno($post);
        
        if(isset($idAluno))
        {
            $this->servicoDeEmail->setFrom('contato@treinamentodimauro.com.br', 'Treinamento Di Mauro');
            $this->servicoDeEmail->setTo($cadastroAluno->ALN_EMAIL);
    
            $this->servicoDeEmail->setSubject("Registro - Treinamento Di Mauro");
            $this->servicoDeEmail->setMessage("{$post['ALN_NOME']}, foi realizado um cadastro nesse e-mail.
            <br/>
            Para validar o e-mail <a href='https://www.treinamentodimauro.com.br/sis/val/index.php?ida={$idAluno}-ALN-asdEsaMsa123A23I92092L'>clique aqui.</a>");
    
            $this->servicoDeEmail->send();

            session()->setFlashdata('message', 'Usuário cadastrado com sucesso, verifique seu email para ativar a sua conta');
        }
    }

    public function ObterCupom()
    {
        $post = $this->request->getPost();
        $cupom = $this->servicoDeCupom->Obter($post['codigo']);

        if(isset($cupom))
        {
            return $this->response->setJSON($cupom);
        }
    }

    public function EfetuarCompraPagSeguro()
    {
        $this->Comprar();
        $idCompra = session()->get('CMP_ID');
        echo "<meta http-equiv='refresh' content=0;url='https://treinamentodimauro.com.br/aluno/cmp/pagseguro/pagamento.php?idc={$idCompra}'>";
    }

    public function EfetuarCompraPayPal()
    {
        $this->Comprar();
        $idCompra = session()->get('CMP_ID');
        echo "<meta http-equiv='refresh' content=0;url='https://treinamentodimauro.com.br/aluno/cmp/paypal/pagamento.php?idc={$idCompra}'>";
    }

    public function Comprar() 
    {
        $post = $this->request->getPost();
        $compra->Plano = $this->UpdateViewModel;
        $CodCupom = "SEM_CUPOM";

        if($post['CPN_ID'] != '')
        {
            $cupom = $this->servicoDeCupom->Obter($post['CPN_ID']);
            $compra->Plano->Valor -= (($compra->Plano->Valor * $cupom->Valor) / 100);
            $CodCupom = $cupom->Codigo;
        }

        $inpDadosCompra['CMP_ALN_ID'] = $post['ALN_ID'];
        $inpDadosCompra['CMP_PLN_ID'] = $post['CPN_ID'];
        $inpDadosCompra['CMP_STATUSPAG']  = "0";
        $inpDadosCompra['CMP_VALOR'] = $compra->Plano->Valor;
        $inpDadosCompra['CMP_PARCELAS']   = 1;
        $inpDadosCompra['CMP_AUTENTICADOR'] = "X";
        $inpDadosCompra['CMP_TIPO'] = "PAGSEGURO";
        $inpDadosCompra['CMP_STATUS'] = 1;
        $inpDadosCompra['CMP_CPN_CODIGO'] = strtoupper($CodCupom);

        $idCompra = $this->servicoDeCompra->Inserir($inpDadosCompra);
        session()->set('CMP_ID', $idCompra);
    }
}