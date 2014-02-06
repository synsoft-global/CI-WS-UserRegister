CodeIgniter - Webservice Sample Code
=====================================

Introduction 
-------------------------------------------------------------
Webservice sample code shows that the user get registered by calling the user register webservice.

Requirements
-------------------------------------------------------------
    PHP 5.2 or greater
    CodeIgniter 2.1.0 to 3.0-dev	
	
Manual Installation
-------------------------------------------------------------

1) Download Package
   
2) Move into target directories

Usage
-------------------------------------------------------------
Call the webservice controller and post the JSON string in given format.
<pre>
{"method":"registeruser","email":"eample@example.com","username":"syn123","password":"123456","lat":37.332331,"lng":-122.031219}
</pre>

Controller will pass the post data to model. Model will excute query and return the result.
<pre>
	$insert = array(
				'username'=>$arr->username,	
				'email'=>$arr->email,
				'password'=>md5($arr->password),
				'lat'=>$arr->lat,
				'lng'=>$arr->lng,
				'register_date'=>date('Y-m-d H:i:s')
			);
	$this->db->insert('user',$insert);
</pre>

Returns the excuted result.
<pre>
if($this->db->insert('user',$insert)){	
	$data['register'] = "User register successfully";
}else{
	$data['register'] = "Unable to register user";
}
</pre>


Support
-------------------------------------------------------------

If you have an issues, please send me an email at "mukeshpal@synsoftglobal.com" and if you still need help, open a bug report in GitHub's issue tracker.
