<?php
class Basic
{
    protected $task_title;
    protected $task_desc;
    protected $task_status;
    protected $assigned_to;

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
        if (empty($_POST['title'])) {
            throw new Exception("Title property is null.");
        } else {
            if (!(preg_match("/^[a-zA-Z0-9 ]+$/", $_POST['title']) && preg_match("/^[a-zA-Z0-9 ]+$/", $_POST['description']))) {
                throw new Exception ("The title or the description should only include alphabets and numbers and spaces!!");
            } else {
                return true;
            }
        }
    }

    public function createTask($type, $importance)
    {
        $this->task_title = $_POST['title'];
        $this->task_desc = $_POST['description'];
        $this->task_status = $_POST['status'];
        $this->assigned_to = $_POST['assignedTo'] ?? null;
        if ($this->task_desc == "") $this->task_desc = null;
        if ($this->assigned_to == 0) $this->assigned_to = null;

        $db = new Db();
        $pdo = $db->connect();
        $stmt = $pdo->prepare("INSERT INTO tasks (task_title, task_description, task_status, task_type, assigned_to, importance) VALUES
                                    (:task_title, :task_desc, :task_status, '$type', :assigned_to, :importance);");
        if ($importance === null) {
            $stmt->bindValue(':importance', null, PDO::PARAM_NULL);
        } else {
            $stmt->bindParam(':importance', $importance, PDO::PARAM_STR);
        }
        $stmt->bindParam(':task_title', $this->task_title);
        $stmt->bindParam(':task_desc', $this->task_desc);
        $stmt->bindParam(':task_status', $this->task_status);
        $stmt->bindParam(':assigned_to', $this->assigned_to);
        $stmt->execute();
        header("Location: ./../html/index.php");
    }
}
