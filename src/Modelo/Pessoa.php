<?php
namespace Bruno\pocPDOPOO\Modelo;

require_once 'autoload.php';

abstract class Pessoa
{
    use AcessoAtributos;
    protected string $nome;
    protected int $idade;
    private Endereco $endereco;
    protected float $desconto;
    private static int $numDePessoas  = 0;



    function __construct(string $nome, int $idade, Endereco $endereco)
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->validaIdade($idade);
        $this->setDesconto();
        $this->endereco = $endereco;
        self::$numDePessoas++;
    }

    public function getNome(): string
    {
        return $this->nome;
    }
    
    public function getIdade(): int
    {
        return $this->idade;
    }
    
    public function getEndereco(): Endereco
    {
        return $this->endereco;
    }
    
    public function setNome($nome): void
    {
        $this->nome = $nome;
    }

    public function setIdade($idade): void
    {
        $this->idade = $idade;
    }

    public function setEndereco($endereco): void
    {
        $this->endereco = $endereco;
    }

    public function validaIdade($idade): void
    {
        if ($this->idade >0 and $this->idade < 150) {
            $this->idade = $idade;
        } else {
            echo "Idade inválida";
            exit();
        }
    }

    public static function getNumDePessoas(): int
    {
        return self::$numDePessoas;
    }

    protected abstract function setDesconto(): void;

    public abstract function __toString(): string;

  

}