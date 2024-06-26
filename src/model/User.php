<?php


require_once("Connection.php");

class User
{
    private Connection $conn;
    private $TABLE_NAME;

    public function __construct()
    {
        $this->TABLE_NAME = "user";
        $this->conn = new Connection();

        if (!$this->is_exist_userTable()) {
            $this->create_user_table();
        }
    }

    private function is_exist_userTable()
    {

        try {
            $connection = $this->conn->getConnection();
            $sql = "SHOW TABLES LIKE '{$this->TABLE_NAME}'";
            $result = $connection->query($sql);
            $connection->close();
            if ($result->num_rows == 1) {

                return true;
            }
        } catch (Exception $e) {
            echo $e;
        } catch (mysqli_sql_exception $e) {
            echo $e;
        }

        return false;
    }

    private function create_user_table()
    {

        try {
            $connection = $this->conn->getConnection();
            $sql = "CREATE TABLE IF NOT EXISTS `user` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `firstName` varchar(30) NOT NULL,
                    `lastName` varchar(30) DEFAULT NULL,
                    `email` varchar(256) NOT NULL,
                    `password` varchar(256) NOT NULL,
                    PRIMARY KEY (`id`),
                    UNIQUE KEY `email` (`email`)
                    ) 
                    ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
            $result = $connection->query($sql);
        } catch (Exception $e) {
            throw new Exception($e);
        } catch (mysqli_sql_exception $e) {
            throw new mysqli_sql_exception($e);
        }
    }
}
