<?php
class User
{

    private $db;

    public function __construct()
    {
        $this->db = new MySQLHandler('users');
    }

    public static function get_all_users()
    {
        return (new self)->db->get_all_records();
    }

    public function get_user_by_id($id)
    {
        return $this->db->get_record_by_id($id);
    }

    public function create_user($data)
    {
        $keys = ['user_name', 'user_email', 'user_mobile_number', 'user_username', 'user_password', 'subscription_date', 'group_id'];
        $user_details = array_combine($keys, $data);
        return $this->db->save($user_details);
    }

    public function update_user($id, $data)
    {
        $keys = ['user_name', 'user_email', 'user_mobile_number', 'user_username', 'user_password', 'group_id'];
        $user_details = array_combine($keys, $data);
        return $this->db->update($user_details, $id);
    }

    public function delete_user($id)
    {
        $sql = "SELECT * FROM `Articles` WHERE user_id = '". $id . "'";
        if(!($this->db->get_records_by_any_sql($sql))){
            return $this->db->soft_delete($id);
        }
        
    }

    public function restore_user($id)
    {
        return $this->db->restore($id);
    }

    public function check_id_existence($id)
    {
        return $this->db->checkIdExistence($id);
    }

    public static function get_users_by_any_sql($sql)
    {
        return (new self)->db->get_records_by_any_sql($sql);
    }

    public static function update_user_remember_token($email, $token = NULL)
    {
        $sql = "UPDATE users SET remember_me =NULL WHERE user_email = '$email'";
        if ($token != NULL) {
            $sql = "UPDATE users SET remember_me ='$token' WHERE user_email = '$email'";
        }
       
        return (new self)->db->update_single_field_by_any_sql($sql);
    }

    public static function get_email_by_any_sql($sql)
    {
        return (new self)->db->get_records_by_any_sql($sql);
    }
  
}