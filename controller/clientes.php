<?php

namespace controller;

include_once 'C:\xampp\htdocs\web\model\cliente.php';
include_once 'C:\xampp\htdocs\web\model\conn.php';

use model\Cliente;
use model\Conexao;

class ClientesController
{
    public static function select()
    {
        $sql = "SELECT * FROM cliente;";
        $conn = Conexao::conectar();
        $result = $conn->query($sql);
        $conn = Conexao::desconectar();

        $clientes = [];

        foreach ($result as $c) {
            $cliente = new Cliente($c["id"], $c["nome"], $c["email"], $c["telefone"]);
            $clientes[] = $cliente;
        }

        return $clientes;
    }

    public static function selectById($id)
    {
        $sql = "SELECT * FROM cliente WHERE id=".$id.";";
        $conn = Conexao::conectar();
        $result = $conn->query($sql);
        $conn = Conexao::desconectar();

        $clientes = [];

        foreach ($result as $c) {
            $cliente = new Cliente($c["id"], $c["nome"], $c["email"], $c["telefone"]);
            $clientes[] = $cliente;
        }

        return $clientes[0];
    }

    public static function insert(Cliente $cliente)
    {
        $conn = Conexao::conectar();
        $sql = $conn->prepare("INSERT INTO cliente VALUES(null, ?, ?, ?)");
        $sql->execute(array($cliente->getNome(), $cliente->getEmail(), $cliente->getTelefone()));
    }
}
