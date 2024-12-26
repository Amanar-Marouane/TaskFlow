<?php
require_once("./../db/Db.php");
require_once("./../models/User.php");
require_once('./../models/Basic.php');
require_once('./../models/Bug.php');
require_once('./../models/Feature.php');
require_once('./../models/Task.php');

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
            case 'show':
                $this->detailsRender();
                break;
            case 'update':
                $this->taskUpdater();
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

    public function usersRender()
    {
        $data = new User();
        $data->render();
    }

    public function tasksRender($staus)
    {


        switch ($staus) {
            case "To do":
                $data = new Basic();
                $data->render("To do");
                break;

            case "In progress":
                $data = new Bug();
                $data->render("In progress");
                break;

            case "Done":
                $data = new Feature();
                $data->render("Done");
                break;
        }
    }

    private function detailsRender()
    {
        try {
            $details = new Task();
            $details->showDetails();
        } catch (Exception) {
            header("Location: ./../html/index.php?error=" . urlencode("Something went wrong. Check your connection."));
            exit();
        }
    }

    private function taskUpdater()
    {
        try {
            $update = new Task();
            $update->update();
        } catch (Exception) {
            header("Location: ./../html/index.php?error=" . urlencode("Something went wrong. Check your connection."));
            exit();
        }
    }
}

if (isset($_GET["action"])) {
    $controller = new Controller();
    $controller->requestHandler();
}
