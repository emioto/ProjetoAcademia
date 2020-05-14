<?php namespace App\Libraries;

use App\ViewModel\Aluno\ContaViewModel;
use App\Models\TBL_ALUNOS;
use App\Models\TBL_COMPRAS;

class ServicoDeConta extends ServicoPadrao
{
    private $repositorioDeAluno;
    private $repositorioDeCompras;

    function __construct()
    {
        $this->repositorioDeAluno = new TBL_ALUNOS();
        $this->repositorioDeCompras = new TBL_COMPRAS();
    }

    public function Obter(int $idAluno) 
    {
        $viewModel = new ContaViewModel();

        $viewModel->Usuario = $this->repositorioDeAluno->Obter($idAluno);
        $viewModel->Compras = $this->repositorioDeCompras->ObterComprasAluno($idAluno);

        return $viewModel; 
    }

    public function AlterarUsuario($usuario)
    {
        if(strcmp(md5($usuario['SenhaAntiga']), $usuario['ALN_SENHA']) != 0)
        {
            $this->erros->push('Senhas não correspondem');
            $this->RedirecionarErro('Aluno/Conta');
        }

        if(sizeof($this->erros) > 0)
        {
            session()->setFlashdata('errors', $this->erros);
        }

        $this->repositorioDeAluno->AlterarUsuario($usuario);
    }

    public function AlterarPessoa($pessoa)
    {
        $this->repositorioDeAluno->AlterarPessoa($pessoa);
    }
}