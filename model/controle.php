<?php

namespace model;

include_once 'C:\xampp\htdocs\web\model\carro.php';

use model\Carro;

class Controle
{
    private ?int $id;
    private ?string $entrada;
    private ?string $saida;
    private ?bool $pago;
    private ?Carro $veiculo;

    public function __construct(?int $id, ?string $entrada, ?string $saida, ?bool $pago, ?Carro $veiculo)
    {
        $this->id = $id;
        $this->entrada = $entrada;
        $this->saida = $saida;
        $this->veiculo = $veiculo;
        $this->pago = $pago;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEntrada()
    {
        return $this->entrada;
    }

    public function getSaida()
    {
        return $this->saida;
    }

    public function getPago()
    {
        return $this->pago;
    }

    public function getVeiculo()
    {
        return $this->veiculo;
    }
}
