<?php
	class CommandeController {

	public function httpGetMethod(Http $http, array $queryFields){

        $session = new UserSession();

        $user = $session->sessionshow();

        // $panier = new PanierModel();

        // $panier->show();
        return [ 'user' => $user, 'class' => 'inscription'];

	}

	public function httpPostMethod(Http $http, array $formFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP POST
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */

        $session = new UserSession();

        $user = $session->sessionshow();

        $panier = new PanierModel();

        $pp = $panier->show($user['id']);
        // return [ 'user' => $p ];
				if(count($pp) > 0 ){
					foreach ($pp as $pan) {
	            $mealid = $pan['Mealid'];
	            $Qte = $pan['Qte'];
	            $total = $pan['total'];

	            $command = new CommandeModel();
	            $command->insert($mealid,$user['id'],$Qte,$total);
	            $panier->delete($mealid);
	        }
				}else{
					return [ 'message' => 'Votre panier est vide, merci de choisir des articles afin de passer à la commande', 'success' => '0' ,'class' => 'command'];
				}



				return ['class' => 'command', 'success' => '1'];
		/*$session = new UserSession();

		$meal = new MealModel();

		$meals = $meal->listOne($id);

		$sessionuser = $session->sessionshow();

		return ['meal' => $meals, 'session' => $sessionuser];*/
    }

}
?>
