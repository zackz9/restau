<?php

	class UserModel {
		public function inscription ($name,$email,$password,$adress){
			$db = new Database();
			$sql = "INSERT INTO user (name, email, password) VALUES ('".$name."', '".$email."', '".$password."')";
			return $db -> executeSql($sql);

		}
		public function selectUser($email, $password){
			$db = new Database();
			$sql = "SELECT * FROM user WHERE email='".$email."' && password='".$password."' ";
			return $db->queryOne($sql);
		}
	}
?>
