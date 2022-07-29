<?php

namespace Bruno\pocPDOPOO\Dominio\Repositorio;

use Bruno\pocPDOPOO\Dominio\Modelo\Produto;

interface repositorioProduto
{
    public function todosProdutos():array;    
    public function salva(Produto $produto): bool;
    public function createProduto(Produto $produto): bool;
    public function updateProduto(Produto $produto):bool;
    public function readProduto(Produto $produto):array;
    public function deletateProduto(Produto $produto):bool;
}