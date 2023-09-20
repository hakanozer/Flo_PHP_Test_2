<?php

class Database
{
    private $_conn = null;
    public function getConnection() {
        if ( !is_null($this->_conn) ) {
            return $this->_conn;
        }
        $this->_conn = false;
        try {
            $this->_conn = new PDO('mysql:host=127.0.0.1;port=8889;dbname=php_test', 'root', 'root');
        }catch (PDOException $ex) {
            print "Errrorx ". $ex->getMessage();
        }
        return $this->_conn;
    }
}