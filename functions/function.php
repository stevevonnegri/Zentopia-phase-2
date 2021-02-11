<?php
	//smarty
	require('libs/Smarty.class.php');
	
	//autoloader
	function chargerClass($class) {
	require('classe/'.$class.'.php');
	}
	spl_autoload_register('chargerClass');
	
?>