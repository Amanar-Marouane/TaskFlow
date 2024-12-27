<?php
class Bug extends Basic
{
    private $severity;

    public function validation()
    {
        if (parent::validation()) {
            $this->severity = $_POST['importance'];
            return parent::createTask('Bug', $this->severity);
        }
    }
}
