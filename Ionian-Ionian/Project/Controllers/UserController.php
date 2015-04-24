<?php
namespace Project\Controllers;

use Ionian\Core\Controller;
use Ionian\Core\Contoller;
use Ionian\Database\Database;


class UserController extends Controller {

    public function indexAction() {

    }

    public function profileAction(){

        $db = new PDO("mysql:host=localhost;dbname=betslap", "root", "root");

        $profileStm = $db->prepare('SELECT * FROM users WHERE user_id = :user_id');
        $profileStm->bindParam(":user_id", $_SESSION["user"]->user_id, PDO::PARAM_INT);
        $profileStm->execute();
        $user = $profileStm->fetchObject();

        require_once "profilsidan jao";

        //$this->outputJSON("Congrats you successfully logged in");
    }

    public function updateAction(){

        $db = new PDO("mysql:host=localhost;dbname=betslap", "root", "root");

        if(isset($_POST["save_button"])){
            $updateProfileStm = $db->prepare('UPDATE users SET firstname = :firstname, lastname = :lastname, profile_pic = :p_pic, WHERE user_id = :user_id');
            $updateProfileStm->bindParam(":user_id", $_SESSION["user"]->user_id, PDO::PARAM_INT);
            $updateProfileStm->bindParam(":firstname", $_POST["first_name"]);
            $updateProfileStm->bindParam(":lastname", $_POST["last_name"]);
            $updateProfileStm->bindParam(":p_pic", $_POST["profile_pic"]);

            if($updateProfileStm->execute()){
                header("location:../users/profile");


            }
        }

    }

}

