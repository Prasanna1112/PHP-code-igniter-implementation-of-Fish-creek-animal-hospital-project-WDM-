<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribe extends CI_Controller {

   /**
    * Index Page for this controller.
    *
    * Maps to the following URL
    * http://example.com/index.php/welcome
    * - or -
    * http://example.com/index.php/welcome/index
    * - or -
    * Since this controller is set as the default controller in
    * config/routes.php, it's displayed at http://example.com/
    *
    * So any other public methods not prefixed with an underscore will
    * map to /index.php/welcome/<method_name>
    * @see https://codeigniter.com/user_guide/general/urls.html
    */
   public function index()
   {
       $this->load->view('index');
   }


    public function subscribe_view()
    {
           $this->load->model('Subscribe_Model');
           $values['services']=$this->Subscribe_Model->getServiceValues();
           $values['pets']=$this->Subscribe_Model->getPetValues();
           $this->load->view('template/header');
           $this->load->view('contents/Subscribe_View',$values);
           $this->load->view('template/footer');
    }

    /*public function password_check($str)
        {
           if (preg_match('#[0-9]#', $str) && preg_match('#[a-z]#', $str) && preg_match('#[A-Z]#', $str)) {
             return TRUE;
           }
           return FALSE;
    }*/

    public function validation()
        {
              $this->load->helper(array('form', 'url'));
              $this->load->helper('security');
              $this->load->library('form_validation');
              $this->form_validation->set_rules('clientname', 'Name', 'required');
              $this->form_validation->set_rules('add', 'Address', 'required');
              $this->form_validation->set_rules('mail', 'Email', 'required|valid_email');
              $this->form_validation->set_rules('ph', 'Phone number', 'required|regex_match[/^[0-9]{10}$/]');
              $this->form_validation->set_rules('pswd', 'Password', 'trim|required|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,16}$/]');


                if ($this->form_validation->run() == FALSE)
                {
                    $this->load->model("Subscribe_Model");  
                    $values['services']=$this->Subscribe_Model->getServiceValues();
                    $values['pets']=$this->Subscribe_Model->getPetValues();
                    $this->load->view('template/header');
                    $this->load->view('contents/Subscribe_View',$values);
                    $this->load->view('template/footer');

                }
                else
                {

                  if($this->input->post("submit_button")){

                    $client_fname = $_POST['clientname'];
                    $client_add = $_POST['add'];
                    $client_email = $_POST['mail'];
                    $client_ph = $_POST['ph'];
                    $client_pwd = $_POST['pswd'];
                    $service_name = $_POST['service_name'];
                    $pet_name = $_POST['pet_name'];
                    $this->load->model('Subscribe_Model');
                    
                    $this->Subscribe_Model->postSubscriptionData($client_fname,$client_add,$client_email,$client_ph,$client_pwd,$service_name,$pet_name);

                    redirect(base_url() . "Home/home_view");
                    }
                }
      }
}
?>