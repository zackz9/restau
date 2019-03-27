<?php

	class PanierController {

		public function httpGetMethod(Http $http, array $queryFields) {

			$paniemodel = new PanierModel();

			if(!empty($_GET)){
				$mealid = $_GET['id'];

				$paniemodel->delete($mealid);
			}
			$usersession = new UserSession();

			$verify = $usersession->verifySession();

	        if(!$verify){
	            $http->redirectTo('/user/inscription');
	        }

			$session = $usersession->sessionshow();

			$userid = $session['id'];

			// $paniemodel = new PanierModel();

			$panier = $paniemodel->show($userid);

			$mealmodel = new MealModel();
			$paniers = array();
			foreach ($panier as $key) {
				array_push($paniers, $mealmodel->listOne($key['Mealid']));
				// $meals = ;
				// var_dump($meals['Name']);
			}

			$to = $paniemodel->total($userid);




			return [ 'panier' => $panier, 'class' => 'panier', 'total' => $to ];

		}

	}
