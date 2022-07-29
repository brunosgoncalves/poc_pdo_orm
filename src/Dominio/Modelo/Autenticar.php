<?php
namespace Bruno\pocPDOPOO\Dominio\Modelo;

interface Autenticar
{
    public function login(string $funcionario, string $senha): void;
}