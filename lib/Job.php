<?php
class Job {
    private $db;

    public function __construct() {
        $this->db = new DatabaseTable;
    }

    public function getAll() {
        $this->db->query("SELECT jobs.*,categories.name AS cname FROM tbljobs jobs INNER JOIN tblcategories categories ON jobs.category_id = categories.id ORDER BY jobs.created_at DESC;");
        return $this->db->getAll();
    }

    
    public function findOne($id) {
        $this->db->query("SELECT jobs.*,categories.name AS cname FROM tbljobs jobs INNER JOIN tblcategories categories ON jobs.category_id = categories.id WHERE jobs.id = :id ORDER BY jobs.created_at DESC;");
        $this->db->bind(":id",$id);
        return $this->db->getOne();
    }

    public function getAllByCategory($id) {
        $this->db->query("SELECT jobs.*,categories.name AS cname FROM tbljobs jobs INNER JOIN tblcategories categories ON jobs.category_id = categories.id WHERE jobs.category_id = $id ORDER BY jobs.created_at DESC;");
        return $this->db->getAll();
    }

    public function create($data) {
        $sql = "INSERT INTO tbljobs(category_id,company,job_title,description,salary,location,contact_user,contact_email)
                    VALUES(:category_id,:company,:job_title,:description,:salary,:location,:contact_user,:contact_email);";
        $this->db->query($sql);
        $this->db->bind(':category_id',$data['category_id']);
        $this->db->bind(':job_title',$data['job_title']);
        $this->db->bind(':company',$data['company']);
        $this->db->bind(':description',$data['description']);
        $this->db->bind(':location',$data['location']);
        $this->db->bind(':salary',$data['salary']);
        $this->db->bind(':contact_user',$data['contact_user']);
        $this->db->bind(':contact_email',$data['contact_email']);
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM tbljobs WHERE id = $id";
        $this->db->query($sql);
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data) {
        $sql = "UPDATE tbljobs SET 
        category_id = :category_id,
        job_title = :job_title,
        company = :company,
        description = :description,
        location = :location,
        salary = :salary,
        contact_user = :contact_user,
        contact_email = :contact_email
        WHERE id = $id
        ";

        $this->db->query($sql);
        $this->db->bind(':category_id',$data['category_id']);
        $this->db->bind(':job_title',$data['job_title']);
        $this->db->bind(':company',$data['company']);
        $this->db->bind(':description',$data['description']);
        $this->db->bind(':location',$data['location']);
        $this->db->bind(':salary',$data['salary']);
        $this->db->bind(':contact_user',$data['contact_user']);
        $this->db->bind(':contact_email',$data['contact_email']);
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}