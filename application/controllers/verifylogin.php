<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('User_model','',TRUE);
  }

  function index()
  {
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
	
    if($this->form_validation->run() == FALSE)
    {
      $this->load->view('login_form');
    }
    else
    {
      redirect('home', 'refresh');
    }
    
  }
  
  function check_database($password)
  {

    $username = $this->input->post('username');
    $result = $this->User_model->login($username, $password);

    if($result==1)
    {
      $this->form_validation->set_message('check_database', 'Error, Usuario invalido');
      return false;

    }elseif($result==2)
    {
      $this->form_validation->set_message('check_database', 'Error, Contraseña Invalida');
      return false;

    }elseif($result==3)
    {
      $this->form_validation->set_message('check_database', 'Error, Usuario Bloqueado');
      return false;

    }else{

      $sess_array = array();
      foreach($result as $row)
      {
        $sess_array = array(
          'user_id' => $row->user_id,
          'user_name' => $row->user_fullname,
          'user_level' => $row->user_level,
          'user_email' => $row->user_email,
          'user_id_empresa' => $row->id_empresa
        );
        $this->session->set_userdata('logged_in', $sess_array);
      }
      return TRUE;
    }
  }


}
?>