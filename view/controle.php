<?php

namespace view;

include_once 'C:\xampp\htdocs\web\controller\carros.php';
include_once 'C:\xampp\htdocs\web\controller\config.php';
include_once 'C:\xampp\htdocs\web\controller\controle.php';
include_once 'C:\xampp\htdocs\web\model\controle.php';

use controller\CarrosController;
use controller\ConfigController;
use controller\ControleController;
use model\Controle;

class ControleView
{
    public static function selectCarros()
    {
        $carros = CarrosController::select();
        foreach ($carros as $carro) {
            echo "<tr>
                    <th scope='row'>" . $carro->getId() . "</th>
                    <td>" . $carro->getPlaca() . "</td>
                    <td>" . $carro->getModelo() . "</td>
                    <td>" . $carro->getCor() . "</td>
                    <td>" . $carro->getCliente()->getNome() . "</td>
                    <td>
                        <a class='btn btn-success btn-sm' href='/web/controle/entrada.php?id=" . $carro->getId() . "' role='button'>Entrada</a>
                        <a class='btn btn-warning btn-sm' href='/web/controle/saida.php?id=" . $carro->getId() . "' role='button'>Saida</a>
                    </td>
                </tr>";
        }
    }

    public static function selectHome()
    {
        $historico = ControleController::select();
        foreach ($historico as $registro) {
            if (!$registro->getPago()) {
                echo "<tr>
                <th scope='row'>" . $registro->getId() . "</th>
                <td>" . $registro->getEntrada() . "</td>
                <td>" . $registro->getSaida() . "</td>
                <td>" . $registro->getVeiculo()->getPlaca() . "</td>
                <td>" . $registro->getVeiculo()->getCliente()->getNome() . "</td>
                <td>
                <a class='btn btn-success btn-sm' href='/web/controle/pagamento.php?id=" . $registro->getId() . "' role='button'>Pagamento</a>
                </td>
            </tr>";
            }
        }
    }

    public static function entrada($data)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $carro = CarrosController::selectById($data);
        $historico = ControleController::select();
        foreach ($historico as $registro) {
            if ($registro->getVeiculo()->getId() == $carro->getId()) {
                if ($registro->getSaida() == "") {
                    return 1;
                }
            }
        }
        $dataAtual = date('Y/m/d H:i:s');
        $controle = new Controle(0, $dataAtual, "", false, $carro);
        ControleController::insert($controle);
        return 0;
    }

    public static function saida($data)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $carro = CarrosController::selectById($data);
        $historico = ControleController::select();
        foreach ($historico as $registro) {
            if ($registro->getVeiculo()->getId() == $carro->getId()) {
                if ($registro->getSaida() == "") {
                    $dataAtual = date('Y/m/d H:i:s');
                    $controle = new Controle($registro->getId(), $registro->getEntrada(), $dataAtual, $registro->getPago(), $registro->getVeiculo());
                    ControleController::editar($controle);
                    return 0;
                }
            }
        }
        return 1;
    }

    public static function valorAPagar($data)
    {
        $config = ConfigController::select();
        $valorHora = (float) $config["valorHora"];
        $valorBase = (float) $config["valorBase"];
        $registro = ControleController::selectById($data);
        $entrada = strtotime($registro->getEntrada());
        $saida = strtotime($registro->getSaida());
        $tempo = ($saida - $entrada) / 3600;
        if ($tempo < 1) {
            $result = $valorHora + $valorBase;
            return number_format($result, 2, ',', '.');
        } else {
            $result = $valorHora * $tempo + $valorBase;
            return number_format($result, 2, ',', '.');
        }
    }

    public static function selectPagamento($data)
    {
        $registro = ControleController::selectById($data);
        return $registro;
    }

    public static function pagar($data)
    {
        $registro = ControleController::selectById($data);
        if ($registro->getSaida() != "") {
            $new_registro = new Controle($registro->getId(), $registro->getEntrada(), $registro->getSaida(), true, $registro->getVeiculo());
            ControleController::editar($new_registro);
            return 0;
        }
        return 1;
    }

    public static function vagas()
    {
        $config = ConfigController::select();
        $historico = ControleController::select();
        $cont = (int) $config["vagas"];
        foreach ($historico as $registro) {
            if ($registro->getSaida() == "") {
                $cont -= 1;
            }
        }
        return "Vagas: ".$cont;
    }
}
