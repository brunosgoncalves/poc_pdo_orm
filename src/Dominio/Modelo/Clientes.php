<?php

namespace Bruno\pocPDOPOO\Dominio\Modelo;

use DateTimeInterface;

class Clientes extends Pessoa
{
    private DateTimeInterface $dataNacimento;
    private float $renda;

    function __construct(?int $id,string $nome, DateTimeInterface $dataNascimento, Endereco $endereco, float $renda)
    {
        parent::__construct($id, $nome, $dataNascimento, $endereco);
        $this->dataNacimento = $dataNascimento;
        $this->renda = $renda;
        $this->id = $id;
    }



    public function getDataNacimento(): DateTimeInterface
    {
        return $this->dataNacimento;
    }

    public function getRenda(): float
    {
        return $this->renda;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
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
        return "Cliente: " . $this->nome . " - Renda " . $this->renda. " - ".$this->dataNacimento."-".$this->getEndereco()->getLogradouro()." - ".$this->getEndereco()->getNumero()." - ".$this->getEndereco()->getCidade()." - ".$this->getEndereco()->getUf()." - ".$this->getEndereco()->getCep();
    }
}    