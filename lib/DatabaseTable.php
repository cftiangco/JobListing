<?php 
    class DatabaseTable {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $dbname = DB_NAME;

        private $dbh;
        private $stmt;
        private $error;

        public function __construct() {
            //set dsn
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

            //set options
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            //PDO Instance
            try {
                $this->dbh = new PDO($dsn,$this->user,$this->pass,$options);
            } catch(Exception $err) {
                $this->err = $err->getMessage();
                echo $err;
            }
        }

        public function query($sql,$parameters = []) {
            try {
                $this->stmt = $this->dbh->prepare($sql);
                return $this->stmt->execute($parameters);
            } catch(PDOException $err) {
                echo $err->getMessage();
            }
            
        }

        public function getAll() {
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function getOne() {
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }
    }

?>