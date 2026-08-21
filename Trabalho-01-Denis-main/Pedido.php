<?php
require_once 'Cliente.php';
require_once 'Data.php';
require_once 'ItemPedido.php';
require_once 'Vendedor.php';

class Pedido
{
    private Data $data;

    public function __construct(
        Produto $produto,
        int $quantidade,
        float $valor,
        private Cliente $cliente,
        private Vendedor $vendedor,
        private float $valorTotal = 0,
        private array $itemPedido = [],
        ?Data $data = null
    ) {
        $this->data = $data ?? new Data((int)date("d"), (int)date("m"), (int)date("Y"));
        $this->itemPedido[] = new ItemPedido($produto, $quantidade, $valor);
        $this->valorTotal = $this->itemPedido[0]->getValor() * $this->itemPedido[0]->getQuantidade();
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function getItemPedido()
    {
        return $this->itemPedido;
    }

    public function setItemPedido($itemPedido)
    {
        $this->itemPedido = $itemPedido;
        return $this;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
        return $this;
    }

    public function getVendedor()
    {
        return $this->vendedor;
    }

    public function setVendedor($vendedor)
    {
        $this->vendedor = $vendedor;
        return $this;
    }

    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;
        return $this;
    }

    public function adicionarItem(ItemPedido $item)
    {
        $this->itemPedido[] = $item;
        $this->calcularValorTotal();
    }

    public function calcularValorTotal()
    {
        $this->valorTotal = 0;

        foreach ($this->itemPedido as $item) {
            $this->valorTotal += $item->getValor() * $item->getQuantidade();
        }

        return $this->valorTotal;
    }

    public function adicionarComissao()
    {
        $comissao = $this->vendedor->getComissao();
        $this->valorTotal += $comissao;
    }

    public function fecharPedido()
    {
        $this->calcularValorTotal();
        $this->adicionarComissao();
    }

    public function imprimirPedidoCompleto()
    {
        echo "Data do Pedido: " . $this->getData() . "\n";
        echo "Cliente: " . $this->cliente->getNome() . "\n";
        echo "Vendedor: " . $this->vendedor->getNome() . "\n";
        echo "Itens do Pedido:\n";

        foreach ($this->itemPedido as $item) {
            echo "- Produto: " . $item->getProduto()->getNome() . ", Quantidade: " . $item->getQuantidade() . ", Valor Unitário: R$" . number_format($item->getValor(), 2, ',', '.') . "\n";
        }

        echo "Valor Total do Pedido (com comissão): R$" . number_format($this->valorTotal, 2, ',', '.') . "\n";
    }
}