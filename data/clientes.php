<?php

namespace view;

use model\Cliente;
use model\Conexao;

class ClienteController
{
    public function Select()
    {
        $sql = "SELECT * FROM clientes;";
        $conn = Conexao::conectar();
        $result = $conn->query($sql);
        $conn = Conexao::desconectar();

        foreach($result as $c){
            $cliente = new Cliente($c["id"],$c["nome"],$c["email"],$c["telefone"]);
            $clientes = $cliente;
        }

        return $clientes;
    }

    public function Insert(Cliente $cliente){
        $conn = Conexao::conectar();
        $sql = $conn->prepare("INSERT INTO clientes VALUES(null, ?, ?, ?)");
        $sql->execute(array($cliente->getNome(), $cliente->getEmail(), $cliente->getTelefone()));
    }
}
