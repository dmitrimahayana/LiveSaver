<?php

class Register_pasien extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this -> load -> library('mylibrary');
        $this -> load -> model ('pasien_model');
    }
    
    function index (){
        $this -> mylibrary -> check_session();
        $session_data = $this->session->userdata('logged_in');
                       
        $data_pasien = array (
            
            'email_rs' => $session_data['email'],            
            'nama_pasien' => $this -> input -> post ('nama_pasien'),
            'darah_pasien' => $this -> input -> post ('darah_pasien'),
            'penyakit_pasien' => $this -> input -> post ('penyakit_pasien'),
            'tgl_butuhdarah' => strtotime( $this -> input -> post('from')),
            'rhesus_pasien' => $this -> input -> post('rhesus_pasien'),
            'status_pasien' => false            
        );
        
        $result = $this -> pasien_model -> insert ($data_pasien);        
        if ($result){
            redirect (base_url().'home', 'refresh');
        }        
    }
    
    
    
}

?>
