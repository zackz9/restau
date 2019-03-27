<?php
	/**
	 * 
	 */
	class UserSession {
		
		public function __construct() // Construction d'une session
		{
			if(session_status() == PHP_SESSION_NONE):
				session_start();
			endif;
			
		}
		public function Sessionopen($email,$id){ //Ouverture de la session par son email et son id 

			$_SESSION['email'] = $email ;
			$_SESSION['id'] = $id;

			return $_SESSION;
		}
		public function verifySession(){

			if (!empty($_SESSION)) :
				return true;
			endif;

			return false;
		}

		public function sessionshow(){
			return $_SESSION;
		}

		public function destroySession(){
			
			if (!empty($_SESSION)) {

				session_destroy();
			}
		}

		

	}
?>