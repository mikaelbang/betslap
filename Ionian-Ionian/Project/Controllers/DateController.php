<?php
namespace Project\Controllers;

use Ionian\Core\Controller;
use Ionian\Database\Database;


class dateController extends Controller {

    public function showAction($date){


        $showDateStm = Database::get()->prepare('SELECT * FROM events WHERE start = :startDate');
        $showDateStm->bindParam(":startDate", $date);
        $showDateStm->execute();
        $result = $showDateStm->fetchAll();

        $this->outputJSON($result);
    }


}

