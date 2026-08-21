<?php
require_once 'Pessoa.php';

class Cliente extends Pessoa
{
    private Data $dataCadastro;

    public function __construct(
        string $nome,
        string $cpf,
        string $sexo,
        Data $dataNascimento,
        int $dia,
        int $mes,
        int $ano,
        private string $preferencias,
        ?Data $dataCadastro = null
    ) {
        parent::__construct($nome, $cpf, $sexo, $dataNascimento, $dia, $mes, $ano);
        $this->dataNascimento = new Data($dia, $mes, $ano);
        $this->dataCadastro = $dataCadastro ?? new Data((int)date("d"), (int)date("m"), (int)date("Y"));
    }

    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;
        return $this;
    }

    public function getPreferencias()
    {
        return $this->preferencias;
    }

    public function setPreferencias($preferencias)
    {
        $this->preferencias = $preferencias;
        return $this;
    }

    public function imprimir()
    {
        echo "Nome: " . $this->getNome() . "<br>";
        echo "CPF: " . $this->getCpf() . "<br>";
        echo "Sexo: " . $this->getSexo() . "<br>";
        echo "Data de Nascimento: " . $this->getDataNascimento() . "<br>";
        echo "Data de Cadastro: " . $this->getDataCadastro() . "<br>";
        echo "Preferências: " . $this->getPreferencias() . "<br>";
    }
}