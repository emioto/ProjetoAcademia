<?php namespace App\Models;

class TBL_ALUNOS extends PadraoModel
{
    protected $table = 'TBL_ALUNOS';
    protected $primaryKey = 'ALN_ID';
    protected $allowedFields;
    protected $validationRules;

    public function Obter(int $id)
    {
        return  $this->db
                     ->table($this->table)
                     ->where($this->primaryKey, $id)
                     ->get()
                     ->getRowObject();
    }

    public function ObterParaLogin($aluno)
    {
        return $this->db
                     ->query("    SELECT * 
                                          FROM TBL_ALUNOS
                                         WHERE ALN_EMAIL = '{$aluno['ALN_EMAIL']}' 
                                           AND ALN_SENHA = '{$aluno['ALN_SENHA']}'");
    }

    public function AlterarUsuario($usuario)
    {
        return  $this->db
                     ->simpleQuery("    UPDATE TBL_ALUNOS 
                                           SET
                                               ALN_SENHA = '{$usuario['ALN_SENHA']}'
                                         WHERE ALN_ID = {$usuario['ALN_ID']}");
    }

    public function AlterarChave($usuario)
    {
        return  $this->db
                     ->simpleQuery("    UPDATE TBL_ALUNOS 
                                           SET
                                               ALN_CHAVEMAIL = '{$usuario['ALN_CHAVEMAIL']}'
                                         WHERE ALN_ID = {$usuario['ALN_ID']}");
    }

    public function AlterarPessoa($pessoa)
    {
        return  $this->db
                     ->simpleQuery("    UPDATE TBL_ALUNOS 
                                           SET
                                               ALN_CPF = '{$pessoa['ALN_CPF']}',
                                               ALN_NOME = '{$pessoa['ALN_NOME']}',
                                               ALN_CELULAR = '{$pessoa['ALN_CELULAR']}',
                                               ALN_DATANASC = '{$pessoa['ALN_DATANASC']}',
                                               ALN_CEP = '{$pessoa['ALN_CEP']}',
                                               ALN_ENDERECO = '{$pessoa['ALN_ENDERECO']}',
                                               ALN_BAIRRO = '{$pessoa['ALN_BAIRRO']}',
                                               ALN_CIDADE = '{$pessoa['ALN_CIDADE']}',
                                               ALN_ESTADO = '{$pessoa['ALN_ESTADO']}',
                                               ALN_ENDNUMERO = {$pessoa['ALN_ENDNUMERO']},
                                               ALN_COMPLEMENTO = '{$pessoa['ALN_COMPLEMENTO']}',
                                               ALN_IBGE = '{$pessoa['ALN_IBGE']}'
                                         WHERE ALN_ID = {$pessoa['ALN_ID']}");
    }

    public function ObterAlunoPorEmail($aluno)
    {
        return $this->db
                     ->query("    SELECT * 
                                          FROM TBL_ALUNOS
                                         WHERE ALN_EMAIL = '{$aluno['ALN_EMAIL']}'");
    }

    public function Inserir($aluno)
    {
        $this->db
                     ->query("    INSERT INTO TBL_ALUNOS
                                              (ALN_CPF,ALN_NOME,ALN_EMAIL,ALN_CELULAR,ALN_TELEFONE,ALN_SENHA,ALN_DATACAD,ALN_DATANASC,ALN_GENERO,ALN_PREFCONT,ALN_STATUSMAIL,ALN_CHAVEMAIL,ALN_CEP,ALN_ENDERECO,ALN_BAIRRO,ALN_CIDADE,ALN_ESTADO,ALN_ENDNUMERO,ALN_COMPLEMENTO,ALN_IBGE,ALN_ULTIMOACESSO,ALN_FOTO,ALN_PROFESSOR,ALN_TERMOREEMBOLSO,ALN_COMPARTILHAMENTO)
                                       VALUES ('{$aluno['ALN_CPF']}', 
                                               '{$aluno['ALN_NOME']}', 
                                               '{$aluno['ALN_EMAIL']}', 
                                               '{$aluno['ALN_CELULAR']}', 
                                               '', 
                                               '{$aluno['ALN_SENHA']}', 
                                                'now()', 
                                               '{$aluno['ALN_DATANASC']}', 
                                               '', 
                                               'WhatsApp', 
                                                0, 
                                               '', 
                                               '{$aluno['ALN_CEP']}', 
                                               '{$aluno['ALN_ENDERECO']}', 
                                               '{$aluno['ALN_BAIRRO']}', 
                                               '{$aluno['ALN_CIDADE']}', 
                                               '{$aluno['ALN_ESTADO']}', 
                                                {$aluno['ALN_ENDNUMERO']}, 
                                               '{$aluno['ALN_COMPLEMENTO']}', 
                                               '{$aluno['ALN_IBGE']}', 
                                                NULL, 
                                                '', 
                                                0, 
                                                'now()', 
                                                'now()')");
            
        return $this->db->insertID();
    }
}