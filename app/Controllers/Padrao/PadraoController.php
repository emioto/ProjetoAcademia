<?php
namespace App\Controllers\Padrao;

/**
 * Class PadraoController
 *
 * PadraoController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;
use CodeIgniter\Router\Exceptions\RedirectException;

abstract class PadraoController extends Controller
{
	protected $viewName;
	protected $UpdateViewModel;
	
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);
		
		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->viewParser = \Config\Services::parser();
	}

    /**
	 * Este método deve ser chamado assim que todas
     * as propriedades do controller estiverem carregadas,
     * e quando a ViewModel estiver na nossa $UpdateViewModel.
	 */
    protected function CarregarView()
	{           
        echo view($this->viewName, (array)$this->UpdateViewModel);
	}
	
	protected function Redirecionar($rota) 
	{
		return redirect()->to(base_url($rota));
	}

	protected function RedirecionarErro($rota) 
	{
		throw new RedirectException($rota);
	}
}
