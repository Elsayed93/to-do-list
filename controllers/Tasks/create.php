<?php

require_once '../../includes/DbConnection.php';
session_start();

if (isset($_POST['task-name']) && !empty($_POST['task-name'])) {

    $taskName = $_POST['task-name'];

    // length validaton 
    if (strlen($taskName) > 255) {
        die('task name should not exceed 255 character');
    }

    $creatTaskStmt = $db->prepare("INSERT INTO `tasks`(`name`) VALUES (:task_name)");

    $creatTaskStmt->execute([
        ':task_name' => $taskName
    ]);

    if ($creatTaskStmt->rowCount()) {
        $_SESSION['added'] = true;
        header("location: ../../index.php");
    } else {
        $_SESSION['added'] = false;
        header("location: ../../index.php");
    }
} else {
    require_once '../../includes/header.php';

?>

    <body>
        <div class="container mt-5">
            <p class="lead">Unknown Error, Please Try Again</p>
        </div>
    </body>

    </html>

<?php
}
