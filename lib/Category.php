<?php 
    class Category {
        private $db;

        public function __construct() {
            $this->db = new DatabaseTable;
        }

        public function getAll() {
            $this->db->query("SELECT * FROM tblcategories");
            return $this->db->getAll();
        }

        public function getCategoryName($id) {
            $this->db->query("SELECT * FROM tblcategories WHERE id = :id");
            $this->db->bind(":id",$id);
            return $this->db->getOne();
        }
    }