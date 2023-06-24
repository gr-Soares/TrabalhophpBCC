<?php

namespace model;

include_once 'C:\xampp\htdocs\web\model\cliente.php';

use model\Cliente;

class Carro
{
    private ?int $id;
    private ?string $placa;
    private ?string $modelo;
    private ?string $cor;
    private Cliente $cliente;

    public function __construct(?int $id, ?string $placa, ?string $modelo, ?string $cor, Cliente $cliente)
    {
        $this->id = $id;
        $this->placa = $placa;
        $this->modelo = $modelo;
        $this->cor = $cor;
        $this->cliente = $cliente;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPlaca()
    {
        return $this->placa;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function getCor()
    {
        return $this->cor;
    }

    public function getCliente()
    {
        return $this->cliente;
    }
}
