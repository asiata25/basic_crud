<?php

class DB
{
    // Database configuration
    protected $host = DB_HOST;  // Database host (use 'localhost' or an IP)
    protected $dbname = DB_NAME; // Name of your database
    protected $username = DB_USERNAME; // Database username
    protected $password = DB_PASSWORD; // Database password
    protected PDO $pdo;
    protected PDOStatement $stmt;

    public function __construct()
    {
        // DSN (Data Source Name)
        $dsn = "mysql:host=$this->host;dbname=$this->dbname";

        // PDO Options (optional but recommended)
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Enable exceptions for errors
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Fetch as associative array
            PDO::ATTR_EMULATE_PREPARES   => false,                  // Use native prepared statements
        ];

        try {
            // Create a PDO instance (connect to the database)
            $this->pdo = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            // Handle connection error
            die($e->getMessage());
        }
    }

    function query($query)
    {
        $this->stmt = $this->pdo->prepare($query);
    }

    function bind($params, $value, $type = null)
    {
        if (is_null($type)) {
            $type = match (true) {
                is_int($value) => PDO::PARAM_INT,
                is_bool($value) => PDO::PARAM_BOOL,
                is_null($value) => PDO::PARAM_NULL,
                default => PDO::PARAM_STR, // Assume string for the default case
            };
        }

        $this->stmt->bindValue($params, $value, $type);
    }

    function execute()
    {
        $this->stmt->execute();
    }

    function fetch()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    function fetchAll()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
