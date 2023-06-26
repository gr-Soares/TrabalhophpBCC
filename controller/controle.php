<?php

namespace controller;

include_once 'C:\xampp\htdocs\web\model\carro.php';
include_once 'C:\xampp\htdocs\web\model\controle.php';
include_once 'C:\xampp\htdocs\web\controller\carros.php';
include_once 'C:\xampp\htdocs\web\model\conn.php';

use model\Controle;
use model\Conexao;
use controller\CarrosController;

class ControleController
{
    public static function select()
    {
        $sql = "SELECT * FROM controle;";
        $conn = Conexao::conectar();
        $result = $conn->query($sql);
        $conn = Conexao::desconectar();

        $controles = [];

        foreach ($result as $c) {
            $carro = CarrosController::selectById($c["veiculo"]);
            $controle = new Controle($c["id"], $c["entrada"], $c["saida"], $c["pago"], $carro);
            $controles[] = $controle;
        }

        return $controles;
    }

    public static function selectById($id)
    {
        $sql = "SELECT * FROM controle WHERE id=" . $id . ";";
        $conn = Conexao::conectar();
        $result = $conn->query($sql);
        $conn = Conexao::desconectar();

        $controles = [];

        foreach ($result as $c) {
            $carro = CarrosController::selectById($c["veiculo"]);
            $controle = new Controle($c["id"], $c["entrada"], $c["saida"], $c["pago"], $carro);
            $controles[] = $controle;
        }

        return $controles[0];
    }

    public static function insert(Controle $controle)
    {
        $conn = Conexao::conectar();
        $sql = $conn->prepare("INSERT INTO controle VALUES(null, ?, ?, ?, ?)");
        $sql->execute(array($controle->getEntrada(), $controle->getSaida(), false, $controle->getVeiculo()->getId()));
        $conn = Conexao::desconectar();
    }

    public static function remover(Controle $controle)
    {
        $conn = Conexao::conectar();
        $conn->query("DELETE FROM controle WHERE id=" . $controle->getId() . ";");
        $conn = Conexao::desconectar();
    }

    public static function editar(Controle $controle)
    {
        $conn = Conexao::conectar();
        $sql = $conn->prepare("UPDATE controle SET entrada=?, saida=?, pago=? WHERE id=" . $controle->getId() . ";");
        $sql->execute(array($controle->getEntrada(), $controle->getSaida(), $controle->getPago()));
        $conn = Conexao::desconectar();
    }
}
