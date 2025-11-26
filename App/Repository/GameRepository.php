<?php

namespace App\Repository;

use App\Database\Mysql;
use App\Model\Console;
use App\Model\Game;

class GameRepository
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
     * Méthode qui ajoute une jeu (Game) en BDD
     * @return void
     * @throws \Exception Erreurs SQL
     */
    public function saveGame(Game $game): void 
    {
        try {
            $sqlAsso = 'INSERT INTO game(title, `type`, publish_at, id_console) VALUES (?,?,?,?)';
            $reqAsso = $this->connect->prepare($sqlAsso);
            $reqAsso->bindValue(1, $game->getTitle(), \PDO::PARAM_STR);
            $reqAsso->bindValue(2, $game->getType(), \PDO::PARAM_STR);
            $reqAsso->bindValue(3, $game->getPublishAt()->format("Y-m-d"), \PDO::PARAM_STR);
            $reqAsso->bindValue(4, $game->getConsole()->getId(), \PDO::PARAM_INT);
            $reqAsso->execute();
        } catch(\Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Méthode qui retourne la liste des jeux (Game)
     * @return array<Game> Retourne le tableau des jeux (Game)
     * @throws \Exception Erreurs SQL
     */
    public function findAllGames(): array 
    {
        $sql = 'SELECT g.title, g.type, g.publish_at, g.id_console, c.name FROM game g INNER JOIN console c ON g.id_console = c.id';
        $req = $this->connect->prepare($sql);
        $req->execute();

        $games = $req->fetchAll(\PDO::FETCH_ASSOC);
        return $games;
    }
}
