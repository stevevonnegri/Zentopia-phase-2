<?php
	//smarty
	require('libs/Smarty.class.php');
	
	//autoloader
	function chargerClass($class) {
	require('classes/'.$class.'.php');
	}
	spl_autoload_register('chargerClass');

?>