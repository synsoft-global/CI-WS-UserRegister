<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webservice extends CI_Controller{
	private $jsondecode;
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{	
		/*
		JSON string example
		
		@usage
		$this->jsondecode =json_decode('{"method":"registeruser","email":"eample@example.com","username":"syn123","password":"123456","lat":37.332331,"lng":-122.031219}');
		
		*/
		//Data post in JSON format
		$this->jsondecode =json_decode($this->input->get_post('posts',true));	
		
		$method= $this->jsondecode->method;
		$method = trim($method);
		
		switch($method){
			
			case 'registeruser' :					// insert user details
				echo $this->registeruser();
				break;		
			
		}
	}
		
	/*
		Function inserts the user details and return the Json string to called webservice.
		
		@return JSON sting
	*/
	function registeruser(){						
		$this->load->model('Registermodel');
		$data = $this->Registermodel->userRegister($this->jsondecode);
		$resultstr = $this->createJson($data);
		return $resultstr;
	}
	
	
	/*
		Function converts the result array into Json string
		
		@return JSON sting
	*/
	function createJson($array){					
		$jsonencode= json_encode(array("result"=>$array));
		return $jsonencode;
	}
}
?>
