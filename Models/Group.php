<?php
class Group
{

    private $db;

    public function __construct()
    {
        $this->db = new MySQLHandler('groups');
    }

    public function get_all_groups()
    {
        return $this->db->get_all_records();
    }

    public function get_group_by_id($id)
    {
        return $this->db->get_record_by_id($id);
    }

    public function update_user($id, $data)
    {
        $keys = ['group_name', 'group_description'];
        $group_details = array_combine($keys, $data);
        return $this->db->update($group_details, $id);
    }
    
    public function check_id_existence($id)
    {
        return $this->db->checkIdExistence($id);
    }
}