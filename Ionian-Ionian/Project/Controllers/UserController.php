<?php
namespace Project\Controllers;

use Ionian\Core\Controller;
use Ionian\Core\Contoller;
use Ionian\Database\Database;


class UserController extends Controller {

    public function indexAction() {

        $this->outputJSON("Congrats you successfully logged in");
    }

    public function (){
    }
}

