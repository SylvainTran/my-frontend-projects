
<?php
    class Connection {
        private $server, $user, $pass, $db, $connection;

        function __construct($server, $user, $pass, $db) {
            $this->server=$server;
            $this->user=$user;
            $this->pass=$pass;
            $this->db=$db;
        }

        function getConnection() {
            return $this->connection;
        }

        function connect() {
            try {
                $dns="mysql:host=$this->server;dbname=$this->db";
                $options= array( 
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                );
                $this->connection=new PDO($dns, $this->user, $this->pass, $options);
            } catch( Exception $e) {
                echo $e->getMessage();
                echo "Problem with the connection to the db.";
                exit();
            }
        }
    }
?>