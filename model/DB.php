
<?php
class DB
{
    private $host;
    private $db;
    private $user;
    private $password;
    private $conn;

    public function __construct($host, $db, $user, $password)
    {
        $this->host = $host;
        $this->db = $db;
        $this->user = $user;
        $this->password = $password;
    }

    public function connect()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            header('Location: ./error.php');
            echo "La connexió ha fallat: " . $e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
    public function closeConnection()
    {
        $this->conn = null;
    }
}
