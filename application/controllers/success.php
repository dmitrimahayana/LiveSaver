<?php
session_start();

class Success extends CI_Controller{
    function __construct() {
        parent::__construct();
    }
    
    function index(){
       
        if($this->session->userdata('logged_in')){
            $this->load->view('success_view');
        }
        else{
            redirect( base_url().'beranda', 'refresh');
        }           
    }
    
    function logout (){
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect( base_url().'beranda', 'refresh');
    }
    
}

?>
