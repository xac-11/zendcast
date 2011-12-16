<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	/* custom routes with zend controllers screen */
	public function _initRoutes() {
		$frontController = Zend_Controller_Front::getInstance();
		$router = $frontController->getRouter();
		$router->addRoute('listOnIndex',  new Zend_Controller_Router_Route_Static( 'list', array('controller' => 'Index', 'action' => 'list'))); 		// listOnIndex uniq id
		$router->addRoute('listOnIndexWidthUsers',  new Zend_Controller_Router_Route( 'list/:user/', array('controller' => 'Index', 'action' => 'list')));
	}
	
	/* accessing configuration parameters globally using zend_registry */
	public function _initConfig() {
		$config = new Zend_Config($this->getOptions());
		Zend_Registry::set('config', $config);
		return $config;
	}
	


}

