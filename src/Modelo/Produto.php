<?php

namespace Bruno\pocPDOPOO\Modelo;

class Produto
{
    private ?int $idProduto;
    private string $nomeProduto;
    private float $precoProduto;

    public function __construct(?int $idProduto, string $nomeProduto, float $precoProduto)
    {
        $this->idProduto = $idProduto;
        $this->nomeProduto = $nomeProduto;
        $this->precoProduto = $precoProduto;
    }

    public function getIdProduto(): ?int
    {
        return $this->idProduto;
    }

    public function getNomeProduto(): string
    {
        return $this->nomeProduto;
    }

    public function getPrecoProduto(): float
    {
        return $this->precoProduto;
    }

    public function setIdProduto(?int $idProduto): void
    {
        $this->idProduto = $idProduto;
    }

    public function setNomeProduto(string $nomeProduto): void
    {
        $this->nomeProduto = $nomeProduto;
    }

    public function setPrecoProduto(float $precoProduto): void
    {
        $this->precoProduto = $precoProduto;
    }
    
}