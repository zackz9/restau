<?php

class MealModel {

	public function listAll(){

		$db = new Database();

		$sql = "SELECT * FROM meal";

		return $db->query($sql);
	}

	public function listOne($id){
		$db = new Database();

		$sql = "SELECT * FROM meal WHERE id='".$id."'";

		return $db->queryOne($sql);
	}

	// public function price(){

	// 	$db = new Database();

	// 	$sql = "SELECT * FROM meal where SalePrice>10";

	// 	return $db->query($sql);
	// }
}

?>