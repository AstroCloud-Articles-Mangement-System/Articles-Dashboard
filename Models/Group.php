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

    public function delete_group($id)
    {
        return $this->db->delete($id);
    }
    public function check_id_existence($id)
    {
        return $this->db->checkIdExistence($id);
    }

    public function get_group_name($id)
    {
        return $this->get_group_by_id($id)[0]['group_name'];
    }

    public function Is_Admins_or_Editors_group($id)
    {
        if (in_array($this->get_group_name($id), ['Admins', 'Editors'])) {
            return true;
        } else {
            return false;
        }
        
    }
}
