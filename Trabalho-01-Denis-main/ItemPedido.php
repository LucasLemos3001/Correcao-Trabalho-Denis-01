<?php
require_once 'Produto.php';

class ItemPedido
{
    public function __construct(
        private Produto $produto,
        private int $quantidade,
        private float $valor
    ) {
    }

    public function getProduto()
    {
        return $this->produto;
    }

    public function setProduto($produto)
    {
        $this->produto = $produto;
        return $this;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
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
        echo "Produto: <br>";
        $this->getProduto()->imprimir();
        echo "Quantidade: " . $this->getQuantidade() . "<br>";
        echo "Valor: R$" . number_format($this->getValor(), 2, ',', '.') . "<br>";
    }
}