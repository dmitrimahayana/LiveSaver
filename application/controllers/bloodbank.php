<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bloodbank extends CI_Controller {

        public function __construct()
        {
             parent::__construct();
             $this -> load -> model ('pasien_model');
        }
        
	public function index()
	{
            $this->load->view('bloodbank/home');
	}
        
        function rubah_status_pasien($id_pasien){
            $result = $this -> pasien_model -> change_status ($id_pasien);
            if ($result){
                redirect('home','refresh');                
            }
        }
}
