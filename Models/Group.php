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
    public function create_group($data)
    {
        $keys = ['group_name', 'group_description'];
        $group_details = array_combine($keys, $data);
        return $this->db->save($group_details);
    }

}
