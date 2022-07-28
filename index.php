<?php



require_once 'autoload.php';
use Bruno\pocPDOPOO\Infraestrutura\Persistencia\CriadorConexoes;
use Bruno\pocPDOPOO\Infraestrutura\Repositorio\PdoRepositorioProduto;
use Bruno\pocPDOPOO\Modelo\Produto;

echo "<pre>";

$repositorio = new PdoRepositorioProduto(CriadorConexoes::criaConexao()); 
CriadorConexoes::criaConexao();
var_dump($conxao);

$produto1 = new Produto(null, 'Descrição do produto 1', 10.00);

var_dump($produto1);

echo "<br>";

$repositorio->todosProdutos();


