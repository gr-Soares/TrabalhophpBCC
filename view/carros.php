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
                </tr>";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = new CarrosView;
    $data->insert($_POST);
    header("location: ../carro");
}