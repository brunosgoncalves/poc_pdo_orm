<?php

namespace Bruno\pocPDOPOO\Dominio\Repositorio;

use Bruno\pocPDOPOO\Dominio\Modelo\Funcionario;

interface repositorioFuncionario
{
    public function todosFuncionarios():array;    
    public function salva(Funcionario $funcionario): bool;
    public function createFuncionario(Funcionario $funcionario): bool;
    public function updateFuncionario(Funcionario $funcionario):bool;
    public function readFuncionario(Funcionario $funcionario):array;
    public function deletateFuncionario(Funcionario $funcionario):bool;
}


/*
Apenas um teste para ver se funciona
*/
