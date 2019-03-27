<?php

class CommandeModel {


	public function all($userid){

		$db = new Database();

		$sql = "SELECT * FROM commandes ";

		return $db->query($sql);
	}

	public function insert($mealid, $userid, $qte, $total){

		$db = new Database();

		$sql = "INSERT INTO commandes(Mealid, Userid, Quantite, Total) VALUES('".$mealid."','".$userid."', '".$qte."','".$total."') ";
		$db->executeSql($sql);

	}

	public function delete($mealid) {

		$db = new Database();

		$sql = "DELETE FROM commandes WHERE Mealid = '".$mealid."'";

		return $db->executeSql($sql);


	}

	public function show($userid) {

		$db = new Database();

		$sql = "SELECT * FROM commandes WHERE Userid='"..$userid"'";

		return $db->query($sql);

	}

}
