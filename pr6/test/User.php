<?php

class UserPublic
{
    public string $id;
    public string $name;
    public string $surname;
}

class UserPrivate
{
    private string $id;
    private string $name;
    private string $surname;

    public function __construct()
    {
        $this->id = "0";
        $this->name = "test";
        $this->surname = "empty";
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }
}

class UserClass
{
    public $userName;
    public int|float $userAge;
    private $userEmail;

    public function setUserEmail($param): void
    {
        $this->userEmail = $param;
    }

    public function __construct()
    {
        $this->userName = "test";
        $this->userAge = -1;
        $this->userEmail = "empty";
    }
}
