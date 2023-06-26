<?php

namespace controller;

include_once 'C:\xampp\htdocs\web\model\config.php';
include_once 'C:\xampp\htdocs\web\model\conn.php';

use model\Config;
use model\Conexao;

class ConfigController
{
    public static function select()
    {
        $sql = "SELECT * FROM config;";
        $conn = Conexao::conectar();
        $result = $conn->query($sql);
        $conn = Conexao::desconectar();

        $configs = [];

        foreach ($result as $c) {
            $config = new Config($c["id"], $c["parametro"], $c["valor"]);
            $configs[$config->getParametro()] = $config->getValue();
        }

        return $configs;
    }

    public static function insert(Config $config)
    {
        $conn = Conexao::conectar();
        $sql = $conn->prepare("INSERT INTO config VALUES(null, ?, ?)");
        $sql->execute(array($config->getParametro(), $config->getValue()));
        $conn = Conexao::desconectar();
    }

    public static function remover(Config $config)
    {
        $conn = Conexao::conectar();
        $conn->query("DELETE FROM config WHERE id=" . $config->getId() . ";");
        $conn = Conexao::desconectar();
    }

    public static function editar(Config $config)
    {
        $conn = Conexao::conectar();
        $sql = $conn->prepare("UPDATE config SET parametro=?, value=? WHERE id=" . $config->getId() . ";");
        $sql->execute(array($config->getParametro(), $config->getValue()));
        $conn = Conexao::desconectar();
    }
}
