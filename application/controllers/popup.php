<?php

class Popup extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this -> load -> model ('pasien_model');
        $this -> load -> model ('donor_model');
        $this -> load -> model ('detail_caridonor_model');
    }
    
    function index(){
        
    }
    
    function load(){
//        echo $this->input->post('page').' ';
  //      echo $this->input->post('id');
        
        $data['data_donor'] = $this -> donor_model -> get_donor_data ($this -> input -> post('id'));
        $this->load->view('form/form_edit_profile', $data);
        //if($page=='das')
    }
    
    function cari_pendonor (){
        //echo $this -> input -> post ('id');
        $id_pasien = $this -> input -> post ('id');
        $data['data_pasien'] = $this -> pasien_model -> get_data_pasien ($id_pasien);  
                
        $result['bisa_donor'] = $this -> donor_model -> find_match ($data['data_pasien']);
        if (!empty($result['bisa_donor'])){
            $this -> load -> view ('form/form_send_sms', array_merge($result, $data));
        }
        else {
            echo "Maaf tidak ada yang cocok";
        }
    }
    
    function ubah_tanggal_pasien (){
//        echo $this -> input -> post ('id_pas');
  //      echo strtotime($this -> input -> post ('to'));
        $query = $this -> pasien_model -> change_date($this -> input -> post('id_pas'), strtotime($this -> input-> post('to')));
    
        //redirect ('home', 'refresh');
    }
    
    
    function tandai_sudah_donor(){
        $id = $this -> input -> post ('id_cari');
        $email =  $this -> input -> post ('email_cari');
        
        $result = $this -> donor_model -> update_terakhir_donor ($email);
        $hasil = $this -> detail_caridonor_model -> tandai_sudah_donor ($id, $email);
        redirect('home', 'refresh');
    }

}

?>
