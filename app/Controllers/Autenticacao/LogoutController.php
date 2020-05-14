<?php namespace App\Controllers\Autenticacao;

use App\Controllers\Padrao\PadraoController;

class LogoutController extends PadraoController
{
	public function Index()
	{
        session()->destroy();
		return $this->Redirecionar('Autenticacao/Login');
    }
}