<?php
 
class Controller_user extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    /*
     * Adding a new user
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('id_empresa','Id Empresa','required');
		$this->form_validation->set_rules('user_fullname','User Fullname','required');
		$this->form_validation->set_rules('user_name','User Name','required');
		$this->form_validation->set_rules('user_email','User Email','required');
		$this->form_validation->set_rules('user_pass','User Pass','required');
		$this->form_validation->set_rules('user_level','User Level','required');
		
		if($this->form_validation->run())     
        {   
            $salt = $this->bcrypt->hash_password($this->input->post('user_pass'));
            $params = array(
				'user_level' => $this->input->post('user_level'),
				'id_empresa' => $this->input->post('id_empresa'),
				'user_pass' => $this->input->post('user_pass'),
				'user_fullname' => $this->input->post('user_fullname'),
				'user_name' => $this->input->post('user_name'),
				'user_email' => $this->input->post('user_email'),
                'user_salt' => $salt
            );
            
            $user_id = $this->User_model->add_user($params);
            redirect('controller_user/index');
        }
        else
        {
            $this->load->view('includes/header');    
            $this->load->view('user/add');
            $this->load->view('includes/footer');  
        }
    }  

    /*
     * Editing a user
     */
    function edit($user_id)
    {   
        // check if the user exists before trying to edit it
        $data['user'] = $this->User_model->get_user($user_id);
        
        if(isset($data['user']['user_id']))
        {
            $this->load->library('form_validation');

    		$this->form_validation->set_rules('id_empresa','Id Empresa','required');
            $this->form_validation->set_rules('user_fullname','User Fullname','required');
            $this->form_validation->set_rules('user_name','User Name','required');
            $this->form_validation->set_rules('user_email','User Email','required');
            $this->form_validation->set_rules('user_pass','User Pass','required');
            $this->form_validation->set_rules('user_level','User Level','required');
		
			if($this->form_validation->run())     
            {   
                $salt = $this->bcrypt->hash_password($this->input->post('user_pass'));
                $params = array(
					'user_level' => $this->input->post('user_level'),
					'id_empresa' => $this->input->post('id_empresa'),
					'user_pass' => $this->input->post('user_pass'),
					'user_fullname' => $this->input->post('user_fullname'),
					'user_name' => $this->input->post('user_name'),
					'user_email' => $this->input->post('user_email'),
                    'user_salt' => $salt
                );

                $this->User_model->update_user($user_id,$params);            
                redirect('controller_user/index');
            }
            else
            {

                $this->load->view('user/edit',$data);
            }
        }
        else
            show_error('El usuario no existe en la base de datos.');
    } 

    /*
     * Deleting user
     */
    function remove($user_id)
    {
        $user = $this->User_model->get_user($user_id);

        // check if the user exists before trying to delete it
        if(isset($user['user_id']))
        {
            $this->User_model->delete_user($user_id);
            redirect('controller_user/index');
        }
        else
            show_error('El usuario no existe en la Base de Datos.');
    }
    
}
