<?php

/**
 * PHP-nMVC is a simple, clean and secure WebApp Skeleton based on NO-Model only View and Controller 
 *
 * PHP-nMVC is not a framework like CodeIgniter or similar
 * It is proof that you can develop applications in MVC logic without complicated framework, simply using native PHP code.
 *
 * @author Rino Russo
 * @link https://github.com/rinorusso/php-nMVC
 * @site http://www.fasttools.it/fast-php-nmvc/
 * @license http://opensource.org/licenses/GPL-2.0
 */


		 include_once('config/config.php'); 
		 

	 	
		 
		 // if user is not loggged in, redirect to home	
/*
		 if ($login->isUserLoggedIn() == false)  {
			header("Location: ".$dir_base);
			exit;
	
			}  	 
*/			
			//is default controller
			include("controllers/dashboard.php");

?>