<?php
require_once("./Db.php");

class Controller
{
    public function requestHandler()
    {
        $action = $_GET["action"];
        switch ($action) {
            case 'create':
                $this->taskHandler();
                break;
        }
    }

    private function taskHandler()
    {
        $type = $_POST["taskType"];
        switch ($type) {
            case 'basic':
                $task = new Basic();
                if ($task->validation()) $task->createTask('Basic', null);
                break;

            case 'bug':
                $task = new Bug();
                $task->validation();
                break;

            case 'feature':
                $task = new Feature();
                $task->validation();
                break;
        }
    }
}

class Basic
{
    protected $task_title;
    protected $task_desc;
    protected $task_status;
    protected $assigned_to;

    public function __construct() {}

    private function get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        throw new Exception("Property '$property' does not exist or is not accessible.");
    }

    private function set($property, $value)
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
            if (!(preg_match("/^[a-zA-Z0-9 ]+$/", $_POST['title']))) {
                echo ("The title should only include alphabets and numbers and spaces!!");
                if (isset($_POST['description'])) {
                    if (preg_match("/^[a-zA-Z0-9 ]+$/", $_POST['description'])) {
                        echo ("The description should only include alphabets and numbers and spaces!!");
                        return;
                    }
                }
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
        header("Location: ./index.php");
    }
}

class Bug extends Basic
{
    private $severity;
    public function __construct() {}

    public function validation()
    {
        if (parent::validation()) {
            $this->severity = $_POST['importance'];
            return parent::createTask('Bug', $this->severity);
        }
    }
}

class Feature extends Basic
{
    private $priority;
    public function __construct() {}

    public function validation()
    {
        if (parent::validation()) {
            $this->priority = $_POST['importance'];
            return $this->createTask('Feature', $this->priority);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new Controller();
    $controller->requestHandler();
}
