<?php

namespace Project\Controllers;

use Ionian\Core\APIDump;
use Ionian\Core\Controller;
use Ionian\Database\Database;

Class CronController extends Controller{

    public function eventsAction(){

        $requestURLPL = 'http://api.unicdn.net/v1/feeds/sportsbook/event/group/1000094985.json?app_id=b86b14a2&app_key=30ee756c281395036a043cd65d0064a4&local=sv_SE&includeparticipants=false';

        $requestURLallsvenskan = 'http://api.unicdn.net/v1/feeds/sportsbook/event/group/1000095057.json?app_id=b86b14a2&app_key=30ee756c281395036a043cd65d0064a4&local=sv_SE&includeparticipants=false';

        $requestURLlaLiga = 'http://api.unicdn.net/v1/feeds/sportsbook/event/group/1000095049.json?app_id=b86b14a2&app_key=30ee756c281395036a043cd65d0064a4&local=sv_SE&includeparticipants=false';

        $requestURLNHL = 'http://api.unicdn.net/v1/feeds/sportsbook/event/group/1000093657.json?app_id=b86b14a2&app_key=30ee756c281395036a043cd65d0064a4&local=sv_SE&includeparticipants=false';




        $PL = json_decode(@file_get_contents($requestURLPL));

        $allsvenskan = json_decode(@file_get_contents($requestURLallsvenskan));

        $laLiga = json_decode(@file_get_contents($requestURLlaLiga));

        $NHL = json_decode(@file_get_contents($requestURLNHL));

        $this->insertToDB($PL);
        $this->insertToDB($allsvenskan);
        $this->insertToDB($laLiga);
        $this->insertToDB($NHL);

    }

    private function insertToDB($events){

        for($i = 0; $i < count($events->events); $i++){
            $LLinsertStm = Database::get()->prepare('INSERT INTO events(event_id, group_id, group_name, home_team, away_team, start, sport_id) VALUES (:event_id, :group_id, :group_name, :home_team, :away_team, :start, :sport_id)');
            $LLinsertStm->bindParam(':event_id', $events->events[$i]->id);
            $LLinsertStm->bindParam(':group_id', $events->events[$i]->groupId);
            $LLinsertStm->bindParam(':group_name', $events->events[$i]->group);
            $LLinsertStm->bindParam(':home_team', $events->events[$i]->homeName);
            $LLinsertStm->bindParam(':start', $events->events[$i]->start);
            $LLinsertStm->bindParam(':away_team', $events->events[$i]->awayName);
            $LLinsertStm->bindParam(':sport_id', $events->events[$i]->sportId);

            $LLinsertStm->execute();

        }

    }

    public function oddsAction(){

        $eventStm = Database::get()->prepare('SELECT event_id FROM events'); //add where to date;

        $eventStm->execute();

        while($row = $eventStm->fetch()){
            $eventID = $row["event_id"];

            $requestODDS = "http://api.unicdn.net/v1/feeds/sportsbook/betoffer/event/" . $eventID . ".json?app_id=b86b14a2&app_key=30ee756c281395036a043cd65d0064a4&local=sv_SE&rangeSize=1&includeparticipants=false&outComeSortBy=odds&outComeSortDir=desc";

            $odds = json_decode(@file_get_contents($requestODDS));

            $one = $odds->betoffers[0]->outcomes[0]->odds;
            $cross = $odds->betoffers[0]->outcomes[1]->odds;
            $two = $odds->betoffers[0]->outcomes[2]->odds;

            $oddsStm = Database::get()->prepare('INSERT INTO odds (event_id, one, kryss, two) VALUES (:event_id, :one, :kryss, :two)');
            $oddsStm->bindParam(':event_id', $eventID);
            $oddsStm->bindParam(':one', $one);
            $oddsStm->bindParam(':kryss', $cross);
            $oddsStm->bindParam(':two', $two);
            $oddsStm->execute();


        }
    }
}

