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

//session_start();

/*

// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
}

*/


function getUsers() {
	
//include_once('config/db.php');	
	
	$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);


	$results_array = array();
	$result = mysqli_query($db,"select * from ".TAB_USERS." order by user_name;" );
	while ($row = $result->fetch_assoc()) {
  		$results_array[] = $row;
	}	
	
	$_SESSION['users'] = $results_array;
	
	mysqli_free_result($result);

	mysqli_close($db);

}





?> 