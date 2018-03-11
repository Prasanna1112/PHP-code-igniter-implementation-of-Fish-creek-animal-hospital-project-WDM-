<?php

class Contact_Model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }

    function postData($values){
    	$this->db->insert("contact", $values);

    }
}
?>