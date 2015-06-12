<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beranda extends CI_Controller {

    public function __construct()
    {
         parent::__construct();
         $this -> load -> model ('bloodbank_model');
    }

    public function index()
    {
            $this->load->view('beranda');
    }

    public function show($page){
        if($page=="partnership"){
            $query['data']= $this->bloodbank_model->get_all_bloodbank();
            /*foreach ($query['data'] as $temp){
            echo $temp-> nama_rs.' '.$temp-> alamat_rs.' '.$temp-> telepon_rs.'<br/>';
            }*/
            $this -> load -> view ($page, $query);
        }
        else {
            $this -> load -> view ($page);
        }
    }
        
}
