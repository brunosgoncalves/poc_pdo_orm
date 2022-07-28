<?php

namespace Bruno\pocPDOPOO\Modelo;

require_once 'autoload.php';

class Funcionario extends Pessoa implements Autenticar
{
    private string $cargo;
    private float $salario;
    private string $senha;

    function __construct(string $nome, int $idade, Endereco $endereco, string $cargo, float $salario)
    {
        parent::__construct($nome, $idade, $endereco);
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
        return "Funcionario: " . $this->getNome() . " - anos : " . $this->getIdade() . " - Cargo " . $this->cargo . " - " . $this->salario. " - ".$this->getEndereco()->getLogradouro()." - ".$this->getEndereco()->getNumero()." - ".$this->getEndereco()->getCidade()." - ".$this->getEndereco()->getUf()." - ".$this->getEndereco()->getCep();
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