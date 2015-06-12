<?php if ( !defined('BASEPATH')) exit ('No direct script access allowed');

class Login extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this -> load -> model('user', '', TRUE);
        $this -> load -> library('form_validation');
    }
    
    function index(){
        
        $username = url_title($this -> input -> post ('username'));
        $password = $this -> input -> post ('password');

        $result = $this -> user -> login ($username, $password);

        if ($result){
            $sess_array = array();
            foreach($result as $row)
	    {
	       $sess_array = array(
	         'email' => $row->email,
                 'cat_id' => $row->cat_id
	       );
	       $this->session->set_userdata('logged_in', $sess_array);

               redirect (base_url().'home', 'refresh');

	    }
        }
        else{
            redirect ( base_url().'beranda', 'refresh');
        }
    }        
}

?>
