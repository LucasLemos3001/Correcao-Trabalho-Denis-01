<?php

class Produto
{
    public function __construct(
        private int $codigo,
        private string $nome,
        private float $valor
    ) {}

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

    public function imprimir()
    {
        echo "Código: " . $this->getCodigo() . "<br>";
        echo "Nome: " . $this->getNome() . "<br>";
        echo "Valor: R$" . number_format($this->getValor(), 2, ',', '.') . "<br>";
    }
}