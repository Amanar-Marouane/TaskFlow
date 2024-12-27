<?php
class Feature extends Basic
{
    private $priority;

    public function validation()
    {
        if (parent::validation()) {
            $this->priority = $_POST['importance'];
            return $this->createTask('Feature', $this->priority);
        }
    }
}
