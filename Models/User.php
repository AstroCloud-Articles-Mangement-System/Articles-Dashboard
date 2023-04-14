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
        return $this->db->get_data();
    }

    public function get_user_by_id($id)
    {
        return $this->db->get_record_by_id($id);
    }

    public function create_user($data)
    {
        $fields = array('username', 'email', 'password');
        return $this->db->save_or_update($fields, $data);
    }

    public function update_user($id, $data)
    {
        $fields = array('username', 'email', 'password');
        return $this->db->save_or_update($fields,$data);
    }

    public function delete_user($id)
    {
        return $this->db->delete($id, 'id');
    }
}