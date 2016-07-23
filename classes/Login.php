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

 
class Login
{
    /**
     * @var object The database connection
     */
    private $db_connection = null;
    /**
     * @var array Collection of error messages
     */
    public $errors = array();
    /**
     * @var array Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$login = new Login();"
     */
    public function __construct()
    {
        // create/read session, absolutely necessary
        session_start();

        // check the possible login actions:
        // if user tried to log out (happen when user clicks logout button)
        if (isset($_GET["logout"])) {
            $this->doLogout();
        }
        // login via post data (if user just submitted a login form)
        elseif (isset($_POST["login"])) {
            $this->dologinWithPostData();
        }
    }

    /**
     * log in with post data
     */
    private function dologinWithPostData()
    {
        // check login form contents
        if (empty($_POST['user_name'])) {
            $this->errors[] = "Username richiesto.";
        } elseif (empty($_POST['user_password'])) {
            $this->errors[] = "Password richiesta.";
        } elseif (!empty($_POST['user_name']) && !empty($_POST['user_password'])) {

				include_once('config/db.php');

            // create a database connection, using the constants from config/db.php (which we loaded in index.php)
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // change character set to utf8 and check it
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {

                // escape the POST stuff
                $user_name = $this->db_connection->real_escape_string($_POST['user_name']);

                // database query, getting all the info of the selected user (allows login via email address in the
                // username field)
                $sql = "SELECT user_name, user_email, user_password_hash, user_active, user_role, sedi_abilitate, upload
                        FROM ".TAB_USERS." 
                        WHERE user_name = '" . $user_name . "' OR user_email = '" . $user_name . "';";
                $result_of_login_check = $this->db_connection->query($sql);

                // if this user exists
                if ($result_of_login_check->num_rows == 1) {

                    // get result row (as an object)
                    $result_row = $result_of_login_check->fetch_object();

                    // using PHP 5.5's password_verify() function to check if the provided password fits
                    // the hash of that user's password
                    if (password_verify($_POST['user_password'], $result_row->user_password_hash)) {

                        // write user data into PHP SESSION (a file on your server)
                        $_SESSION['user_name'] = $result_row->user_name;
                        $_SESSION['user_email'] = $result_row->user_email;
                        $_SESSION['user_role'] = $result_row->user_role;
                        $_SESSION['user_active'] = $result_row->user_active;
                        $_SESSION['user_login_status'] = 1;
                        $_SESSION['user_sedi_abilitate'] = explode(",", $result_row->sedi_abilitate);
                        $_SESSION['user_can_upload'] = $result_row->upload;
                        

                    } else {
                        $this->errors[] = "Password errata, riprova.";
                    }
                } else {
                    $this->errors[] = "Utente inesistente.";
                }
            } else {
                $this->errors[] = "Problemi di connessione al database.";
            }
        }
    }

    /**
     * perform the logout
     */
    public function doLogout()
    {
        // delete the session of the user
        $_SESSION = array();
        session_destroy();
        // return a little feeedback message
        $this->messages[] = "Ti sei disconnesso regolarmente.";

    }

    /**
     * simply return the current state of the user's login
     * @return boolean user's login status
     */
    public function isUserLoggedIn()
    {
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }
        // default return
        return false;
    }
}
