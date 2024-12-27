<?php
class Task
{
    public function __construct() {}

    public function showDetails()
    {
        $id = (int) $_GET['id'];
        $db = new Db();
        $pdo = $db->connect();
        $stmt = $pdo->prepare("SELECT * FROM tasks WHERE task_id = '$id';");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            extract($row);
            include("./../html/details.php");
        }
    }

    public function update()
    {
        $task_id = $_POST['task_id'];
        $task_status = $_POST['task_status'];
        $db = new Db();
        $pdo = $db->connect();
        $stmt = $pdo->prepare("UPDATE tasks SET task_status = :task_status WHERE task_id = :task_id;");
        $stmt->bindParam(':task_status', $task_status, PDO::PARAM_STR);
        $stmt->bindParam(':task_id', $task_id);
        $stmt->execute();
        header("Location: ./../html/index.php");
    }
}
