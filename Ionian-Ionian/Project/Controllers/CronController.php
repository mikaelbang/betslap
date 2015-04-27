<?php

namespace Project\Controllers;

use Ionian\Core\APIDump;
use Ionian\Core\Controller;
use Ionian\Database\Database;

Class CronController extends Controller{

    public function TestAction(){


        $requestURLPL = 'http://api.unicdn.net/v1/feeds/sportsbook/event/group/1000094985.json?app_id=b86b14a2&app_key=30ee756c281395036a043cd65d0064a4&local=sv_SE&includeparticipants=false';

        $requestURLallsvenskan = 'http://api.unicdn.net/v1/feeds/sportsbook/event/group/1000095057.json?app_id=b86b14a2&app_key=30ee756c281395036a043cd65d0064a4&local=sv_SE&includeparticipants=false';

        $requestURLlaLiga = 'http://api.unicdn.net/v1/feeds/sportsbook/event/group/1000095049.json?app_id=b86b14a2&app_key=30ee756c281395036a043cd65d0064a4&local=sv_SE&includeparticipants=false';




        $PL = json_decode(@file_get_contents($requestURLPL));

        $allsvenskan = json_decode(@file_get_contents($requestURLallsvenskan));

        $laLiga = json_decode(@file_get_contents($requestURLlaLiga));



        var_dump($PL);



        for($i = 0; $i < count($laLiga->events); $i++){
            $LLinsertStm = Database::get()->prepare('INSERT INTO events(event_id, group_id, home_team, away_team, start, sport_id) VALUES (:event_id, :group_id, :home_team, :away_team, :start, :sport_id)');
            $LLinsertStm->bindParam(':event_id', $laLiga->events[$i]->id);
            $LLinsertStm->bindParam(':group_id', $laLiga->events[$i]->groupId);
            $LLinsertStm->bindParam(':home_team', $laLiga->events[$i]->homeName);
            $LLinsertStm->bindParam(':start', $laLiga->events[$i]->start);
            $LLinsertStm->bindParam(':away_team', $laLiga->events[$i]->awayName);
            $LLinsertStm->bindParam(':sport_id', $laLiga->events[$i]->sportId);

            $LLinsertStm->execute();

        }

        for($j = 0; $j < count($allsvenskan->events); $j++){
            $AinsertStm = Database::get()->prepare('INSERT INTO events(event_id, group_id, home_team, away_team, start, sport_id) VALUES (:event_id, :group_id, :home_team, :away_team, :start, :sport_id)');
            $AinsertStm->bindParam(':event_id', $allsvenskan->events[$j]->id);
            $AinsertStm->bindParam(':group_id', $allsvenskan->events[$j]->groupId);
            $AinsertStm->bindParam(':home_team', $allsvenskan->events[$j]->homeName);
            $AinsertStm->bindParam(':start', $allsvenskan->events[$j]->start);
            $AinsertStm->bindParam(':away_team', $allsvenskan->events[$j]->awayName);
            $AinsertStm->bindParam(':sport_id', $allsvenskan->events[$j]->sportId);

            $AinsertStm->execute();

        }

        for($k = 0; $k < count($PL->events); $k++){
            $PLinsertStm = Database::get()->prepare('INSERT INTO events(event_id, group_id, home_team, away_team, start, sport_id) VALUES (:event_id, :group_id, :home_team, :away_team, :start, :sport_id)');
            $PLinsertStm->bindParam(':event_id', $PL->events[$k]->id);
            $PLinsertStm->bindParam(':group_id', $PL->events[$k]->groupId);
            $PLinsertStm->bindParam(':home_team', $PL->events[$k]->homeName);
            $PLinsertStm->bindParam(':start', $PL->events[$k]->start);
            $PLinsertStm->bindParam(':away_team', $PL->events[$k]->awayName);
            $PLinsertStm->bindParam(':sport_id', $PL->events[$k]->sportId);

            $PLinsertStm->execute();

        }


    }

    public function oddsAction(){

        $eventstm = Database::get()->prepare('SELECT event_id FROM events'); //add where to date;

        $eventstm->execute();

        $odds = array();

        while($row = $eventstm->fetch()){
            $eventID = $row["event_id"];

            $requestODDS = "http://api.unicdn.net/v1/feeds/sportsbook/betoffer/event/" . $eventID . ".json?app_id=b86b14a2&app_key=30ee756c281395036a043cd65d0064a4&local=sv_SE&rangeSize=1&includeparticipants=false&outComeSortBy=odds&outComeSortDir=desc";

            $test = json_decode(@file_get_contents($requestODDS));

            $one = $test->betoffers[0]->outcomes[0]->odds;
            $cross = $test->betoffers[0]->outcomes[1]->odds;
            $two = $test->betoffers[0]->outcomes[2]->odds;

            $oddsStm = Database::get()->prepare('INSERT INTO odds (event_id, one, kryss, two) VALUES (:event_id, :one, :kryss, :two)');
            $oddsStm->bindParam(':event_id', $eventID);
            $oddsStm->bindParam(':one', $one);
            $oddsStm->bindParam(':kryss', $cross);
            $oddsStm->bindParam(':two', $two);
            $oddsStm->execute();
        }

    }

}

