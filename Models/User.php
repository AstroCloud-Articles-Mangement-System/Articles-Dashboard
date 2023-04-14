<?php
class User
{

    private $db;

    public function __construct()
    {
        $this->db = new MySQLHandler('users');
    }

    public function get_users()
    {
        return $this->db->get_all_records();
    }

    public function get_user_by_id($id)
    {
        return $this->db->get_record_by_id($id);
    }

    public function create_user($data)
    {
        $keys = ['id', 'user_name', 'user_email', 'user_mobile_number', 'user_username', 'user_password', 'subscription_date', 'group_id'];
        foreach ($data as $user) {
            $user_details = array_combine($keys, $user);
        }
        return $this->db->save($user_details);
    }

    public function update_user($id, $data)
    {
        $keys = ['id', 'user_name', 'user_email', 'user_mobile_number', 'user_username', 'user_password', 'subscription_date', 'group_id'];
        foreach ($data as $user) {
            $user_details = array_combine($keys, $user);
        }
        return $this->db->update($user_details, $id);
    }

    public function delete_user($id)
    {
        return $this->db->delete($id);
    }
}
