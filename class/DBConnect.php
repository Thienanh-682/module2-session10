<?php


class DBConnect
{
    protected $dns;
    protected $userName;
    protected $passWord;

    public function __construct($dns, $userName, $passWord)
    {
        $this->dns = $dns;
        $this->userName = $userName;
        $this->passWord = $passWord;
    }

    function connect()
    {
        $conn = null;
        try {
            $conn = new PDO($this->dns, $this->userName, $this->passWord);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
        return $conn;
    }
}