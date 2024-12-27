<?php
class Task
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function showDetails()
    {
        $id = (int) $_GET['id'];
        $info = $this->pdo->prepare("SELECT * FROM tasks WHERE task_id = '$id';");
        $info->execute();
        $row = $info->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            extract($row);
        } else {
            throw new Exception("Something went wrong. try again.");
        }
        $users = $this->pdo->prepare("SELECT full_name FROM users;");
        $users->execute();
        $rows = $users->fetchAll(PDO::FETCH_ASSOC);
        if (!$rows) {
            throw new Exception("Something went wrong. try again.");
        }
        include("./../html/details.php");
    }

    public function update()
    {
        $task_id = $_POST['task_id'];
        $task_status = $_POST['task_status'];
        $stmt = $this->pdo->prepare("UPDATE tasks SET task_status = :task_status WHERE task_id = :task_id;");
        $stmt->bindParam(':task_status', $task_status, PDO::PARAM_STR);
        $stmt->bindParam(':task_id', $task_id);
        $stmt->execute();
        header("Location: ./../html/index.php");
    }

    public function selectRendering()
    {
        $stmt = $this->pdo->prepare("SELECT full_name FROM users;");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$rows) {
            throw new Exception("Something went wrong");
        }
        include("./../html/new_task.php");
    }
}
