<?php if ( !defined('BASEPATH')) exit ('No direct script access allowed');
session_start();

class Mylibrary{

    public function check_session () {

        $ci = & get_instance();
        if($ci->session->userdata('logged_in') == false){
            redirect( base_url().'beranda', 'refresh');
        }
        else {
            
        }
    }
    
}

?>
