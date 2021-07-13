<?php

session_start();
require_once '../../includes/DbConnection.php';

if (isset($_GET) && !empty($_GET['id'])) {
    $taskId = $_GET['id'];

    // get task by id 
    $getTaskStmt = $db->prepare("SELECT `name` FROM `tasks` WHERE id=:task_id");
    $getTaskStmt->execute([
        ':task_id' => $taskId
    ]);

    // if id not exist >>>> error message 
    if ($getTaskStmt->rowCount()) {
        // delete task by id 
        $deleteTaskStmt = $db->prepare("DELETE FROM `tasks` WHERE id=:task_id");
        $deleteTaskStmt->execute([
            ':task_id' => $taskId
        ]);

        if ($deleteTaskStmt->rowCount()) {
            $_SESSION['delete'] = true;
            header("location: ../../index.php");
        } else {
            $_SESSION['delete'] = false;
            header("location: ../../index.php");
        }
    } else {
        require_once '../../includes/header.php';
?>

        <body>
            <div class="container mt-5">
                <p class="lead">This Task doesn't exist</p>
            </div>
        </body>

        </html>
    <?php
        die;
    }
} else {
    ?>

    <body>
        <div class="container mt-5">
            <p class="lead">Unknown Error, Please Try Again</p>
        </div>
    </body>

    </html>

<?php
}
