<?php
class Article
{
    private $db;

    public function __construct()
    {
        $this->db = new MySQLHandler('articles');
    }
    public static function get_all_articles()
    {
        return (new self)->db->get_all_records();
    }
    public function get_article_by_id($id)
    {
        return $this->db->get_record_by_id($id);
    }
    public function create_article($data)
    {
        $keys = ['article_title', 'article_summary', 'article_image', 'article_content', 'publishing_date', 'user_id'];
        $article_details = array_combine($keys, $data);
        return $this->db->save($article_details);
    }
    public function get_article_publisher($id)
    {
        return $this->get_article_by_id($id)[0]['user_id'];
    }

    public function check_id_existence($id)
    {
        return $this->db->checkIdExistence($id);
    }

    public function delete_article($id)
    {
        return $this->db->delete($id);
    }
    public static function get_article_by_any_sql($sql)
    {
        return (new self)->db->get_records_by_any_sql($sql);
    }
}
