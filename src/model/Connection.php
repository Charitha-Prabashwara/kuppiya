<?php

class Connection
{
    private $DATABASE_HOST; //Database server address {ip, domain}
    private $DATABASE_USER; //Database server username.
    private $DATABASE_PASS; //Database server user password.
    private $DATABASE_NAME; //Database name.
    private $DATABASE_PORT; //Database server service port.

    private mysqli $connection; //Database connection object.

    public function __construct()
    {
        $this->DATABASE_HOST = "localhost";
        $this->DATABASE_USER = "root";
        $this->DATABASE_PASS = "";
        $this->DATABASE_NAME = "userAuth";
        $this->DATABASE_PORT = 3306;


        try {

            $this->connection = new mysqli(
                $this->DATABASE_HOST,
                $this->DATABASE_USER,
                $this->DATABASE_PASS,
                $this->DATABASE_NAME,
                $this->DATABASE_PORT
            );
        } catch (Exception $e) {
            throw new Exception($e);
        } catch (mysqli_sql_exception $e) {
            throw new mysqli_sql_exception($e);
        }
    }

    public function getConnection()
    {
        try {

            $this->connection = new mysqli(
                $this->DATABASE_HOST,
                $this->DATABASE_USER,
                $this->DATABASE_PASS,
                $this->DATABASE_NAME,
                $this->DATABASE_PORT
            );
        } catch (Exception $e) {
            throw new Exception($e);
        } catch (mysqli_sql_exception $e) {
            throw new mysqli_sql_exception($e);
        }

        return $this->connection;
    }
}
