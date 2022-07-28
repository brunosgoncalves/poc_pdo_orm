<?php
namespace Bruno\pocPDOPOO\Modelo;

interface Autenticar
{
    public function login(string $funcionario, string $senha): void;
}