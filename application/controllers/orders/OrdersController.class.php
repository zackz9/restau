<?php
	class OrdersController {

	public function httpGetMethod(Http $http, array $queryFields){

        $session = new UserSession();

        $verify = $session->verifySession();

        if(!$verify){
            $http->redirectTo('/user/inscription');
        }

		$id = $_GET['id'];

		// $session = new UserSession();

		$meal = new MealModel();

		$meals = $meal->listOne($id);

		$sessionuser = $session->sessionshow();

		return ['meal' => $meals, 'session' => $sessionuser, 'class' => 'panier'];
	}

	public function httpPostMethod(Http $http, array $formFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP POST
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */

    	$SESSION = new UserSession();

    	$Show = $SESSION->sessionshow();

    	/*var_dump($formFields, $Show);*/

    	$id = $_GET['id']; //recupérer l'identifiant du produit 

    	$mealid = $formFields['id'];
    	$qte = $formFields['quantite'];

    	$userid = $Show['id'];
        $price = $formFields['price'];
        $totale = $qte * $price;

    	/*var_dump($mealid, $userid, $qte, $totale);*/

    	$panier = new PanierModel();

    	$panier->insertpanier($mealid, $userid, $qte, $totale);


    	$http->redirectTo('/panier');

		/*$session = new UserSession();

		$meal = new MealModel();

		$meals = $meal->listOne($id);

		$sessionuser = $session->sessionshow();

		return ['meal' => $meals, 'session' => $sessionuser];*/
    }

}
?>