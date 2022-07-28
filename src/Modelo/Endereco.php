<?php 

namespace Bruno\pocPDOPOO\Modelo;

require_once 'autoload.php';

class Endereco
{
    use AcessoAtributos;
    private string $logradouro;
    private string $numero;
    private string $bairro;
    private string $cidade;
    private string $uf ;
    private string $cep;
    
    function __construct(string $logradouro, string $numero, string $bairro, string $cidade, string $uf, string $cep)
    {
        $this->logradouro = $logradouro;
        $this->numero = $numero;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->uf = $uf;
        $this->cep = $cep;
    }
    
    public function getLogradouro(): string
    {
        return $this->logradouro;
    }
    
    public function getNumero(): string
    {
        return $this->numero;
    }
    
    public function getBairro(): string
    {
        return $this->bairro;
    }
    
    public function getCidade(): string
    {
        return $this->cidade;
    }
    
    public function getUf(): string
    {
        return $this->uf;
    }
    
    public function getCep(): string
    {
        return $this->cep;
    }
    
    public function setLogradouro($logradouro): void
    {
        $this->logradouro = $logradouro;
    }
    
    public function setNumero($numero): void
    {
        $this->numero = $numero;
    }
    
    public function setBairro($bairro): void
    {
        $this->bairro = $bairro;
    }
    
    public function setCidade($cidade): void
    {
        $this->cidade = $cidade;
    }
    
    public function setUf($estado): void
    {
        $this->estado = $estado;
    }
}