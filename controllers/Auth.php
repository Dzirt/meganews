<?php
require_once("core/Controller.php");
require_once("models/user_auth.php");
/**
 * summary
 */
class Auth extends Controller
{
	private $userDB;
    function __construct() {
    	$this->userDB = new UserAuth();
    	if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    		if (password_verify($_POST['password'], $this->userDB->login($_POST['login'])['password'])) {
    			echo "correct";
    			$_SESSION['auth'] = true;
    			$_SESSION['type'] = $this->userDB->login($_POST['login'])['type'];
                $_SESSION['login'] = $this->userDB->login($_POST['login'])['username'];
    			header('Location: /');
    		}
    		else
    			echo "wrong login/password";
    	}
    }
    public function index()
    {
        $this->view("login");
    }
    public function logout() {
    	unset($_SESSION['auth']);
        unset($_SESSION['type']);
        unset($_SESSION['login']);
    	header('Location: /');
    }
}