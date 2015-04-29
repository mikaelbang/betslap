<?php
namespace Project\Controllers;

use Ionian\Core\APIDump;
use Ionian\Core\Controller;
use Ionian\Database\Database;

Class BetController extends Controller{

    public function oddsAction(){

        $oddsStm = database::get()->prepare('SELECT * FROM events');
        $oddsStm->execute();

        $allEvents = $oddsStm->fetchAll();

        //var_dump($allEvents);

        $PL = array();
        $allsvenskan = array();
        $laLiga = array();
        $NHL = array();

        foreach($allEvents as $event){
            if($event["group_name"] == "Premier League"){
                array_push($PL, $event);
            }
            else if($event["group_name"] == 'Allsvenskan'){
                array_push($allsvenskan, $event);
            }
            else if($event["group_name"] == 'Primera División'){
                array_push($laLiga, $event);
            }
            else if($event["group_name"] == 'NHL'){
                array_push($NHL, $event);
            }
        }

        require_once "Project/Views/odds.php";
    }

    public function h2hAction(){

        $h2hStm = Database::get()->prepare('SELECT * FROM events');
        $h2hStm->execute();

        $events = $h2hStm->fetchAll();
        shuffle($events);

        //die(var_dump($events));

        require_once "Project/Views/h2h.php";

    }
}