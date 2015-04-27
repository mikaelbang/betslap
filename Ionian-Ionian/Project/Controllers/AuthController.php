<?php
namespace Project\Controllers;

use Ionian\Core\APIDump;
use Ionian\Core\Controller;
use Ionian\Database\Database;

Class AuthController extends Controller{

    public $errors;

    public function indexAction(){

    }

    public function registerAction(){

        if($this->validator($_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["password"], $_POST["rep_password"])){
            $registerStm = database::get()->prepare('INSERT INTO users(firstname, lastname, email, password, profile_pic, account) VALUES (:firstname, :lastname, :email, :password, :profile_pic, :account)');
            $start_balance = 100;
            $registerStm->bindParam(':firstname', $_POST["firstname"]);
            $registerStm->bindParam(':lastname', $_POST["lastname"]);
            $registerStm->bindParam(':email', $_POST["email"]);
            $registerStm->bindParam(':password', $_POST["password"]);
            $registerStm->bindParam(':profile_pic', $_POST["profile_pic"]);
            $registerStm->bindParam(':account', $start_balance);

            $registerStm->execute();
            $this->loginAction();
        }
        else{
            $_SESSION['errors'] = $this->errors;
            header("location:../auth");
        }
    }

    public function loginAction(){

        $loginStm = database::get()->prepare('SELECT * FROM users WHERE email = :email');
        $loginStm->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
        $loginStm->execute();

        if($loginStm->rowCount() == 1){
            $row = $loginStm->fetch(PDO::FETCH_ASSOC);
            if(password_verify($_POST['password'], $row['password'])){
                $_SESSION["auth"] = "loggedIn";
                $_SESSION["user"] = $row;
                header("location:../");
            }
        }

    }

    public function logoutAction(){
        session_unset();
        session_destroy();

        require_once "/views/login.php";
    }

    private function validator($firstname, $lastname, $email, $pass1, $pass2){
        if( strlen($pass1) < 6  ) {
            $this->errors = " Your password has to be at least six characters long";
            return false;
        }
        if(empty($firstname) && empty($lastname) && empty($email) && empty($pass1)){
            $this->errors = "You have to fill in all fields";
            return false;
        }
        if(($pass1 != $pass2)) {
            $this->errors = "Your password need to match";
            return false;
        }
        if(! filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->errors = "Invalid email";
            return false;
        }
        else{
            return true;
        }
    }
}