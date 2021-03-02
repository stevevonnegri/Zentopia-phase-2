<?php

/**
 * TEST PHPUnits
 */
require('function.php');
require('config.php');
require('../classes/Model.php');
require('../classes/Utilisateur.php');
require('../classes/Seance.php');

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
	 * test la verification de l'age
	 * /!\ attention true = -de 18 ans et false + de 18 ans.
	 *
	 */
	public function testAge() {

		$array1 = array('date_de_naissance' => date('2003/03/01'));
		$user1 = new Utilisateur($array1);
		
		$array2 = array('date_de_naissance' => date('2003/03/02'));
		$user2 = new Utilisateur($array2);

		$array3 = array('date_de_naissance' => '2003/03/03');
		$user3 = new Utilisateur($array3);

		$this->assertSame($user1->VerifPlusDe18ans(), false);
		$this->assertSame($user2->VerifPlusDe18ans(), false);
		$this->assertSame($user3->VerifPlusDe18ans(), true);

	}

	/**
	 * test de la verification de l'heure de debut et fin d'une seance.*
	 * 
	 * @dataProvider donneesForTestDateHeure
	 */
	public function testDateHeure($date, $heure_debut, $heure_fin) {
		$array1 = array('id_seance' => 1);
		$seance = new Seance($array1);

		$this->assertSame($seance->VerifDateHeure($date, $heure_debut, $heure_fin), false);
	}

	
	public function donneesForTestDateHeure() {

		return [
			['2021-03-03', '10:00','10:01'],
			[date('Y-m-d'), '14:17', '16:00'],
			['2021-03-04', '00:00', '24:00'],
			['2021-03-04', '00:1601234', '00:17'],
			['2021-0304-168-0987', '00:1601234', '00:17'],
			['2021-03-04', '200:00', '291:00'],

		];

	}

}