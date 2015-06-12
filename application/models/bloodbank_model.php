<?php

class Bloodbank_model extends CI_Model{
    
    function insert ($data_user, $password){

        $this -> db -> select ('email');
        $this -> db -> from ('login');
        $this -> db -> where ('email', $data_user['email_rs'] );

        $query = $this -> db -> get();

        if ($query -> num_rows() > 0){
            return false;
        }
        else {
            $this -> load -> database();
            $data_login = array (
                'email' => $data_user['email_rs'],
                'password' => md5($password),
                'cat_id' => 2
                
            );
            $this -> db -> insert ('login', $data_login);
            $this -> db -> insert ('bloodbank', $data_user);
            return true;
        }                                    
    }
    
    
    function get_all_bloodbank(){
        return $this -> db -> get('bloodbank') -> result();       
    }
    
    function get_bloodbank_data ($id){
        $this -> db -> select ('*');
        $this -> db -> from ('bloodbank');
        $this -> db -> where ('email_rs', $id);
        
        $query = $this -> db -> get();
        return $query -> row_array();
    }
    
    function get_pasien_by_bloodbank ($email_pendonor, $limit, $start){
        $query = $this -> db -> query('
        select detail_caridonor.id_detail_caridonor, pasien.nama_pasien, pasien.tgl_butuhdarah, pasien.penyakit_pasien, bloodbank.nama_rs, bloodbank.alamat_rs from
        detail_caridonor, cari_donor, bloodbank, pasien
        where
        detail_caridonor.email_pendonor = \''.$email_pendonor.'\'
        and
        detail_caridonor.setuju_donor = 0
        and
        detail_caridonor.id_caridonor = cari_donor.id_caridonor
        and
        cari_donor.email_rs = bloodbank.email_rs
        and
        cari_donor.id_pasien = pasien.id_pasien
        order by pasien.tgl_butuhdarah ASC
        LIMIT '.$start.', '.$limit.'
        '); 
        return $query -> result();
    }
    
    function count_row_pasien_by_blood($email_pendonor){
        $query = $this -> db -> query('
        select COUNT(*) as jml
        from
        detail_caridonor, cari_donor, bloodbank, pasien
        where
        detail_caridonor.email_pendonor = \''.$email_pendonor.'\'
        and
        detail_caridonor.id_caridonor = cari_donor.id_caridonor
        and
        cari_donor.email_rs = bloodbank.email_rs
        and
        cari_donor.id_pasien = pasien.id_pasien
        order by pasien.tgl_butuhdarah ASC
        ');

        return $query -> result();
    }
}
?>
