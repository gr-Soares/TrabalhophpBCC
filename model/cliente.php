<?php

namespace model;

class Cliente
{
    private ?int $id;
    private ?string $nome;
    private ?string $email;
    private ?string $telefone;

    public function __construct(?int $id, ?string $nome, ?string $email, ?string $telefone)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }
}
