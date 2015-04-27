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

        var_dump($allEvents);

        $PL = array();
        $allsvenskan = array();
        $laLiga = array();

        foreach($allEvents as $event){
            if($event["group_id"] == 1000094985){
                array_push($PL, $event);
            }
            else if($event["group_id"] == 1000095057){
                array_push($allsvenskan, $event);
            }
            else if($event["group_id"] == 1000095049){
                array_push($laLiga, $event);
            }
        }
    }

    public function cronAction(){

        require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/betslap/Ionian-Ionian/Project/Views/cron_job.php');
        //require_once "../Views/cron_job.php";
    }
}