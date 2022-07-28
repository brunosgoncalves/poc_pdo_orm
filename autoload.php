<?php
spl_autoload_register(
    function (string $nomeCompletoClasse) 
    {
        $caminhoCompleto = str_replace("Bruno\\pocPDOPOO\\", "src\\", $nomeCompletoClasse);
        $caminhoArquivo = str_replace('\\', DIRECTORY_SEPARATOR, $caminhoCompleto);
        $caminhoArquivo = $caminhoArquivo .'.php';
        
        if(file_exists($caminhoArquivo)){
            require_once $caminhoArquivo;
        }
    });