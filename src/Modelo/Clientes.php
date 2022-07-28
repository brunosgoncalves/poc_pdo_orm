<?php

namespace Bruno\pocPDOPOO\Modelo;

class Clientes extends Pessoa
{
    private $dataNacimento;
    private $renda;

    function __construct(string $nome, int $idade, Endereco $endereco, string $dataNacimento, float $renda)
    {
        parent::__construct($nome, $idade, $endereco);
        $this->dataNacimento = $dataNacimento;
        $this->renda = $renda;
    }

    public function getDataNacimento(): string
    {
        return $this->dataNacimento;
    }

    public function getRenda(): float
    {
        return $this->renda;
    }

    public function setDataNacimento($dataNacimento): void
    {
        $this->dataNacimento = $dataNacimento;
    }

    public function setRenda($renda): void
    {
        $this->renda = $renda;
    }

    public function setDesconto():void
    {
        $this->desconto = 0.05;
    }

    public function getDesconto():float
    {
        return $this->desconto;
    }

    public function __toString():string
    {
        return "Cliente: " . $this->nome . " - anos : " . $this->idade . " - Renda " . $this->renda. " - ".$this->dataNacimento."-".$this->getEndereco()->getLogradouro()." - ".$this->getEndereco()->getNumero()." - ".$this->getEndereco()->getCidade()." - ".$this->getEndereco()->getUf()." - ".$this->getEndereco()->getCep();
    }
}    