<?php

class Data
{
    public function __construct(
        private int $dia,
        private int $mes,
        private int $ano
    ) {
    }

    public function getDia()
    {
        return $this->dia;
    }

    public function setDia($dia)
    {
        $this->dia = $dia;
        return $this;
    }

    public function getMes()
    {
        return $this->mes;
    }

    public function setMes($mes)
    {
        $this->mes = $mes;
        return $this;
    }

    public function getAno()
    {
        return $this->ano;
    }

    public function setAno($ano)
    {
        $this->ano = $ano;
        return $this;
    }

    public function __toString()
    {
        return $this->getDia() . "/" . $this->getMes() . "/" . $this->getAno();
    }

    public function imprimirDataBanco()
    {
        echo "Data: " . $this->__toString() . "<br>";
    }
}