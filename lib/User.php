<?php

class User {
	private $db;

	public function __construct() {
		$this->db = new DatabaseTable();
	}

	public function checkEmail($email) {
		$this->db->query("SELECT * FROM tbluser WHERE email_address = :email",[':email' => $email]);

		$count = 0;

		foreach($this->db->getAll() as $result) {
			$count++;
		}

		if($count > 0) {
			return true;
		}
		return false;
	}

	public function checkPassword($password) {

		$this->db->query("SELECT * FROM tbluser WHERE pass_word = :pass_word",[':pass_word' => $password]);

		$count = 0;

		foreach($this->db->getAll() as $result) {
			$count++;
		}

		if($count > 0) {
			return true;
		}
		return false;
	}

	
	public function create($data) {
		$sql = "INSERT INTO tbluser(first_name,middle_name,last_name,email_address,contact_number,pass_word)
					VALUES(:first_name,:middle_name,:last_name,:email_address,:contact_number,:pass_word);";
		try {
			if($this->db->query($sql,$data)) {
				return true;
			}
		} catch(PDOException $err) {
			echo $err->getMessage();
		}
		return false;
	}

	public function getUser($email) {
		try {
			$sql = "SELECT * FROM tbluser WHERE email_address = :email_address";
			$data = [':email_address' => $email];
			$this->db->query($sql,$data);
			return $this->db->getOne();
		} catch (PDOException $err) {
			return $err->getMesage();
		}
	}

	public function update($data) {
		try {
			$sql = "UPDATE tbluser SET
					first_name = :first_name,
					middle_name = :middle_name,
					last_name = :last_name,
					email_address = :email_address,
					contact_number = :contact_number
					WHERE id = :id;";
			if($this->db->query($sql,$data)) {
				return true;
			} else {
				return false;
			}
		} catch(PDOException $err) {
			return $err->getMessage();
		}
	}
}