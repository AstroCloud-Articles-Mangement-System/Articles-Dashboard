<?php
interface DbHandler {
    public function connect();
    public function disconnect(); 
    public function get_all_records_paginated($fields = array(), $start = 0);
    public function get_all_records();
    public function get_record_by_id($id, $primary_key = "id"); 
    public function get_number_of_records();
    public function save($new_values = array());
    public function update($edited_values, $id);
    public function delete($id, $primary_key = "id");
    public function filter($search, $where);
    public function checkIdExistence($column_value);
    public function get_records_by_any_sql($sql);
    
}