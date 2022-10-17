<?php

class User_model {
    private $table ='users';
    private $db;

    private $nama ='pan';
    public function getUser() {
        return $this->nama;
    }

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllUser(){
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->resultAll();
    }

    public function getUserById($id) {
        $this->db->query("SELECT * FROM {$this->table} WHERE
        id=:id");
        $this->db->bind('id', $id);
        return $this->db->resultSingle();
    }
    public function addUser ($data = []) {
        $this->db->query("INSERT INTO {$this->table} (email, username, first_name, last_name, password) VALUES (:email, :username, :first_name, :last_name, :password)");
    
        foreach ($data as $column => $value) {
            $this->db->bind(":$column", $value);
        }

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getUserByUsername($username)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE username = :username");

        $this->db->bind(':username', $username);

        return $this->db->resultSingle();  
    }
}
