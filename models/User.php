<?php
require_once("./../db/Db.php");

class User
{
    private $full_name;
    private $email;

    public function __construct() {}

    public function get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        throw new Exception("Property '$property' does not exist or is not accessible.");
    }

    public function set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
        throw new Exception("Property '$property' does not exist or is not accessible.");
    }

    public function validation()
    {
        if (empty($_POST['full_name']) || empty($_POST['email'])) {
            throw new Exception("The inputs should be filled!!");
        } else {
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Check The email format");
            } elseif (!preg_match("/^[a-zA-Z\s]+$/", $_POST['full_name'])) {
                throw new Exception("Full name can only contain letters and spaces.");
            } else {
                $db = new Db();
                $pdo = $db->connect();
                $stmt = $pdo->prepare("SELECT * FROM users WHERE full_name = :name OR email = :email;");
                $stmt->bindParam(':name', $_POST['full_name']);
                $stmt->bindParam(':email', $_POST['email']);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    throw new Exception("The name Or The email already inserted!!");
                } else {
                    return $this->add();
                }
            }
        }
    }

    private function add()
    {
        $this->full_name = $_POST['full_name'];
        $this->email = $_POST['email'];

        $db = new Db();
        $pdo = $db->connect();
        $stmt = $pdo->prepare("INSERT INTO users (full_name, email) VALUES (:name, :email);");
        $stmt->bindParam(':name', $_POST['full_name']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->execute();
        header("Location: ./../html/index.php");
        exit();
    }
}
