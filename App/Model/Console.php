<?php

namespace App\Model;

class Console
{
    //Attributs
    private ?int $id;
    private ?string $name;
    private ?string $manufacturer;

    //Constructeur
    public function __construct()
    {
        
    }

    //Getters et Setters

    //ID
    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    //NAME
    public function getName(): ?string
    {
        return $this->name;
    }
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    //MANUFACTURER
    public function getManufacturer(): ?string
    {
        return $this->manufacturer;
    }
    public function setManufacturer(?string $manufacturer):void
    {
        $this->manufacturer = $manufacturer;
    }
}
