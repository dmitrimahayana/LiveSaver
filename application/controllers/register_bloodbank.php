<?php if ( !defined('BASEPATH')) exit ('No direct script access allowed');

class Register_bloodbank extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this -> load -> model('bloodbank_model');
    }
    
    function index (){
        
        $data_user = array (
            'email_rs' => url_title($this -> input -> post ('email_rs')),
            'nama_rs' => $this -> input -> post ('nama_rs'),
            'alamat_rs' => $this -> input -> post ('alamat_rs'),
            'telepon_rs' => $this -> input -> post ('telepon_rs'),
            'dokumen_rs' => $this -> input -> post ('dokumen_rs')                    
        );
        $password = $this -> input -> post ('password_rs');
        
        $result = $this -> bloodbank_model -> insert ($data_user, $password);
        if ($result){
            $this -> load -> view ('success_view');
        }
        else{
            redirect ( base_url().'beranda', 'refresh');
        }
    }
    
}

?>
