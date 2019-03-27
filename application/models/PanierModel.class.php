<?php

class PanierModel {


	public function insertpanier($mealid,$userid, $qte, $total){

		$db = new Database();

		$sql = "INSERT  INTO panier (Mealid, Userid, Quantite, Total) VALUES('".$mealid."','".$userid."', '".$qte."','".$total."')";

		return $db->executeSql($sql);
	}
	public function show($userid) {

		// include Database Class
		$db = new Database();

		// command SQL
		$sql = "SELECT Mealid, m.Photo, m.SalePrice, m.Description, m.Name, SUM(p.Quantite) as Qte, SUM(Total) as total FROM panier as p, meal as m where p.Userid = '".$userid."' AND m.Id = p.Mealid GROUP BY Mealid";

		//execute & return the sql
		return $db->query($sql);
	}
	public function delete($mealid) {

		$db = new Database();

		$sql = "DELETE FROM panier WHERE Mealid = '".$mealid."'";

		return $db->executeSql($sql);
	}
	public function total($userid){

			$db = new Database();
			$sql = "SELECT sum(Total) as total from panier where Userid = '".$userid."'";

			return $db->query($sql);
	}



}
