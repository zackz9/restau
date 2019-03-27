<?php

class LogoutController{

	public function httpGetMethod(Http $http, array $formFields) {

		$session = new UserSession();

		$session->destroySession();
		$http->redirectTo('/');

	}
}
?>