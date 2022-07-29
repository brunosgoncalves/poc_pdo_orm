<?php
namespace Bruno\pocPDOPOO\Dominio\Modelo;

trait AcessoAtributos
{
    public function __get(string $nomeAtributo)
    {
        $metodo = 'get'. ucfirst($nomeAtributo);
        return $this->$metodo();
        
    }
    
}