<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    	global $_SESSION;
        // action body
    	if(!$_SESSION['access'])
    	{
    		$this->view->myAccess = false;
    		//return false;
    	
    	} else {
    	
    		$this->view->myAccess = true;
    		//return true;
    	}
        // action body
        
    	
    }

    public function loginAction()
    {
    	echo "hola anto this is login action";

   	
    }

}
