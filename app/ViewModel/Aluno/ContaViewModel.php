<?php namespace App\ViewModel\Aluno;

use App\ViewModel\Padrao\PadraoViewModel;

class ContaViewModel extends PadraoViewModel
{
    public $Usuario;
    public $Compras;

    public $PagSeguroStatus =array( 0=>"Pendente",
                                    1=>"Aguardando pagamento",
                                    2=>"Em análise",
                                    3=>"Pago",
                                    4=>"Disponível",
                                    5=>"Em disputa",
                                    6=>"Devolvida",
                                    7=>"Cancelada");
}

class UsuarioViewModel extends PadraoViewModel
{
    public $Email;
    public $Senha;
    public $Nome;
    public $CPF;
    public $DataDeNascimento;
    public $CEP;
    public $Endereco;
    public $Numero;
    public $UF;
    public $Municipio;
    public $Complemento;
}