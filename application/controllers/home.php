<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {

public function __construct(){
        
    	parent::__construct();
        $this->load->helper('url_helper');        
        $this->output->enable_profiler(false);
    }
    
    function index()
 {
 
   if($this->session->userdata('logged_in'))
   {
        $this->load->view('includes/header');
        $this->load->view('home/home');
        $this->load->view('includes/footer');
   }
   else
   {

     redirect('verifylogin', 'refresh');
   }
 }
 
 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('verifylogin', 'refresh');
 }

}
