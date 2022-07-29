<?php 

namespace Bruno\pocPDOPOO\Infraestrutura\Repositorio;

use Bruno\pocPDOPOO\Dominio\Modelo\Produto;
use Bruno\pocPDOPOO\Dominio\Repositorio\repositorioProduto;
use Bruno\pocPDOPOO\Infraestrutura\Persistencia;

use PDO;
use PDOException;

class PdoRepositorioProduto implements repositorioProduto
{
    private PDO $conxao;
    
    public function __construct($conxao)
    {
        $this->conxao = $conxao;
    } 

    public function todosProdutos(): array
    {
        $sql = "SELECT * FROM produto";
        $stmt = $this->conxao->query($sql);
        return $this->hidratarListaProduto($stmt);
    }

    public function salva(Produto $produto): bool
    {
        if ($produto->getIdProduto() == null) {
            return $this->createProduto($produto);
        } else {
            return $this->updateProduto($produto);
        }
    }

    public function createProduto(Produto $produto): bool
    {
        $sql = "INSERT INTO produto (nomeProduto, precoProduto) VALUES (:nome, :preco)";
        $stmt = $this->conxao->prepare($sql);
        $stmt->bindValue(':nome', $produto->getNomeProduto(), PDO::PARAM_STR);
        $stmt->bindValue(':preco', $produto->getPrecoProduto(), PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function updateProduto(Produto $produto): bool
    {
        $sql = "UPDATE produto SET nomeProduto = :nome, precoProduto = :preco WHERE idProduto = :id";
        $stmt = $this->conxao->prepare($sql);
        $stmt->bindValue(':nome', $produto->getNomeProduto(), PDO::PARAM_STR);
        $stmt->bindValue(':preco', $produto->getPrecoProduto(), PDO::PARAM_STR);
        $stmt->bindValue(':id', $produto->getIdProduto());
        return $stmt->execute();
    }

    public function readProduto(Produto $produto): array
    {
        $sql = "SELECT * FROM produto WHERE idProduto = :id";
        $stmt = $this->conxao->prepare($sql);
        $stmt->bindValue(':id', $produto->getIdProduto());
        $stmt->execute();
        return $this->hidratarListaProduto($stmt);
    }

    public function deletateProduto(Produto $produto): bool
    {
        $sql = "DELETE FROM produto WHERE idProduto = :id";
        $stmt = $this->conxao->prepare($sql);
        $stmt->bindValue(':id', $produto->getIdProduto());
        return $stmt->execute();
    }

    public function hidratarListaProduto(\PDOStatement $stmt): array
    {
        $listaDadosProduto = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $listaProdutos = [];

        echo "<table>";

        foreach($listaDadosProduto as $dadosProduto) {
            $listaProdutos[] = new Produto(
                $dadosProduto['idProduto'],
                $dadosProduto['nomeProduto'],
                $dadosProduto['precoProduto']
            );
            
            echo "<tr>";
                echo "<td width = '20' >{$dadosProduto['idProduto']}</td>";
                echo "<td width = '150'>{$dadosProduto['nomeProduto']}</td>";
                echo "<td width = '50'>".number_format($dadosProduto['precoProduto'], 2, ',', '.')."</td>";
            echo "</tr>";
        }
        echo "</table>";

    
        return $listaProdutos;
    }


}