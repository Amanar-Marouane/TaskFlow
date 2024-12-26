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

    public function render()
    {
        $db = new Db();
        $pdo = $db->connect();
        $stmt = $pdo->prepare("SELECT * FROM users;");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            echo "<div id='{$row['user_id']}' class='bg-gray-100 border border-gray-300 rounded p-4 w-fit cursor-pointer'>
                        <div class='flex items-center'>
                            <svg fill='#000000' width='30px' height='30px' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'>
                                <path d='M16 15.503A5.041 5.041 0 1 0 16 5.42a5.041 5.041 0 0 0 0 10.083zm0 2.215c-6.703 0-11 3.699-11 5.5v3.363h22v-3.363c0-2.178-4.068-5.5-11-5.5z' />
                            </svg>
                            <p class='text-sm font-semibold'>{$row['full_name']}</p>
                        </div>
                        <p class='text-sm text-gray-600'><span class='md:font-bold'>Email</span>: {$row['email']}</p>
                    </div>";
        }
    }
}
