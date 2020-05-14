<?php namespace App\Controllers\Aluno;

use App\Controllers\Padrao\PadraoAuthController;
use App\Libraries\ServicoDePlanejamento;

class PlanejamentoController extends PadraoAuthController
{
    private $servicoDePlanejamento;

    function __construct()
    {
        parent::__construct();
        // Sempre preencher o nome da view no construtor do controller
        // caso a classe herdada possua outro construtor chamar antes o método
        // parent::__construct() para que seja executado os métodos da classe pai.
        $this->viewName = 'Aluno/PlanejamentoView';

        // Carregar aqui também todos os serviços que serão utilizados pelo controller.
        // os serviços deverão ser declarados como privado e receberão a instância
        // da classe neste trecho.
        // Ex.: $this->servicoDeInicio = new ServicoDeInicio();
        $this->servicoDePlanejamento = new ServicoDePlanejamento();
    }

    /**
	 * Este método sempre será chamado ao abrir a tela
	 * executar aqui todos os procedimentos antes de renderizar
     * a view ao usuário.
	 */
	public function Index()
	{
        $this->UpdateViewModel = $this->servicoDePlanejamento->Obter($this->aluno->ALN_ID);
		$this->CarregarView();
    }

    public function ObterPlanejamento()
    {
        return $this->response->setJSON($this->servicoDePlanejamento->Obter($this->aluno->ALN_ID));
    }

    public function ObterTreinoDia()
    {
        $post = $this->request->getPost();
        return $this->response->setJSON($this->servicoDePlanejamento->ObterTreino($post['IdTreino'], $post['Data']));
    }

    public function SalvarStatusTreino() 
    {
        $this->TreinoResposta = $this->request->getPost();
        $this->servicoDePlanejamento->SalvarStatusTreino($this->TreinoResposta);
    }
}