<?php
namespace App\Core;


use PDO;



abstract class CoreModel implements ModelInterface
{

    protected static PDO $dth;
    protected static string $tableName;

}