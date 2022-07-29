<?php

namespace Bruno\pocPDOPOO\Dominio\Modelo;

require_once 'autoload.php';

use DateTimeInterface ;

class Funcionario extends Pessoa implements Autenticar
{
    private string $cargo;
    private float $salario;
    private string $senha;

    function __construct(?int $id, string $nome, DateTimeInterface $dataNascimento, Endereco $endereco, string $cargo, float $salario)
    {
        parent::__construct($id ,$nome, $dataNascimento, $endereco);
        $this->cargo = $cargo;
        $this->salario = $salario;
    }
    

    public function getCargo(): string
    {
        return $this->cargo;
    }
    
    public function getSalario(): float
    {
        return $this->salario;
    }

    public function setCargo($cargo): void
    {
        $this->cargo = $cargo;
    }

    public function setSalario($salario): void
    {
        $this->salario = $salario;
    }


    public function setDesconto():void
    {
        $this->desconto = 0.10;
    }

    public function __toString()
    {
        return "Funcionario: " . $this->getNome() . " - Cargo " . $this->cargo . " - " . $this->salario. " - ".$this->getEndereco()->getLogradouro()." - ".$this->getEndereco()->getNumero()." - ".$this->getEndereco()->getCidade()." - ".$this->getEndereco()->getUf()." - ".$this->getEndereco()->getCep();
    }


    public function login(string $funcionario, string $senha): void
    {
        if ($funcionario == $this->getNome() and $senha == $this->senha) {
            echo "Login realizado com sucesso";
        } else {
            echo "Login inválido";
        }
    }

    public function setSenha(string $senha): void
    {
        $this->senha = $senha;
    }



}