<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

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


    public function contact_view()
    {
           $this->load->model('Contact_Model');
           $this->load->view('template/header');
           $this->load->view('contents/Contact_View');
    }

    public function post_values()
        {
              $this->load->helper(array('form', 'url'));
              $this->load->library('form_validation');
              $this->form_validation->set_rules('name', 'Name', 'required');
              $this->form_validation->set_rules('mail', 'Email', 'required|valid_email');
              $this->form_validation->set_rules('comm', 'Comments', 'required');

                if ($this->form_validation->run() && $this->input->post("submit_button"))
                {
                    $this->load->model("Contact_Model");  
                    $values = array(  
                        "name" => $this->input->post("name"),  
                        "email" => $this->input->post("mail"),
                        "comments" => $this->input->post("comm")
                    );

                    $this->Contact_Model->postData($values);
                    redirect(base_url() . "Home/home_view");
                }
                else
                {
                    $this->load->view('template/header');
                    $this->load->view('contents/Contact_View');

                }
        }
}
?>