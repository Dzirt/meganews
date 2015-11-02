<?php 
/**
 * summary
 */
require_once("core/Controller.php");
require_once("models/post_model.php");
class Main extends Controller
{
    /**
     * summary
     */
    private $posts;
    function __construct() {
    	$this->posts = new PostModel();	
        for ($i = 0; $i < 3; $i++) {
            $randThree[] = $this->posts->getRand();
        }
        $data = array(
            'lastFive' => $this->posts->getPage(1,5),
            'randThree' => $randThree);
        $this->view('index',$data);
    }
    public function index()
    {
        $this->view('index');
    }
}