<?php

class Subscribe_Model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }

    function getServiceValues(){
		$query = $this->db->query('select * from service');
		        if($query->num_rows()>0){
		            return $query->result();
		        }
		        
		        else{
		            return NULL;
		        }
    }

    function getPetValues(){
    	$query = $this->db->query('select * from pet');
		        if($query->num_rows()>0){
		            return $query->result();
		        }
		        
		        else{
		            return NULL;
		        }

    }

     function postSubscriptionData($client_fname,$client_add,$client_email,$client_ph,$client_pwd,$service_name,$pet_name){
                               
            //Get service and pet ids
            $this->db->select('serviceid');
            $this->db->where('servicename', $service_name);
            $query = $this->db->get('service');
            if ($query->num_rows() > 0) {
                foreach ($query->result_array() as $row)
                {
                        $post_service_id = $row['serviceid'];
                }
            }
                           
            $this->db->select('petid');
            $this->db->where('petname', $pet_name);
            $query = $this->db->get('pet');
            if ($query->num_rows() > 0) {
                foreach ($query->result_array() as $row)
                {
                        $post_pet_id = $row['petid'];
                }
            }
                    
            $this->db->select('clientid');
			$this->db->where('email', $client_email);
			$query = $this->db->get('client');
			if ($query->num_rows() > 0) {
			    foreach ($query->result_array() as $row)
			    {
			        $post_client_id = $row['clientid'];
			    }
            $this->subscribe_values($post_client_id,$post_service_id,$post_pet_id);                                       
		}
		else
		{
                                                       
        $post_client_pwd = md5($client_pwd);
        $post_client_data = array('name'=>$client_fname,
            'address'=>$client_add,                   
            'email'=>$client_email,
            'phone'=>$client_ph,
            'password'=>$post_client_pwd
        );
        $query = $this->db->insert('client',$post_client_data);
        //data inserted in client table
                                                       
            $this->db->select('clientid');
            $this->db->where('email', $client_email);
            $check_query = $this->db->get('client');
            if ($check_query->num_rows() > 0) {
                foreach ($check_query->result_array() as $row)
                {
                        $post_client_id = $row['clientid'];
                }
            $this->subscribe_values($post_client_id,$post_service_id,$post_pet_id);
}
                        }


       
        }
       
        function subscribe_values($clientid,$serviceid,$petid)
        {
             $subscribe_values = array('clientid'=>$clientid,
            'serviceid'=>$serviceid,
            'petid'=>$petid,
            'date'=>date('Y-m-d'));
                   $main_query = $this->db->insert('subscription',$subscribe_values);
        }    

        
}
?>