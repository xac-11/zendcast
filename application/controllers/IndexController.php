<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
  		/* accessing configuration parameters from a controller action */
    	$options = new Zend_Config($this->getInvokeArg('bootstrap')->getOptions());
    	echo "from controller:  " . $options->xac->message->local;
    	echo "<br />";
    	/* accessing configuration parameters globally using zend_registry */
    	echo "global: " . Zend_Registry::get('config')->xac->message->global;
    	
    }

    public function restAction()
    {
     	$client = new Zend_Http_Client();
    	$query = "zend";
    	$client->setUri("http://search.twitter.com/search.json?q=" . $query);
    	$json = Zend_Json::decode( $client->request("GET")->getBody() );
    	
    	//Xac_Util_Formater::printr( $json );
    	$this->view->twitterResults = $json['results'];
    	
    }

    public function renderpartialsAction()
    {
        $items = array();
        $items[] = $this->newItem(1, "xac");
        $items[] = $this->newItem(2, "murz");
        $items[] = $this->newItem(3, "ma");
        $items[] = $this->newItem(4, "pa");
        $items[] = $this->newItem(5, "josh");
        
        $this->view->items = $items;
    }
    
    private function newItem( $id, $name ) {
    	$item = new stdClass();
    	$item->name = $name;
    	$item->id = $id;
    	return $item;
    }


}





