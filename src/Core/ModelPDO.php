<?php

namespace App\Core;


use mysql_xdevapi\Statement;

class ModelPDO
{
    public function _construct()
    {
        $host = '127.0.0.1';
        $db   = 'test';
        $user = 'root';
        $pass = '';
        $charset = 'utf8';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, $user, $pass, $opt);
    }

    public function all()
    {
        $username = $_POST['username'];
        $sql ='SELECT * FROM users WHERE username =' . $username;
        $stmt = $this->pdo->querty(statement:'SELECT name FROM users');
        while($row = $stmt->fetch()){
            echo $row['name'] . "\n";
        }
    }

}
