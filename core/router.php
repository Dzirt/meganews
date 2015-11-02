<?php
require_once("/models/cat_model.php");
/**
 * summary
 */
class Ruoter extends Controller
{
	private $list;
	private $CategoriesDB = new CategoryModel();
    /**
     * summary
     */
    public function __construct($url)
    {
    	if (file_exists("/controllers".lcfirst(current($url)).".php")){
    		$controller = current($url);
    		$controller = new $controller();
    	}
    	else {
    		$list=$CategoriesDB->get();     
    		if(!array_search(current($url), $list)){
    			$this->error();
    			die();
    		}

    	}
    }
}