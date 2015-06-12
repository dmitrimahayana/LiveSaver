<?php

class User extends CI_Model{
    
    function login($username, $password){
        
        $this -> db -> select('email, password, cat_id');
        $this -> db -> from('login');
        $this -> db -> where('email', $username);
        $this -> db -> where('password', md5($password));
        $this -> db -> limit(1);
        
        $query = $this -> db -> get();
        
        if ($query -> num_rows() == 1 ){
            return $query -> result();            
        }
        else{
            return false;
        }                        
    }
    
   
    
}

?>
