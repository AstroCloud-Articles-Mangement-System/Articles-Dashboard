<?php

class MySQLHandler implements DbHandler
{

    private $_db_handler;
    private $_table;
    private $_primary_key = "id";

    public function __construct($table)
    {
        $this->_table = $table;
        $this->connect();
    }

    public function connect()
    {

        try {
            $handler = mysqli_connect(__HOST__, __USER__, __PASS__, __DB__);
            if ($handler) {
                $this->_db_handler = $handler;
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die("Something Went Wrong, Please Come Back Later");
        }
    }

    public function disconnect()
    {

        if ($this->_db_handler)
            mysqli_close($this->_db_handler);
    }

    public function get_all_records_paginated($fields = array(), $start = 0)
    {

        $table = $this->_table;
        if (empty($fields)) {
            $sql = "select * from `$table`";
        } else {
            $sql = "select ";
            foreach ($fields as $f) {
                $sql .= " `$f`, ";
            }
            $sql .= "from  `$table` ";
            $sql = str_replace(", from", "from", $sql);
        }
        $sql .= "limit $start," . __RECORDS_PER_PAGE__;
        return $this->get_results($sql);
    }

    public function get_all_records()
    {
        $table = $this->_table;
        $sql = "select * from `$table`";
        return $this->get_results($sql);
    }

    public function get_record_by_id($id, $primary_key = "id")
    {

        $table = $this->_table;
        $sql = "select * from `$table` where `$primary_key` = $id ";

        return $this->get_results($sql);
    }

    public function get_number_of_records()
    {

        $table = $this->_table;
        $sql = "SELECT COUNT(*) FROM `$table`";

        return ($this->get_results($sql))[0]['count(*)'];
    }

    private function get_results($sql)
    {

        if (__Debug__Mode__ === 1) {
            echo "<h5>Sent Query: $sql</h5>";
        }
        $_handler_results = mysqli_query($this->_db_handler, $sql);
        $_arr_results = array();

        if ($_handler_results) {
            while ($row = mysqli_fetch_array($_handler_results, MYSQLI_ASSOC)) {
                $_arr_results[] = array_change_key_case($row);
            }
            return $_arr_results;
        } else {
            return false;
        }
    }

    public function save($new_values = array())
    {
        if (is_array($new_values)) {
            $table = $this->_table;
            $sql1 = "insert into `$table` (";
            $sql2 = " values (";
            foreach ($new_values as $key => $value) {
                $sql1 .= "`$key` ,";
                if (is_numeric($value))
                    $sql2 .= " $value ,";
                else
                    $sql2 .= " '" . $value . "' ,";
            }
            $sql1 = $sql1 . ") ";
            $sql2 = $sql2 . ") ";
            $sql1 = str_replace(",)", ")", $sql1);
            $sql2 = str_replace(",)", ")", $sql2);
            $sql = $sql1 . $sql2;


            if (mysqli_query($this->_db_handler, $sql)) {
                return true;
            } else {
                return false;
            }
            $this->debug($sql);
        }
    }

    public function update($edited_values, $id)
    {
        $table = $this->_table;
        $primary_key = $this->_primary_key;
        $sql = "update  `" . $table . "` set  ";
        foreach ($edited_values as $key => $value) {
            if ($key != $primary_key) {
                if (!is_numeric($value))
                    $sql .= " `$key` = '$value'  ,";
                else
                    $sql .= " `$key` = $value ,";
            }
        }

        $sql .= "where `" . $primary_key . "` = $id";
        $sql = str_replace(",where", "where", $sql);

        if (mysqli_query($this->_db_handler, $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id, $primary_key = "id")
    {
        $table = $this->_table;
        $sql = "delete  from `" . $table . "` where `" . $primary_key . "` = $id";
        $this->debug($sql);
        if (mysqli_query($this->_db_handler, $sql)) {
            $this->disconnect();
            return true;
        } else {
            $this->disconnect();
            return false;
        }
    }

    public function filter($search, $where)
    {
        $table = $this->_table;
        $sql = "select * from `$table` where $where";
        return $this->get_results($sql);
    }

    private function debug($sql)
    {
        if (__Debug__Mode__ === 1)
            echo "<h5>Sent Query: </h5>" . $sql . "<br/> <br/>";
    }
    public function checkIdExistence($column_value)
    {
        $table = $this->_table;
        $sql = "select * from `$table` where `id` like  '%" . $column_value . "%' ";
        if ($this->get_results($sql)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function get_records_by_any_sql($sql)
    {
        return ($this->get_results($sql));
    }
}