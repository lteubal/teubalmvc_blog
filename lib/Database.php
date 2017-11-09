<?php
// PDO Class

class Database {

    private $host = DB_HOST;
    private $dbname = DB_NAME;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $charset = DB_CHARSET;

    private $dbh;
    private $stmt;

    public function __construct()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=$this->charset";
        $options = [ PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                    ];
        // Create a new PDO instanace
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }
        // Catch any errors
        catch(PDOException $e){
            $this->error = $e->getMessage();
        }
    }

    // prepare statement
    function prepare($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    // execute statement (optional: bind vars passing an array)
    function execute(array $bindingVars = []) {
        if(!empty($bindingVars)) {
            $this->stmt->execute($bindingVars);
        } else {
            $this->stmt->execute();
        }
    }

    // fetch result
    function fetch()
    {
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // fetch all results
    function fetchAll()
    {
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }


}
