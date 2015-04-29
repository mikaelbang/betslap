<?php
namespace Project\Controllers;

use Ionian\Core\Controller;
use Ionian\Database\Database;

class ApiSampleController extends Controller {
    public function indexAction() {
        $this->outputJSON("Congrats you successfully logged in");
    }

    public function DBAction() {
        /*
            Get something from DB using:

            $db = Database::get()->prepare("SELECT asd FROM testable");
            $db->execute();
            $value = $db->fetchColumn();
         */

        $value = 123;

        $this->outputJSON("$value was found!");
    }

    public function parameterAction($param) {
        $this->outputJSON("PARAMETER WAS SUPPLIED!", $param);

    }

    public function optionalAction($param, $optional = null) {
        $this->outputJSON("Parameters supplied", [$param, $optional]);
    }

    public function errorAction($param) {
        if ($param == 100) {
            $this->outputJSON("You used parameter value 200");
        }
        else {
            $this->errorHandler->unauthorized();
        }
    }

    public function groupAction($group){

        $showGroupStm = Database::get()->prepare("SELECT home_team, away_team, start, result from events WHERE group_name = :group");
        $showGroupStm->execute(array
        (':group' => $group));
        $results = $showGroupStm->fetchAll();

        $this->outputJSON($results);

    }

    public function dateAction($date){


        $showDateStm = Database::get()->prepare('SELECT * FROM events WHERE start = :startDate');
        $showDateStm->bindParam(":startDate", $date);
        $showDateStm->execute();
        $result = $showDateStm->fetchAll();

        $this->outputJSON($result);
    }
}