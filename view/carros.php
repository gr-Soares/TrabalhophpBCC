<?php

namespace view;

include_once 'C:\xampp\htdocs\web\controller\carros.php';
include_once 'C:\xampp\htdocs\web\controller\clientes.php';
include_once 'C:\xampp\htdocs\web\model\carro.php';

use controller\CarrosController;
use controller\ClientesController;
use model\Carro;

class CarrosView
{

    public static function insert($data)
    {
        $cliente = ClientesController::selectById($data["cliente_id"]);
        $carro = new Carro(0, $data["placa"], $data["modelo"], $data["cor"], $cliente);
        CarrosController::insert($carro);
    }

    public static function select()
    {
        $carros = CarrosController::select();
        foreach( $carros as $carro){
            echo "<tr>
                    <th scope='row'>".$carro->getId()."</th>
                    <td>".$carro->getPlaca()."</td>
                    <td>".$carro->getModelo()."</td>
                    <td>".$carro->getCor()."</td>
                    <td>".$carro->getCliente()->getNome()."</td>
                    <td>
                        <a class='btn btn-warning btn-sm' href='/web/carro/editar.php?id=".$carro->getId()."' role='button'>Editar</a>
                        <a class='btn btn-danger btn-sm' href='/web/carro/delete.php?id=".$carro->getId()."' role='button'>Remover</a>
                    </td>
                </tr>";
        }
    }

    public static function selectFromEdit($data)
    {
        $carro = CarrosController::selectById($data);
        return $carro;
    }

    public static function remover($data)
    {
        $carro = CarrosController::selectById($data);
        CarrosController::remover($carro);
    }

    public static function editar($data)
    {
        $cliente = ClientesController::selectById($data["cliente_id"]);
        $carro = new Carro($data["id"], $data["placa"], $data["modelo"], $data["cor"], $cliente);
        CarrosController::editar($carro);
    }
}