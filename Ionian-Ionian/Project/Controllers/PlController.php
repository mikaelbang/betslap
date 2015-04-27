<?php

namespace Project\Controllers;

use Ionian\Core\APIDump;
use Ionian\Core\Controller;
use Ionian\Database\Database;

Class PlController extends Controller{

	public function GroupShowAction($group){

		$ShowStm = Database::get()->prepare("SELECT home_team, away_team, start, result from events WHERE group_id = :group");
		

		$ShowStm->execute(array
			(':group'=>$group));
		$results = $ShowStm->fetchAll();

		$this->outputJson($results);		

	}
}