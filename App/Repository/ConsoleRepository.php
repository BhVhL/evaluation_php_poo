<?php

namespace App\Repository;

use App\Database\Mysql;
use App\Model\Console;

class ConsoleRepository
{
    //Attribut
    private \PDO $connect;

    //Constructeur
    public function __construct()
    {
        //Injection des dependances
        $this->connect = (new Mysql)->connectBDD();
    }

    //Méthodes
    /**
     * Méthode qui retourne la liste des consoles (Console)
     * @return array<Console> Retourne le tableau des consoles (Console)
     * @throws \Exception Erreurs SQL
     */
    public function findAllConsoles(): array 
    {
        $console = [];
        try {
            $sql = 'SELECT c.id, c.name, c.manufacturer FROM console c';
            $req = $this->connect->prepare($sql);
            $req->execute();
            $console = $req->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        return $console;
    }
}
