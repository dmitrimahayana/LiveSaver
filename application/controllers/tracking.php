<?php

class Tracking extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this -> load -> model ('cari_donor_model');
        $this -> load -> model ('detail_caridonor_model');
        $this -> load -> model ('pasien_model');
    }
    
    function index (){        
    }
    
    function rubah_status_pasien($id_pasien){
        $result = $this -> pasien_model -> change_status ($id_pasien);
        /*if ($result){
            redirect('home','refresh');                
        }*/
    }
    
    function insert ($email_rs,$id_pasien,$pesan_sms){
        $pesan_sms = rawurldecode($pesan_sms); 
        $result = $this -> cari_donor_model -> insert ($email_rs, $pesan_sms, $id_pasien);        
        //echo $result;   
    }
    
    function insert_detail ($email_rs,$email_pendonor){
        $max_id = $this -> cari_donor_model -> get_max_id($email_rs);
        $result = $this -> detail_caridonor_model -> insert ($max_id , $email_pendonor);
        //echo $result;
    }
    
    function setData(){
        $idPasien = $this->input->post('idPasien');
        $session_email = $this->input->post('session_email');
        $isi_sms = $this->input->post('isi_sms');
        $email_telepon_donor = $this->input->post('email_telepon_donor');
        
        $this->rubah_status_pasien($idPasien);
        $this->insert ($session_email,$idPasien,$isi_sms);
        
        //echo $idPasien.' '.$session_email.' '.$isi_sms.'<br/>';
        //echo $email_telepon_donor.'<br/>';
        $temp1 = explode(";",$email_telepon_donor);
        for($i=0;$i<count($temp1);$i+=2){
            if(isset($temp1[$i]) && isset($temp1[$i+1])){
                //echo 'email:'.$temp1[$i].' no:'.$temp1[$i+1].'<br/>';
                $this->insert_detail ($session_email,$temp1[$i]);
            }
        }
        redirect(base_url().'home#page=page1');
        /*$message="Sukses Terkirim";
        $output = '{ "message": "'.$message.'", "bg_color": "'.$bg_color.'" }';
        echo $output;*/
    }
    
}

?>
