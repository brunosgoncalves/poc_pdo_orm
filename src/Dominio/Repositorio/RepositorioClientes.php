<?php

namespace Bruno\pocPDOPOO\Dominio\Repositorio;

use Bruno\pocPDOPOO\Dominio\Modelo\Clientes;

interface repositorioClientes
{
    public function todosClientes():array;    
    public function salva(Clientes $cliente): bool;
    public function readCliente(Clientes $cliente):array;
    public function deletateCliente(Clientes $cliente):bool;
}
