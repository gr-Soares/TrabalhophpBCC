<?php

namespace model;

class User
{
    private ?int $id;
    private ?string $login;
    private ?string $senha;

    public function __construct(?int $id, ?string $login, ?string $senha)
    {
        $this->id = $id;
        $this->login = $login;
        $this->senha = $senha;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getSenha()
    {
        return $this->senha;
    }
}
