<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Registermodel extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	function userRegister($arr){
		$query = $this->db->get_where('user',array('email'=>$arr->email));
		if(!$query->num_rows()){
			$insert = array(
				'username'=>$arr->username,
				'email'=>$arr->email,
				'password'=>md5($arr->password),
				'lat'=>$arr->lat,
				'lng'=>$arr->lng
				'create_date'=>date('Y-m-d H:i:s')

			);
			if($this->db->insert('user',$insert)){				
				$data['register'] = "User register successfully";
			}else{
				$data['register'] = "Unable to register user";
			}
		}else{
			$data['register'] = "User already exist";
		}
		return $data;
	}
}