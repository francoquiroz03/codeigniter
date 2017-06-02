<?php
 
class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
         function login($username, $password)
    {   

        $sql = "SELECT *
                FROM ci_users 
                WHERE user_name = ?";

        $query =  $this->db->query($sql, $username); 

        if($query -> num_rows() > 0)
        {
            $result = $query->row_array();

            if($result['user_banned']!=0)
            {
                return 3;
            }

            if ($this->bcrypt->check_password($password, $result['user_salt'])) {
            
                return $query->result();

            } else {

                return 2;
            }
        }
        else
        {   
            return 1;
        }

    }

    function recovery($username, $email)
    {   

        $sql = "SELECT *
                FROM ci_users 
                WHERE 
                user_name = ? AND
                user_email = ?";

        $query =  $this->db->query($sql, array($username,$email)); 
        
        if($query -> num_rows() > 0)
        {
            $result = $query->row_array();

            if($result['user_banned']!=0)
            {
                return 2;
            }else{

                return 3;
            }
        }
        else
        {   
            return 1;
        }
    }

    function codigo($email, $codigo)
    {
        $data = array(
                'passwd_recovery_code' => $codigo,
                'passwd_recovery_date' => date("Y-m-d H:i:s")
                );

        $this->db->where("user_email='".$email."'");
        $this->db->update('ci_users', $data); 

    }

    function recovery_code($email, $codigo)
    {
        $sql = "SELECT *
                FROM ci_users 
                WHERE 
                user_email = ? AND
                passwd_recovery_code = ?";

        $query =  $this->db->query($sql, array($email,$codigo)); 
        
        if($query -> num_rows() > 0)
        {
            $result = $query->row_array();

            if($result['user_banned']!=0)
            {
                return 2;
            }else{

                return 3;
            }
        }
        else
        {   
            return 1;
        }
    }

    function password_change($email, $password)
    {
        $salt = $this->bcrypt->hash_password($password);
        $data = array(
                'user_pass' => $password,
                'user_salt' => $salt,
                'passwd_recovery_code' => ''
                );

        $this->db->where("user_email='".$email."'");
        $this->db->update('ci_users', $data); 

    }
    /*
     * Get user by user_id
     */
    function get_user($user_id)
    {
        return $this->db->get_where('ci_users',array('user_id'=>$user_id))->row_array();
    }
    
    /*
     * Get all users
     */
    function get_all_users()
    {
        return $this->db->get('ci_users')->result_array();
    }
    
    /*
     * function to add new user
     */
    function add_user($params)
    {
        $this->db->insert('ci_users',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update user
     */
    function update_user($user_id,$params)
    {
        $this->db->where('user_id',$user_id);
        $response = $this->db->update('ci_users',$params);
        if($response)
        {
            return "user updated successfully";
        }
        else
        {
            return "Error occuring while updating user";
        }
    }
    
    /*
     * function to delete user
     */
    function delete_user($user_id)
    {
        $response = $this->db->delete('ci_users',array('user_id'=>$user_id));
        if($response)
        {
            return "user deleted successfully";
        }
        else
        {
            return "Error occuring while deleting user";
        }
    }
}
