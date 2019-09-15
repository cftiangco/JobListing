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
        $this->db->query("SELECT jobs.id AS jid, jobs.*,jobs.contact_number AS company_contact,cat.name AS cname,u.*,u.id AS userId FROM tbljobs jobs
                            INNER JOIN tblcategories cat ON cat.id = jobs.category_id
                            INNER JOIN tbluser u ON u.id = jobs.user_id
                            WHERE jobs.id = :id;",[':id' => $id]);
        return $this->db->getOne();
    }

    public function getAllByCategory($id) {
        $sql = "SELECT jobs.*,categories.name AS cname FROM tbljobs jobs INNER JOIN tblcategories categories ON jobs.category_id = categories.id WHERE categories.id = :id ORDER BY jobs.created_at DESC";
        $this->db->query($sql,[':id' => $id]);
        
        return $this->db->getAll();
    }

    public function create($data) {
        $sql = "INSERT INTO tbljobs(category_id,company,job_title,description,salary,location,contact_user,contact_number,contact_email,user_id)
                    VALUES(:category_id,:company,:job_title,:description,:salary,:location,:contact_user,:contact_number,:contact_email,:user_id);";
        if($this->db->query($sql,$data)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM tbljobs WHERE id = :id";
        
        if($this->db->query($sql,[':id' => $id])) {
            return true;
        }

        return false;
    }

    public function update($data) {
        $sql = "UPDATE tbljobs SET 
        category_id = :category_id,
        job_title = :job_title,
        company = :company,
        description = :description,
        location = :location,
        salary = :salary,
        contact_user = :contact_user,
        contact_number = :contact_number,
        contact_email = :contact_email
        WHERE id = :id
        ";

        if($this->db->query($sql,$data)) {
            return true;
        }
        return false;
    }

    public function jobPagination($limit,$page = 1) {
        
        $paging = new Pagination;
        $paging->limit = $limit;
        $paging->page = $page;
        $paging->start = ($paging->page - 1) * $paging->limit;

        $this->db->query("SELECT jobs.*,categories.name AS cname FROM tbljobs jobs INNER JOIN tblcategories categories ON jobs.category_id = categories.id ORDER BY jobs.created_at DESC LIMIT $paging->start, $paging->limit;");
        $paging->result = $this->db->getAll();
        $paging->count = $this->getJobCount();
        $paging->pages = ceil($paging->count / $paging->limit);
        $paging->next = $paging->page + 1;
        $paging->previous = $paging->page - 1;
        return $paging;
    }

    public function jobByCategoryPagination($limit,$id,$page = 1) {
        
        $paging = new Pagination;
        $paging->limit = $limit;
        $paging->page = $page;
        $paging->start = ($paging->page - 1) * $paging->limit;

        $this->db->query("SELECT jobs.*,categories.name AS cname FROM tbljobs jobs INNER JOIN tblcategories categories ON jobs.category_id = categories.id WHERE categories.id = :id ORDER BY jobs.created_at DESC LIMIT $paging->start, $paging->limit;",['id' => $id]);
        $paging->result = $this->db->getAll();
        $paging->count = $this->getJobWithCategoryCount($id);
        $paging->pages = ceil($paging->count / $paging->limit);
        $paging->next = $paging->page + 1;
        $paging->previous = $paging->page - 1;
        return $paging;
    }

    public function getJobWithCategoryCount($cid) {
        try {
            $this->db->query("SELECT COUNT(*) as count FROM tbljobs j INNER JOIN tblcategories c ON j.category_id = c.id WHERE j.category_id = $cid");
            return $this->db->getOne()->count;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getJobCount() {
        try {
            $this->db->query("SELECT COUNT(*) as count FROM tbljobs");
            return $this->db->getOne()->count;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}