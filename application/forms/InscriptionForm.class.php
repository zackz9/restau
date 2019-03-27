<?php
	class InscriptionForm extends Form{

		public function build(){
			$this->addFormField('name');
			$this->addFormField('email');
			$this->addFormField('address');
			$this->addFormField('password');

		}
	}
?>