<?php
/*require_once 'src/Modelo/Pessoa.php';
require_once 'src/Modelo/Endereco.php';
require_once 'src/Modelo/Funcionario.php';
require_once 'src/Modelo/Clientes.php';*/


require_once 'autoload.php';

use Bruno\pocPDOPOO\Modelo\Pessoa;
use Bruno\pocPDOPOO\Modelo\Endereco;
use Bruno\pocPDOPOO\Modelo\Funcionario;
use Bruno\pocPDOPOO\Modelo\Clientes;



$endereco = new Endereco('Rua rasenga', '123', 'Bairro dos Guris', 'Vila da Folha', 'RS', '0123456789');
//$pessoa1 = new Pessoa('Naruto', 20, $endereco);

$funcionario = new Funcionario('Sasuke', 20, $endereco, 'Desenvolvedor', 8000);
$funcionario->setSenha('123');


$funcionario->login(
    'Sasuke',
    '123'
);  

echo "<pre>";
var_dump($funcionario);

$cliente = new Clientes('Naruto', 20, $endereco, '05/09/1987', 8000);
var_dump($cliente);

echo"<br><hr>";
echo $funcionario->__toString();

echo"<br><hr>";
echo $cliente->__toString();

echo"<br><hr>";
echo $endereco->logradouro;

echo"<br><hr>";
echo "<p> Numero de pessoas ". Pessoa::getNumDePessoas()."</p>";