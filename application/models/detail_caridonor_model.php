<?php

class Detail_caridonor_model extends CI_Model{
    
    function insert ($id, $email){
        
        
        $this->db->query('insert into detail_caridonor (id_caridonor, email_pendonor, setuju_donor) values ('.$id.',\''.$email.'\',0)');

        /*        
        $this -> load -> database();
        $data = array (
            'id_caridonor' => $id,
            'email_pendonor' => $email,
            'setuju_donor' => 0
        );
        $this -> db -> insert ('detail_caridonor', $data);
        return $this -> db -> insert_id();*/
        return true;
    }
    
    function update_setuju (){        
        $this -> db -> set ('setuju_donor', 1);
        $this -> db -> where('id_detail_caridonor', $this->input-> post('hidden_id_detail_caridonor'));        
        $this -> db -> update('detail_caridonor');         
        return true;
    }
    
    function find_donor_setuju (){
        $session_data = $this->session->userdata('logged_in');
        
        $query = $this -> db -> query('
            select  cari_donor.id_caridonor, detail_caridonor.email_pendonor, donor.nama_pendonor, pasien.nama_pasien, detail_caridonor.setuju_donor
            from detail_caridonor , bloodbank , cari_donor, donor, pasien
            where            
            detail_caridonor.id_caridonor = cari_donor.id_caridonor
            and
            detail_caridonor.sudah_donor = 0
            and
            bloodbank.email_rs = cari_donor.email_rs
            and 
            cari_donor.email_rs = \''.$session_data['email'].'\'
            and
            donor.email_pendonor = detail_caridonor.email_pendonor
            and 
            pasien.id_pasien = cari_donor.id_pasien order by cari_donor.id_caridonor DESC'); 
                
        return $query->result();
        
//        detail_caridonor.setuju_donor = 1
    }
    
    function tandai_sudah_donor ($id, $email){
        $this -> db -> set ('sudah_donor' , 1);
        $this -> db -> where ('id_caridonor', $id);
        $this -> db -> where ('email_pendonor', $email);
        $this -> db -> update ('detail_caridonor');
        
        redirect('home', 'refresh');
    }
    
}

?>
