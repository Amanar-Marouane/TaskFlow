<?php
require_once("./../db/Db.php");
require_once("./../models/User.php");
require_once('./../models/Basic.php');
require_once('./../models/Bug.php');
require_once('./../models/Feature.php');

class Controller
{
    public function requestHandler()
    {
        $action = $_GET["action"];
        switch ($action) {
            case 'create':
                $this->taskHandler();
                break;
            case 'add':
                $this->userHandler();
                break;
        }
    }

    private function taskHandler()
    {
        try {
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
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            header("Location: ./../html/new_task.php?error=" . urlencode($errorMessage));
            exit();
        }
    }

    private function userHandler()
    {
        try {
            $user = new User();
            $user->validation();
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            header("Location: ./../html/add_user.php?error=" . urlencode($errorMessage));
            exit();
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new Controller();
    $controller->requestHandler();
}
