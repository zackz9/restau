<?php

	class InscriptionController {
		public function httpGetMethod(Http $http, array $queryFields){

			return ['_form' => new InscriptionForm(),
					'message' => '',
					'class' => 'inscription'
		];

		}
		public function httpPostMethod(Http $http, array $formFields){

			// var_dump($formFields);
			$name = strtolower($formFields['name']);
			$email = strtolower($formFields['email']);
			$address = strtolower($formFields['address']);
			$password = md5($formFields['password']);
			$vpassword = md5($formFields['v-password']);

			if($password === $vpassword){
				$pass = true;
			}else{
				$pass = false;
			}

			if($pass){
				$userdata = new UserModel();
				if ($userdata -> inscription($name,$email,$password,$address)) {
					$success = 'Votre compte a été enregistré';
				}
				$http->redirectTo('/');
				return ['message' => $success, 'test' => 'inscription'];
			}else{
				$error = 'Verifier Votre Mot de Passe' ;
				return ['message' => $error, 'test' => 'inscription'];
			}
		}
	}
?>