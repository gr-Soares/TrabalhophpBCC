<?php

namespace model;

class Config
{
    private ?int $id;
    private ?string $parametro;
    private ?string $value;

    public function __construct(?int $id, ?string $parametro, ?string $value)
    {
        $this->id = $id;
        $this->parametro = $parametro;
        $this->value = $value;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getParametro()
    {
        return $this->parametro;
    }

    public function getValue()
    {
        return $this->value;
    }
}
