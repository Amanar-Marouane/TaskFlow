<?php
require_once('./../models/Basic.php');
require_once('./../models/Bug.php');
require_once('./../models/Feature.php');
require_once("./../db/Db.php");

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new Controller();
    $controller->requestHandler();
}
