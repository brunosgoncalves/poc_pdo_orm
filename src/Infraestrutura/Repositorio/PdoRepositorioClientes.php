<?php 

namespace Bruno\pocPDOPOO\Infraestrutura\Repositorio;

use Bruno\pocPDOPOO\Dominio\Modelo\Clientes;
use Bruno\pocPDOPOO\Dominio\Repositorio\repositorioClientes;
use Bruno\pocPDOPOO\Infraestrutura\Persistencia;
use DateTimeImmutable;

use PDO;
use PDOException;

class PdoRepositorioClientes implements repositorioClientes
{
    private PDO $conxao;
    
    public function __construct($conxao)
    {
        $this->conxao = $conxao;
    } 

    public function todosClientes(): array
    {
        $sql = "SELECT * FROM produto";
        $stmt = $this->conxao->query($sql);
        return $this->hidratarListaCliente($stmt);
    }

    public function salva(Clientes $cliente): bool
    {
        if ($cliente->getId() == null) {
            return $this->createClientes($cliente);
        } 

        return $this->updateCliente($cliente);
    }

    public function createClientes(Clientes $cliente): bool
    {

        $sql = "INSERT INTO cliente (nome, dataNacimento, renda) VALUES (:nome, :dataNacimento, :renda)";
        $stmt = $this->conxao->prepare($sql);
        $stmt->bindValue(':nome', $cliente->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':dataNacimento', $cliente->getDataNacimento()->format('Y-m-d'));
        $stmt->bindValue(':renda', $cliente->getRenda(), PDO::PARAM_STR);
        $sucesso = $stmt->execute();

        if ($sucesso) {
            $cliente->setId($this->conxao->lastInsertId());
        }

        return $sucesso;
    }

    public function updateCliente(Clientes $cliente): bool
    {
        $sql = "UPDATE cliente SET nome = :nome, dataNacimento = :dataNacimento, renda = :rendacliente WHERE idcliente = :id";
        $stmt = $this->conxao->prepare($sql);
        $stmt->bindValue(':nome', $cliente->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':preco', $cliente->getDataNacimento()->format('Y-m-d'));
        $stmt->bindValue(':rendacliente', $cliente->getRenda(), PDO::PARAM_STR);
        $stmt->bindValue(':id', $cliente->getId(), PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function readCliente(Clientes $cliente): array
    {
        $sql = "SELECT * FROM cliente WHERE idcliente = :id";
        $stmt = $this->conxao->prepare($sql);
        $stmt->bindValue(':id', $cliente->getId(), PDO::PARAM_INT);
        $stmt->execute();
        return $this->hidratarListaCliente($stmt);
    }

    public function deletateCliente(Clientes $cliente): bool
    {
        $sql = "DELETE FROM cliente WHERE idcliente = :id";
        $stmt = $this->conxao->prepare($sql);
        $stmt->bindValue(':id', $cliente->getId());
        return $stmt->execute();
    }

    public function hidratarListaCliente(\PDOStatement $stmt): array
    {
        $listaDadosClientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $listaClientes = [];

        echo "<table>";

        foreach($listaDadosClientes as $dados) {
            $listaClientes[] = new Clientes(
                $dados['idcliente'],
                $dados['nome'],
                $dados['dataNacimento'],
                $dados['idEnderecoCliente'],
                $dados['renda'],
            );
            
            echo "<tr>";
                echo "<td width = '20' >{$dados['idcliente']}</td>";
                echo "<td width = '150'>{$dados['nome']}</td>";
                echo "<td width = '20' >{$dados['dataNacimento']}</td>";
                echo "<td width = '50'>".number_format($dados['renda'], 2, ',', '.')."</td>";
            echo "</tr>";
        }
        echo "</table>";

    
        return $listaClientes;
    }


}