<?php

try {
    //code...
    $dsn = "mysql:host=localhost;dbname=to-do";
    $user = "root";
    $passwd = "";

    $db = new PDO($dsn, $user, $passwd);
} catch (\PDOException $th) {
    //throw $th;
    echo "Error: ", $th->getMessage();
}
