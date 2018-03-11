<?php

class Services_Model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }
    
    function getServices(){
        $query = $this->db->query('select * from service');
        if($query->num_rows()>0){
            return $query->result();
        }
        
        else{
            return NULL;
        }
    }
}
?>