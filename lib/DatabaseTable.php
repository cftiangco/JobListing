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

        public function query($query) {
            $this->stmt = $this->dbh->prepare($query);
        }

        public function bind($param, $value, $type = null) {
            if(is_null($type)) {
                switch(true) {
                    case is_int ($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool ($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null ($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                        break;
                }
            }
            $this->stmt->bindValue($param,$value,$type);
        }

        public function execute() {
            return $this->stmt->execute();
        }

        public function getAll() {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function getOne() {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }
    }

?>