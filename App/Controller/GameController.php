<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Repository\ConsoleRepository;
use App\Repository\GameRepository;
use App\Model\Console;
use App\Model\Game;
use App\Utils\Tools;


class GameController extends AbstractController
{
    //Attributs
    private ConsoleRepository $consoleRepository;
    private GameRepository $gameRepository;

    //Constructeur
    public function __construct()
    {
        //Injection des dependances
        $this->consoleRepository = new ConsoleRepository();
        $this->gameRepository = new GameRepository();
    }

    //Méthodes

    /**
     * Méthode pour ajouter un Jeu (Game)
     * @return mixed Retourne le template
     */
    public function addGame(): mixed 
    {
        $data = [];
        $console = $this->consoleRepository->findAllConsoles();
        $data['console'] = $console;
        
        if (isset($_POST["submit"])) {
            if (
                !empty($_POST["title"]) &&
                !empty($_POST["type"]) &&
                !empty($_POST["publish_at"]) &&
                !empty($_POST["id_console"])
            ) {
                $title = Tools::sanitize($_POST["title"]);
                $type = Tools::sanitize($_POST["type"]);
                $publish_at = Tools::sanitize($_POST["publish_at"]);
                $id_console = Tools::sanitize($_POST["id_console"]);

                $game = new Game();
                $console = new Console();
                $game->setTitle($title);
                $game->setType($type);
                $game->setPublishAt(new \DateTimeImmutable($publish_at));
                $console->setId($id_console);
                $game->setConsole($console);

                $this->gameRepository->saveGame($game);
                $data["valid"] = "Le jeu à bien été enregistrer à la base de données !\n";
            } else {
                $data["error"] = "Une erreur est survenue...";
            }
        }
        
        return $this->render("add_game", "Add game", $data);
    }

    /**
     * Méthode pour afficher la liste des Jeux (Game)
     * @return mixed Retourne le template
     */
    public function showAllGames(): mixed 
    {
        $data = [];
        $games = $this->gameRepository->findAllGames();
        $data["games"] = $games;


        return $this->render("show_all_games", "show all games", $data);
    }
}
