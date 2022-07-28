<?php

namespace Bruno\pocPDOPOO\Infraestrutura\Persistencia;

use PDO;
use PDOException;

class CriadorConexoes
{   
    public static function criaConexao(): PDO
    {
        try{
            $pdo = new PDO('mysql:host=localhost;dbname=test','root','');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }catch(PDOException $e){
            echo 'Erro: '.$e->getMessage();
        }
    }
}

