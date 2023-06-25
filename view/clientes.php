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
        foreach ($clientes as $cliente) {
            echo "<tr>
                    <th scope='row'>" . $cliente->getId() . "</th>
                    <td>" . $cliente->getNome() . "</td>
                    <td>" . $cliente->getEmail() . "</td>
                    <td>" . $cliente->getTelefone() . "</td>
                    <td>
                        <a class='btn btn-warning btn-sm' href='/web/cliente/editar.php?id=" . $cliente->getId() . "' role='button'>Editar</a>
                        <a class='btn btn-danger btn-sm' href='/web/cliente/delete.php?id=" . $cliente->getId() . "' role='button'>Remover</a>
                    </td>
                </tr>";
        }
    }

    public static function selectFromSelect()
    {
        $clientes = ClientesController::select();
        foreach ($clientes as $cliente) {
            echo "<option value=" . $cliente->getId() . ">" . $cliente->getNome() . "</option>";
        }
    }

    public static function selectFromEdit($data)
    {
        $cliente = ClientesController::selectById($data);
        return $cliente;
    }

    public static function remover($data)
    {
        $cliente = ClientesController::selectById($data);
        ClientesController::remover($cliente);
    }

    public static function editar($data)
    {
        $cliente = new Cliente($data["id"], $data["nome"], $data["email"], $data["telefone"]);
        ClientesController::editar($cliente);
    }
}
