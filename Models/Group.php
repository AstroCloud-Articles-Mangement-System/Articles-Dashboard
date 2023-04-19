<?php
class Group 
{
    private $db;

    public function __construct()
    {
        $this->db = new MySQLHandler('groups');
    }

    public static function get_all_groups()
    {
        return (new self)->db->get_all_records();
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

    public function update_user($id, $data)
    {
        $keys = ['group_name', 'group_description'];
        $group_details = array_combine($keys, $data);
        return $this->db->update($group_details, $id);
    }

    public function delete_group($id)
    {
        return $this->db->soft_delete($id);
    }

    public function restore_group($id)
    {
        return $this->db->restore($id);
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

    public function filter_groups($search)
    {
        $where = " `group_name` like '" . $search. "%' or `group_description` like '%" . $search . "%' ";
        return $this->db->filter($search, $where);
    }  
}
    