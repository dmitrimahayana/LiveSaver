<?php if (! defined('BASEPATH')) exit ('no direct script access allowed');

class Home extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this -> load -> library ('mylibrary');
        $this -> load -> model ('donor_model');
        $this -> load -> model ('bloodbank_model');  
        $this -> load -> model ('pasien_model');
        $this -> load -> model ('detail_caridonor_model');
        $this->load->library("pagination");
    }
    
    function index(){        
        $this -> mylibrary -> check_session();
        $session_data = $this->session->userdata('logged_in');

        $this ->get_data_user($session_data['email'], $session_data['cat_id']);
    }

    function logout (){        
        $this->session->unset_userdata('logged_in');
        redirect( base_url().'beranda', 'refresh');
    }
    
    function get_data_user ($id , $cat_id){
        
        if ($cat_id == 1 ){
            
            //$result = $this -> donor_model -> get_donor_data ($id);   
            
            // ambil data pendonor
            /*$data_donor = array (
                'nama' => $result['nama_pendonor'],
                'alamat' => $result['alamat_pendonor'],
                'telepon' => $result['telepon_pendonor'],
                'darah' => $result['darah_pendonor']
            );*/
            $data['data_donor'] = $this -> donor_model -> get_donor_data ($id);
            
            // ambil data rumah sakit
            //$data_rs['data_bloodbank'] = $this -> bloodbank_model -> get_all_bloodbank();
            //$data_rs['data_bloodbank'] = $this -> bloodbank_model -> get_pasien_by_bloodbank($id);
            
            $temp=$this->bloodbank_model->count_row_pasien_by_blood($id);
            foreach ($temp as $key){
            $countRow= $key->jml;
            }

            $config = array();
            $config["base_url"] = base_url().'home/index/';
            $config["total_rows"] = $countRow;
            $config["per_page"] = 3;//rubah per page nya
            $config["uri_segment"] = 3;
            $config['full_tag_open'] = '<div class="pagination">';
            $config['full_tag_close'] = '</div>';
            $config['next_link'] = 'Next &raquo;';
            $config['prev_link'] = '&laquo; Back';
            $config['cur_tag_open'] = '<span class="current">';
            $config['cur_tag_close'] = '</span>';

            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['links'] = $this->pagination->create_links();

            $data_rs['data_bloodbank'] = $this -> bloodbank_model -> get_pasien_by_bloodbank($id, $config["per_page"], $page);
   
            
            
            $this -> load -> view( 'donor/home', array_merge($data, $data_rs));
            
//            $this -> load -> view ('donor/home', $data_donor);
        }
        else { 
            
            $result = $this -> bloodbank_model -> get_bloodbank_data ($id);
            
            $data_bloodbank = array (
                'email' => $result['email_rs'],
                'nama' => $result['nama_rs'],
                'alamat' => $result['alamat_rs'],
                'telepon' => $result['telepon_rs']                
            );
                      
            //$data['data_pasien'] = $this -> pasien_model ->  get_all_pasien();
            $data['data_pasien'] = $this -> pasien_model -> get_pasien_by_rs ($result['email_rs'], 0);
            $data_butuh['data_pasien_butuh_darah'] = $this -> pasien_model -> get_pasien_by_rs ($result['email_rs'], 1);
            $data_approve['data_pendonor_approve'] = $this -> detail_caridonor_model -> find_donor_setuju();             
            
            $this -> load -> view ('bloodbank/home', array_merge($data_approve, $data, $data_butuh, $data_bloodbank ));
        }
    }
}

?>
