<?php

namespace App\Model;

use DateTimeImmutable;
use App\Model\Console;

class Game
{
    //Attributs
    private ?int $id;
    private ?string $title;
    private ?string $type;
    private ?DateTimeImmutable $publishAt;
    private ?Console $console;

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

    //TITLE
    public function getTitle(): ?string
    {
        return $this->title;
    }
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    //TYPE
    public function getType(): ?string
    {
        return $this->type;
    }
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    //PUBLISHAT
    public function getPublishAt(): ?DateTimeImmutable
    {
        return $this->publishAt;
    }
    public function setPublishAt(?DateTimeImmutable $publishAt): void
    {
        $this->publishAt = $publishAt;
    }

    //CONSOLE
    public function getConsole(): ?Console
    {
        return $this->console;
    }
    public function setConsole(?Console $console): void
    {
        $this->console = $console;
    }

}
