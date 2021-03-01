<?php

/**
 * TEST PHPUnits
 */
require('function.php');
require('config.php');
require('../classes/Model.php');
require('../classes/Utilisateur.php');

//require ('../controllers/InscriptionController.php');

class TestClass extends \PHPUnit\Framework\TestCase {

	
	/**
	 * test la verification de mot de passe
	 *
	 * @dataProvider donneesForTestMotDePasse
	 *
	 */
	public function testMotDePasse($mot_de_passe) {

		$this->assertSame(VerifMot_De_PasseConforme($mot_de_passe), true);

	}

	public function donneesForTestMotDePasse() {

		return [
			['Bonjour1'],
			['BONJOUR2'],
			['bonjour3'],
			['isndvqijndfpianenfcheniaznes12'],
			['azertyuiopmlkjhgfdsqwxcvbnhyr4']
		];

	}

	/**
	 * test la verification du format de l'adresse mail
	 *
	 * @dataProvider donneesForTestFormatEmail
	 *
	 *
	public function testFormatEmail($user) {

		$this->assertSame($user->EmailBonFormat('MODIF'), 'ok');
		
	}

	public function donneesForTestFormatEmail() {
		$array1 = array('email' => 'zentopia-olenna@gmail.com');
		$user1 = new Utilisateur($array1);
		$user1->setBddTableau($dbh);

		return [
			[$user1]
		];
	}
	*/

	
	/**
	 * test la verification de l'age
	 *
	 * @dataProvider donneesForTestAge
	 *
	 */
	public function testAge($user1, $user2, $user3) {

		$this->assertSame($user1->VerifPlusDe18ans(), true);
		$this->assertSame($user2->VerifPlusDe18ans(), true);
		$this->assertSame($user3->VerifPlusDe18ans(), false);

	}

	public function donneesForTestAge() {
		$array1 = array('date_de_naissance' => '2003:02:28');
		$user1 = new Utilisateur($array1);
		
		$array2 = array('date_de_naissance' => '2003:03:01');
		$user2 = new Utilisateur($array2);

		$array3 = array('date_de_naissance' => '2003:03:02');
		$user3 = new Utilisateur($array3);

		$user1->setBddTableau($dbh);
		$user2->setBddTableau($dbh);
		$user3->setBddTableau($dbh);

		return [
			[$user1, $user2, $user3]
		];
	}
}