<?php



require_once 'autoload.php';
use Bruno\pocPDOPOO\Infraestrutura\Persistencia\CriadorConexoes;
use Bruno\pocPDOPOO\Infraestrutura\Repositorio\PdoRepositorioProduto;
use Bruno\pocPDOPOO\Dominio\Modelo\Produto;
use Bruno\pocPDOPOO\Dominio\Modelo\Endereco;
use Bruno\pocPDOPOO\Dominio\Modelo\Pessoa;
use Bruno\pocPDOPOO\Dominio\Modelo\Funcionario;
use Bruno\pocPDOPOO\Dominio\Modelo\Clientes;
use Bruno\pocPDOPOO\Infraestrutura\Repositorio\PdoRepositorioClientes;

echo "<pre>";

$repositorio = new PdoRepositorioProduto(CriadorConexoes::criaConexao()); 
CriadorConexoes::criaConexao();

/*--Ender--*/
$endereco1 = new Endereco('Rua dos Bobos', '123', 'Bairro dos Bobos', 'São Paulo', 'SP', '0123456789');

/*--Func--*/
$funcionario1 = new Funcionario(
    Null,
    'Funcionario 1',
    new DateTimeImmutable('2020-01-01'),
    $endereco1,
    "Developer",
    6000.00

);

$cliente2 = new Clientes(
    Null,
    'Naruto',
    new DateTimeImmutable('2020-01-01'),
    $endereco1,
    6000.00
    
);




echo "<br>";

$repositorio->todosProdutos();

echo "<hr>";

$produto1 = new Produto(6, 'Controle', 117.00);
$produto7 = new Produto(8, 'Controle', 127.00);
$produto2 = new Produto(3, 'Cuia', 115.00);
$produto5 = new Produto(5, 'Erva', 20.00);
$produto6 = new Produto(7, 'teclado', 10.00);

$repositorio->salva($produto5);
$repositorio->salva($produto6);
$repositorio->salva($produto1);


echo "<br>";

$repositorio->todosProdutos();

echo "<hr>";

echo "<br>";

//$repositorio->deletateProduto($produto1);

echo "<br>";

$repositorioClientes = new PdoRepositorioClientes(CriadorConexoes::criaConexao()); 

$repositorioClientes->salva($cliente2);



echo "<hr>";

