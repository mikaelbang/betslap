<?php
namespace Project\Controllers;

use Ionian\Core\Controller;
use Ionian\Database\Database;


class eventController extends Controller {

    public function showAction($event_id){


        $showEventStm = Database::get()->prepare('SELECT * FROM events WHERE event_id = :event');
        $showEventStm->bindParam(":startEvent", $event_id);
        $showEventStm->execute();
        $result = $showEventStm->fetchAll();

        $this->outputJSON($result);
    }



}
