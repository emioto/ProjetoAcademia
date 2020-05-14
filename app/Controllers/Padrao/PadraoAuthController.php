<?php
namespace App\Controllers\Padrao;

/**
 * Class PadraoAuthController
 *
 * PadraoAuthController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * This class validate if user is loged in.
 * Extend this class in any new controllers:
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

abstract class PadraoAuthController extends PadraoController
{
	protected $aluno;

	function __construct() 
	{	
		$this->UserSessionAuthenticate();
		$this->aluno = session()->get('aluno');
	}
	
	private function UserSessionAuthenticate() 
	{
		if(!session()->has('aluno'))
		{
			session()->setFlashdata('error', 'Usuário não autenticado');
			$this->RedirecionarErro('Autenticacao/Login');
		}
	}
}
