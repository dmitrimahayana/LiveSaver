<?php

class Pasien_model extends CI_Model {
    
    function insert ($data_pasien){        
        $this -> load -> database();
        $this -> db -> insert ('pasien', $data_pasien);
        return true;                        
    }    
    
    function get_all_pasien (){
        return $this -> db -> get('pasien') -> result();
    }
    
    function get_data_pasien( $id){
        $this -> db -> select ('*');
        $this -> db -> from ('pasien');
        $this -> db -> where ('id_pasien', $id);
        
        $query = $this -> db -> get();
        return $query -> result();
    }
    
    function get_pasien_by_rs ( $email_rs , $stat){
        $this -> db -> select ('*');
        $this -> db -> from ('pasien');
        $this -> db -> where ('email_rs', $email_rs);
        $this -> db -> where ('status_pasien', $stat);
        
        $query = $this -> db -> get();
        return $query -> result();
    }
        
    
    function change_status ($id){
        $this -> db -> set ('status_pasien', 1);
        $this -> db -> where ('id_pasien', $id);        
        $this -> db -> update ('pasien');
        return true;
    }
    
    function change_date($id, $val){
        echo $val."<br/>";
        echo $id;
        $this -> db -> set ('tgl_butuhdarah', $val);
        $this -> db -> where ('id_pasien', $id);
        $this -> db -> update ('pasien');
//        return true;
    }
}
    
 
?>
