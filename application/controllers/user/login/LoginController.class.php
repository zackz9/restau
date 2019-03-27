<?php

	class LoginController {

		public function httpGetMethod(Http $http, array $queryFields) {

			$session = new UserSession();
			if ($session->verifySession()) :
				$http->redirectTo('/');
			endif;

			return ['_form' => new LoginForm(),
					'message' => '',
					'class' => 'inscription'
					];
		}
		public function httpPostMethod(Http $http, array $formFields) {

			$login = new UserModel();
			$email = strtolower($formFields['email']);
			$password = md5($formFields['password']);			
			
			if ($login->selectUser($email, $password)) :

				$user = $login->selectUser($email, $password);
				$session = new UserSession();
				$session->Sessionopen($email, $user['id']);

				if ($session-> verifySession()) :
					$http-> redirectTo('/');
				endif;
			
			else :
				return ['_form' => new LoginForm(),
					'message' => 'E-mail ou mot de passe incorrect !',
					'class' => 'inscription'
				];
			endif;
		}
	}
?>