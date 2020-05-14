<?php namespace App\Libraries;

use App\Models\TBL_ALUNOS;

class ServicoDeAutenticacao extends ServicoPadrao
{
    private $repositorioDeAluno;

    function __construct()
    {
        $this->repositorioDeAluno = new TBL_ALUNOS();
    }

    public function ObterParaLogin($aluno) 
    {
        $aluno['ALN_SENHA'] = md5($aluno['ALN_SENHA']);

        return $this->repositorioDeAluno->ObterParaLogin($aluno); 
    }

    public function ObterAlunoPorEmail($aluno) 
    {
        return $this->repositorioDeAluno->ObterAlunoPorEmail($aluno); 
    }

    public function InserirAluno($aluno) 
    {
        $aluno['ALN_SENHA'] = md5($aluno['ALN_SENHA']);
        return $this->repositorioDeAluno->Inserir($aluno); 
    }
}