<?php

namespace controller;

include_once 'C:\xampp\htdocs\web\model\carro.php';
include_once 'C:\xampp\htdocs\web\model\cliente.php';
include_once 'C:\xampp\htdocs\web\controller\clientes.php';
include_once 'C:\xampp\htdocs\web\model\conn.php';

use model\Carro;
use model\Conexao;
use controller\ClientesController;

class CarrosController
{
    public static function select()
    {
        $sql = "SELECT * FROM carro;";
        $conn = Conexao::conectar();
        $result = $conn->query($sql);
        $conn = Conexao::desconectar();

        $carros = [];

        foreach($result as $c){
            $cliente = ClientesController::selectById($c["cliente"]);
            $carro = new Carro($c["id"],$c["placa"],$c["modelo"],$c["cor"], $cliente);
            $carros[] = $carro;
        }

        return $carros;
    }

    public static function selectById($id)
    {
        $sql = "SELECT * FROM carro WHERE id=" . $id . ";";
        $conn = Conexao::conectar();
        $result = $conn->query($sql);
        $conn = Conexao::desconectar();

        $carros = [];

        foreach ($result as $c) {
            $cliente = ClientesController::selectById($c["cliente"]);
            $carro = new Carro($c["id"], $c["placa"], $c["modelo"], $c["cor"], $cliente);
            $carros[] = $carro;
        }

        return $carros[0];
    }

    public static function insert(Carro $carro){
        $conn = Conexao::conectar();
        $sql = $conn->prepare("INSERT INTO carro VALUES(null, ?, ?, ?, ?)");
        $sql->execute(array($carro->getPlaca(), $carro->getModelo(), $carro->getCor(), $carro->getCliente()->getId()));
    }

    public static function remover(Carro $carro)
    {
        $conn = Conexao::conectar();
        $conn->query("DELETE FROM carro WHERE id=" . $carro->getId() . ";");
        $conn = Conexao::desconectar();
    }

    public static function editar(Carro $carro)
    {
        $conn = Conexao::conectar();
        $sql = $conn->prepare("UPDATE carro SET placa=?, modelo=?, cor=? WHERE id=" . $carro->getId() . ";");
        $sql->execute(array($carro->getPlaca(), $carro->getModelo(), $carro->getCor()));
        $conn = Conexao::desconectar();
    }
}
