<?php
class MySQLHandler implements DbHandler
{
    private $_db_handler;
    private $_table;
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
            die("Something went wrong!");
        }
    }

    public function disconnect()
    {
        if ($this->_db_handler) {
            mysqli_close($this->_db_handler);
        }
    }

    private function getResults($sql)
    {
        if (__Debug__Mode__ === 1) {
            echo "<h5>Sent Query:</h5>" . $sql . "<br/><br/>";
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

    public function get_data($fields = array(), $start = 0)
    {
        $table = $this->_table;
        if (empty($fields)) {
            $sql = "SELECT * FROM `$table`";
        } else {
            $sql = "select";
            foreach ($fields as $field) {
                $sql .= "`$field` ,";
            }
            $sql .= "form `$table`";
            $sql = str_replace(", from", "from", $sql);
        }
        $sql .= " limit $start," . __RECORDS_PER_PAGE__;
        return $this->getResults($sql);
    }



    public function get_record_by_id($id, $primary_key = "id")
    {
        $table = $this->_table;
        $sql = "SELECT * FROM `$table` WHERE `$primary_key`=$id";
        return $this->getResults($sql);
    }
/*
    public function save_or_update($fields, $record)
    {
        $sql = "INSERT INTO" . $this->_table . "VALUES(";
        foreach ($record as $value) {
            $sql .= "?,";
        }
    }*/

    public function save_or_update($fields, $record)
    {
        $sql = "INSERT INTO `" . $this->_table . "` (";
        foreach ($fields as $field) {
            $sql .= "`$field`,";
        }
        $sql = rtrim($sql, ",") . ") VALUES (";
        foreach ($record as $value) {
            $sql .= "'" . mysqli_real_escape_string($this->_db_handler, $value) . "',";
        }
        $sql = rtrim($sql, ",") . ")";
        if (mysqli_query($this->_db_handler, $sql)) {
            return mysqli_insert_id($this->_db_handler);
        } else {
            return false;
        }
    }
    
       

}