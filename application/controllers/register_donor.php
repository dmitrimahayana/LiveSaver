<?php if ( !defined('BASEPATH')) exit ('No direct script access allowed');

class Register_donor extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this -> load -> model('donor_model'); 
    }
    
    function index(){        
        $data_user = array (
                    'email_pendonor' => url_title($this -> input -> post ('email_donor')),
                    'nama_pendonor' => $this -> input -> post ('nama_donor'),
                    'alamat_pendonor' => $this -> input -> post ('alamat_donor'),
                    'telepon_pendonor' => $this -> input -> post ('telepon_donor'),
                    'darah_pendonor' => $this -> input -> post ('gol_darah_donor') ,
                    'rhesus_pendonor' => $this -> input -> post('rhesus_pendonor'),
                    'berat_pendonor' => $this -> input -> post ('berat_pendonor')
        );
        $password = $this -> input -> post ('password_donor');
        
        $result = $this -> donor_model -> insert ($data_user, $password);
        if ($result){
            $this -> load -> view ('success_view');
        }
        else{
            redirect ('beranda', 'refresh');
        }
        
        
    }
}

?>
