<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Donor extends CI_Controller {

        public function __construct()
        {
             parent::__construct();
             $this -> load -> helper ('date');
             $this -> load -> model ('donor_model');
             $this -> load -> model ('detail_caridonor_model');
        }
        
        public function checkDate(){
            $from=  strtotime($this->input->post('from'));
            $to=  strtotime($this->input->post('to'));
            
            echo $this->input->post('from').' '.$from.'<br/>';
            echo $this->input->post('to').' '.$to.'<br/>';
            
            $datestring = "%m/%d/%Y";
            $time = time();

            $dateNow=mdate($datestring, $time);
            $dateNowInt=strtotime($dateNow);
            echo $dateNow.' '.$dateNowInt.'<br/>';
            
            if($dateNowInt==$from || $dateNowInt==$to){
                echo "SEKARANG";
                
            }
            
            if($dateNowInt<=$to and $dateNowInt>=$from){
                echo "RANGE";
            }                       
            
        }
        
        function insert_available_days (){
            
            $from=  strtotime($this->input->post('from'));
            $to=  strtotime($this->input->post('to'));

            $result = $this -> donor_model -> update_available_donor ($from, $to);            
            if ($result){
               redirect (base_url().'home', 'refresh');
            }
        }
        
        function update_profil_donor (){            
            $result  = $this -> donor_model -> update_profil($this -> input -> post ('alamat'), 
                    $this -> input -> post ('telepon'), $this -> input -> post('berat'));
            if ($result ){
                redirect (base_url().'home', 'refresh');
            }
        }
        
        function bersedia_donor (){
            $result = $this -> detail_caridonor_model -> update_setuju($this -> input -> post ('hidden_id_detail_caridonor'));
        
            redirect('home', 'refresh');
        }
        
}