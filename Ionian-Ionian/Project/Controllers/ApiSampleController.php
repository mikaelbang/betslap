<?php
namespace Project\Controllers;

use Ionian\Core\Controller;

class ApiSampleController extends Controller {
    public function indexAction() {
        $this->outputJSON("Congrats you successfully logged in");
    }

    public function DBAction() {
        /*
            Get something from DB using:

            $db = Database::get()->prepare("SELECT asd FROM testtable");
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
        $this->outputJSON("Paramters supplied", [$param, $optional]);
    }

    public function errorAction($param) {
        if ($param == 100) {
            $this->outputJSON("You used parameter value 200");
        }
        else {
            $this->errorHandler->unauthorized();
        }
    }
}