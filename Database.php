<?php

class Database
{
    private mysqli $conn;
    private $host;
    private $username;
    private $password;
    private $dbname;

    public function __construct($file)
    {
        try {
            $json = file_get_contents($file);
        } catch (Exception $e) {
            echo 'Error: '.$e->getMessage();
        }
        try {
            $data = json_decode($json);
        } catch (Exception $e) {
            echo 'Error: '.$e->getMessage();
        }

        $this->host = $data->host;
        $this->username = $data->username;
        $this->password = $data->password;
        $this->dbname = $data->dbname;
    }

    public function insertContactDetails($mail, $name, $message): void
    {
        $this->connectDB();
        // PREPARED statement
        $prepared = $this->conn->prepare('INSERT INTO contactForm (mail, name, message) VALUES (?, ?, ?);');
        $prepared->bind_param('sss', $mail, $name, $message);
        $this->query($prepared);
        $this->disconnectDB();
    }

    private function query($prepared): void
    {
        try {
            $prepared->execute();
            echo '<br>Inserted successfully!';
        } catch (Exception $e) {
            if (str_contains($e->getMessage(), 'Duplicate entry')) {
                echo '<br><h1>Combination of mail + message already in database.</h1>';
                $this->disconnectDB();
                exit;
            }
            echo '<br>Error: '.$e->getMessage();
            $this->disconnectDB();
            exit;
        }
    }

    private function connectDB(): void
    {
        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
            echo '<br> Connection established succesfully';
        } catch (Exception $e) {
            echo '<br>Error: '.$e->getMessage();
        }
        // Create connection
        if ($this->conn->connect_error) {
            exit('<br>Connection failed: '.$this->conn->connect_error);
        }
    }

    private function disconnectDB(): void
    {
        $this->conn->close();
        echo '<br>Connection closed.';
    }
}
