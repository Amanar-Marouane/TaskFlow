<?php
require_once("./../db/Db.php");

class User
{
    private $full_name;
    private $email;

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

    
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = false;
    if (empty($_POST['full_name'])) {
        $error = true;
        echo "Full name is required.<br>";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $_POST['full_name'])) {
        $error = true;
        echo "Full name can only contain letters and spaces.<br>";
    }

    if (empty($_POST['email'])) {
        $error = true;
        echo "Email is required.<br>";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error = true;
        echo "Invalid email format<br>";
    }

    if (! $error) {
        $db = new Db();
        $pdo = $db->connect();

        $stmt = $pdo->prepare("SELECT * FROM users WHERE full_name = :name OR email = :email;");
        $stmt->bindParam(':name', $_POST['full_name']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "The name Or The email already inserted!!";
        } else {
            $stmt = $pdo->prepare("INSERT INTO users (full_name, email) VALUES (:name, :email);");
            $stmt->bindParam(':name', $_POST['full_name']);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->execute();
            header("Location: ./index.php");
            exit();
        }
    }
}
