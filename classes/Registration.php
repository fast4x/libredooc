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

class Registration
{
    /**
     * @var object $db_connection The database connection
     */
    private $db_connection = null;
    /**
     * @var array $errors Collection of error messages
     */
    public $errors = array();
    /**
     * @var array $messages Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$registration = new Registration();"
     */
    public function __construct()
    {
        if (isset($_POST["register"])) {
            $this->registerNewUser();
        }
    }

    /**
     * handles the entire registration process. checks all error possibilities
     * and creates a new user in the database if everything is fine
     */
    private function registerNewUser()
    {
    	
    	//echo "creazione utente";
        if (empty($_POST['user_name'])) {
            $this->errors[] = "Digitare Username";
        } elseif (empty($_POST['user_password_new']) || empty($_POST['user_password_repeat'])) {
            $this->errors[] = "Password vuota";
        } elseif ($_POST['user_password_new'] !== $_POST['user_password_repeat']) {
            $this->errors[] = "Le password non coincidono";
        } elseif (strlen($_POST['user_password_new']) < 6) {
            $this->errors[] = "La password deve essere almeno 6 caratteri";
        } elseif (strlen($_POST['user_name']) > 64 || strlen($_POST['user_name']) < 2) {
            $this->errors[] = "Username deve essere da 2 a 64 caratteri";
        } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])) {
            $this->errors[] = "Username does not fit the name scheme: only a-Z and numbers are allowed, 2 to 64 characters";
        } elseif (empty($_POST['user_email'])) {
            $this->errors[] = "Digitare email";
        } elseif (strlen($_POST['user_email']) > 64) {
            $this->errors[] = "Email troppo lunga";
        } elseif (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "La tua email non &egrave; valida";
        } elseif (!empty($_POST['user_name'])
            && strlen($_POST['user_name']) <= 64
            && strlen($_POST['user_name']) >= 2
            && preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])
            && !empty($_POST['user_email'])
            && strlen($_POST['user_email']) <= 64
            && filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)
            && !empty($_POST['user_password_new'])
            && !empty($_POST['user_password_repeat'])
            && ($_POST['user_password_new'] === $_POST['user_password_repeat'])
        ) {
        	
				include_once('config/db.php');

            // create a database connection, using the constants from config/db.php (which we loaded in index.php)
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        	
            // change character set to utf8 and check it
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }



            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {

//echo "connessione db ok";

                // escaping, additionally removing everything that could be (html/javascript-) code
                $user_name = $this->db_connection->real_escape_string(strip_tags($_POST['user_name'], ENT_QUOTES));
                $user_email = $this->db_connection->real_escape_string(strip_tags($_POST['user_email'], ENT_QUOTES));

                $user_password = $_POST['user_password_new'];

                // crypt the user's password with PHP 5.5's password_hash() function, results in a 60 character
                // hash string. the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using
                // PHP 5.3/5.4, by the password hashing compatibility library
                $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);

                // check if user or email address already exists
                $sql = "SELECT * FROM ".TAB_USERS." WHERE user_name = '" . $user_name . "' OR user_email = '" . $user_email . "';";
                $query_check_user_name = $this->db_connection->query($sql);

                if ($query_check_user_name->num_rows == 1) {
                    $this->errors[] = "Username o email gi&agrave; presente.";
                } else {
                    // write new user's data into database
                    $sql = "INSERT INTO ".TAB_USERS." (user_name, user_password_hash, user_email)
                            VALUES('" . $user_name . "', '" . $user_password_hash . "', '" . $user_email . "');";
                    $query_new_user_insert = $this->db_connection->query($sql);

                    // if user has been added successfully
                    if ($query_new_user_insert) {
                        $this->messages[] = "La registrazione &egrave; andata a buon fine.";
                    } else {
                        $this->errors[] = "Spiacente, la registrazione non &egrave; avvenuta con successo, riprova.";
                    }
                }
            } else {
                $this->errors[] = "Problemi di connessione al database.";
            }
        } else {
            $this->errors[] = "Un errore imprevisto, riprova.";
        }
        
//echo print_r($this->errors);        
        
    }
}
