<?php

class Cari_donor_model extends CI_Model {
    
    function insert ($email_rs, $pesan_sms, $id_pasien){
        $this -> load -> database();
        $data = array (
            'email_rs' => $email_rs,
            'pesan_sms' => $pesan_sms,
            'id_pasien' => $id_pasien
        );
        $this -> db -> insert ('cari_donor', $data);
        return $this -> db -> insert_id();
    }
    
    function get_max_id ($email){
        $query=$this->db->query('SELECT id_caridonor as max_id FROM cari_donor WHERE email_rs =\''.$email.'\' order by id_caridonor DESC limit 1'); 
        $row = $query->row_array();
        $max_id = $row['max_id'];  
        return $max_id;
    }
    
}

?>
