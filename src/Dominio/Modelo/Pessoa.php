<?php
namespace Bruno\pocPDOPOO\Dominio\Modelo;

require_once 'autoload.php';

use DateTimeInterface;

abstract class Pessoa
{
    use AcessoAtributos;
    private ?int $id;
    protected string $nome;
    //protected int $idade;
    protected DateTimeInterface $dataNascimento;
    private Endereco $endereco;
    protected float $desconto;
    private static int $numDePessoas  = 0;



    function __construct(?int $id, string $nome, DateTimeInterface $dataNascimento, Endereco $endereco)
    {
        $this->nome = $nome;
        $this->id = $id;
        //$this->idade = $idade;
        $this->dataNascimento = $dataNascimento;
        //$this->validaIdade($idade);
        $this->setDesconto();
        $this->endereco = $endereco;
        self::$numDePessoas++;
    }

    public function getNome(): string
    {
        return $this->nome;
    }
    
    // public function getIdade(): int
    // {
    //     return $this->idade;
    // }

    public function getDataNascimento(): DateTimeInterface
    {
        return $this->dataNascimento;
    }
    
    public function getEndereco(): Endereco
    {
        return $this->endereco;
    }
    
    public function setNome($nome): void
    {
        $this->nome = $nome;
    }

    // public function setIdade($idade): void
    // {
    //     $this->idade = $idade;
    // }

    public function setDataNascimento(DateTimeInterface $dataNascimento): void
    {
        $this->dataNascimento = $dataNascimento;
    }

    public function setEndereco($endereco): void
    {
        $this->endereco = $endereco;
    }

    // public function validaIdade($idade): void
    // {
    //     if ($this->idade >0 and $this->idade < 150) {
    //         $this->idade = $idade;
    //     } else {
    //         echo "Idade inválida";
    //         exit();
    //     }
    // }



    public function idade(): int
    {
        return $this->dataNascimento->diff(new \DateTimeImmutable())->y;
    }

    public static function getNumDePessoas(): int
    {
        return self::$numDePessoas;
    }

    protected abstract function setDesconto(): void;

    public abstract function __toString(): string;

  

}