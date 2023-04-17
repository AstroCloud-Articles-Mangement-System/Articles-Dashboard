<?php
class article{
    private $db;

    public function __construct()
    {
        $this->db = new MySQLHandler('articles');
    }
    public function get_all_articles()
    {
        return $this->db->get_all_records();
    }
    public function get_article_by_id($id)
    {
        return $this->db->get_record_by_id($id);
    }
    public function create_article($data)
    {
        $keys = ['user_name', 'user_email', 'user_mobile_number', 'user_username', 'user_password', 'subscription_date', 'group_id'];
        $user_details = array_combine($keys, $data);
        return $this->db->save($user_details);
    }
    public function get_article_publisher($id){
        return $this->get_article_by_id($id)[0]['user_id'];
    }

    public function check_id_existence($id)
    {
        return $this->db->checkIdExistence($id);
    }
}






?>