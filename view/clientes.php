<?php

namespace view;

include_once 'C:\xampp\htdocs\web\controller\clientes.php';
include_once 'C:\xampp\htdocs\web\model\cliente.php';

use controller\ClientesController;
use model\Cliente;

class ClientesView
{

    public static function insert($data)
    {
        $cliente = new Cliente(0, $data["nome"], $data["email"], $data["telefone"]);
        ClientesController::insert($cliente);
    }

    public static function selectFromTable()
    {
        $clientes = ClientesController::select();
        foreach( $clientes as $cliente){
            echo "<tr>
                    <th scope='row'>".$cliente->getId()."</th>
                    <td>".$cliente->getNome()."</td>
                    <td>".$cliente->getEmail()."</td>
                    <td>".$cliente->getTelefone()."</td>
                </tr>";
        }
    }

    public static function selectFromSelect()
    {
        $clientes = ClientesController::select();
        foreach( $clientes as $cliente){
            echo "<option value=".$cliente->getId().">".$cliente->getNome()."</option>";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = new ClientesView;
    $data->insert($_POST);
    header("location: ../cliente");
}