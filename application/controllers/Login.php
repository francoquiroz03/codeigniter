<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
  	{
    parent::__construct();
    $this->load->model('user_model','',TRUE);
    $this->output->enable_profiler(false);
  	}

	public function index()
	{
		$this->session->unset_userdata('logged_in');
   		session_destroy();
		$this->load->helper('form');
		$this->load->view('login_form');
	}

	public function recovery()
	{
		$this->load->view('recovery/recovery');
	}

	public function email_recovery()
	{
	    $username = $this->input->post('username');
	    $email = $this->input->post('email');

	    if($username!="" AND $email!="")
	    {
		    $result_email = $this->user_model->recovery($username, $email);

		    if($result_email==1)
		    {
		      $errors='Error, Usuario o Email invalidos';
		      $data['errors']=$errors;
		      $this->load->view('recovery/recovery',$data);

		    }elseif($result_email==2)
		    {
		      $errors='Error, Usuario Bloqueado';
		      $data['errors']=$errors;
		      $this->load->view('recovery/recovery',$data);

		    }elseif($result_email==3)
		    {
		    	$this->session->set_flashdata('email',  $email);
				redirect('email');
		    }
	    }else
	    {
	    	redirect('recovery');
	    }
  	}

	public function email()
	{
		if($this->session->flashdata('email'))
		{

		$email = $this->session->flashdata('email');

		$length = 5;
    	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    	$codigo = substr( str_shuffle( $chars ), 0, $length );

		$this->load->library('mail');

		$mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth   = true; 
        $mail->SMTPSecure = "ssl";
        $mail->Host       = "smtp.gmail.com";
        $mail->Port       = 465;
        $mail->Username   = "francoquiroz03@gmail.com";// user email
        $mail->Password   = "p3ano3nox2";            // password in GMail
        $mail->SetFrom('recovery@empresa.com', 'Empresa');//Quien envia
        $mail->Subject    = utf8_decode("Correo Codigo Recuperación Contraseña");//Titulo
        //Mensaje
        $mail->MsgHTML("Estimado(a),<br> Junto con saludar, confirmamos el envió de su codigo de recuperación de su contraseña realizada en la página<br>
                <br>
                Para continuar con el Proceso de recuperación, es indispensable que ingrese ese codigo a nuestro link ".base_url()."recovery_password
                <br><br>
                Su Codigo es: ".$codigo."
                <br><br><br>
                Sin otro particular, le saluda atentamente,<br>
                <b>Empresa</b><br />");

        $mail->AddAddress($email, "");

        $mail->IsHTML(true);
    
        if(!$mail->Send()) {
            $data["message"] = "Error: " . $mail->ErrorInfo;
            $data["codigo"] = 1;
        } else {
            $data["message"] = "Enviado Correctamente!";
            $data["codigo"] = 2;

            $this->user_model->codigo($email, $codigo);
        }

       	$this->load->view('recovery/recovery_email',$data);

		}else
		{
			redirect('recovery');
		}
	}

	public function code()
	{
		$this->load->view('recovery/recovery_email');
	}

	public function recovery_code()
	{
		$email = $this->input->post('email');
		$codigo = $this->input->post('codigo');

		if($email!="" AND $codigo!="")
		{
			$result = $this->user_model->recovery_code($email, $codigo);

			if($result==1)
		    {
		      $errors='Error, Email o Codigo invalido';
		      $data['errors']=$errors;
		      $this->load->view('recovery/recovery_email',$data);

		    }elseif($result==2)
		    {
		      $errors='Error, Usuario Bloqueado';
		      $data['errors']=$errors;
		      $this->load->view('recovery/recovery_email',$data);

		    }elseif($result==3)
		    {
		    	$data['email'] = $email;
				$this->load->view('recovery/recovery_passwd',$data);
		    }

		}else
		{
			redirect('recovery');
		}
	}

	public function passwd_change()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		if($email!="" AND $password!="")
		{

			$result = $this->user_model->password_change($email, $password);

			$this->load->view('recovery/recovery_ok');

		}else
		{
			redirect('recovery_password');
		}

	}


}
