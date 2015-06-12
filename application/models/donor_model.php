<?php

class Donor_model extends CI_Model{
    
    function insert ($data_user, $password){

        $this -> db -> select ('email');
        $this -> db -> from ('login');
        $this -> db -> where ('email', $data_user['email_pendonor'] );

        $query = $this -> db -> get();

        if ($query -> num_rows() > 0){
            return false;
        }
        else {
            $this -> load -> database();
            $data_login = array (
                'email' => $data_user['email_pendonor'],
                'password' => md5($password),
                'cat_id' => 1
            );
            $this -> db -> insert ('login', $data_login);
            $this -> db -> insert ('donor', $data_user);
            return true;
        }                                    
    }   
    
    function get_donor_data($id){
        $this -> db -> select ('*');
        $this -> db -> from ('donor');
        $this -> db -> where ('email_pendonor', $id);
        
        $query = $this -> db -> get();
        return $query -> result();
    }
    
    function find_match_blood ($darah) {
        $this -> db -> select ('*');
        $this -> db -> from ('donor');
        $this -> db -> where ('darah_pendonor' , $darah);
        
        $query = $this -> db -> get ();
        return $query -> result();
    }
    
    function update_available_donor ($start, $end){
    
        $session_data = $this->session->userdata('logged_in');
        
        $this -> db -> set ('availdays_start', $start);
        $this -> db -> set ('availdays_end', $end);
        $this -> db -> where('email_pendonor', $session_data['email']);
        return $this -> db -> update('donor'); 
    }

    function find_match( $data_pasien ){
        // match darah dan available
        // temukan darah dan available nya 
        foreach ($data_pasien as $val){
            $darah =  $val -> darah_pasien;  
            $tanggal =  $val -> tgl_butuhdarah;
            $rhesus = $val -> rhesus_pasien;
        }
        $this -> db -> select('*');
        $this -> db -> from ('donor');
        $this -> db -> where ('darah_pendonor' , $darah);
        $this -> db -> where ('availdays_start <=', $tanggal);
        $this -> db -> where ('availdays_end >=', $tanggal);
        $this -> db -> where ('rhesus_pendonor', $rhesus);
        $this -> db -> where ('berat_pendonor >=', 45);
        
        $query = $this -> db -> get ();
        if ($query -> num_rows > 0){
             return $query -> result();
        }
        else {
            return 0;
        }
    }
    
    function update_profil($alamat, $telepon, $berat){
        $session_data = $this->session->userdata('logged_in');
        
        $this -> db -> set ('alamat_pendonor', $alamat);
        $this -> db -> set ('telepon_pendonor', $telepon);
        $this -> db -> set ('berat_pendonor', $berat);
        $this -> db -> where('email_pendonor', $session_data['email']);        
        return $this -> db -> update('donor'); 
    }
    
    function update_terakhir_donor ($id){
        $datestring = "%m/%d/%Y";
        $time = time();
        
        $dateNow = mdate($datestring, $time);
        $dateNowInt = strtotime($dateNow);        
        $this -> db -> set ('terakhir_donor', $dateNowInt);
        $this -> db -> where ('email_pendonor', $id);
        $this -> db -> update ('donor');        
        return true;
    }
}

?>
