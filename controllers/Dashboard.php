<?php

/**
 * summary
 */
require_once('core/Controller.php');
require_once('models/post_model.php');
class Dashboard extends Controller
{
    /**
     * summary
     */
    private $postDB;
    public function __construct()
    {
    	if (isset($_SESSION['auth']) && $_SESSION['type'] === 'admin') {
    		$this->postDB = new PostModel();  	
		}
		else {
			$this->error();
			die();
		}
        
    }
    public function index()
    {
    	$this->view('dashboard');
    }
    public function add_news() {
    	$error ='';
    	if($_SERVER['REQUEST_METHOD'] === "POST") {
	    	$upload_dir = '../upload_img/';
	    	$author = $this->valid($_POST['author']);
	    	if ($author === '')
	    		$author = $_SESSION['login'];
	    	$data = array('title' => $this->valid($_POST['title']),
			    			'short_text' => $this->valid($_POST['short_text']),
			    			'full_text' => $this->valid($_POST['full_text']),
		    				'author' => $author,
	    					'image' => '');
	    	if ($this->postDB->insert($data))
				header('Location: /dashboard/manage_news');
			else		
    			$this->view('add_news',$error);
    	}
    	$this->view('add_news');

	}
	public function manage_news() {
		$data = $this->postDB->getAll();				
		$this->view('manage_news',$data);
	}
	public function delete_news($id) {
		if ($this->postDB->deleteByID($id))
			header('Location: /dashboard/manage_news');
	}
	public function edit_news($id) {
		$data = $this->postDB->getPost($id);
		
		if(!$data) { 
			header('Location: /dashboard/manage_news'); 
		}
		if($_SERVER['REQUEST_METHOD'] === "POST") {
			$data = array('title' => $this->valid($_POST['title']),
			    			'short_text' => $this->valid($_POST['short_text']),
			    			'full_text' => $this->valid($_POST['full_text']),
		    				'author' => $this->valid($_POST['author']),
	    					'image' => '');
			if($this->postDB->update($id, $data)){
				header('Location: /dashboard/manage_news');				
			}
			else {
				$error = 'Заполните все поля';
			}

		}
		$this->view('edit_news', $data);	
	}
    private function valid($var) {
    	return htmlspecialchars($var);
    }
}