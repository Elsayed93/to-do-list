<?php

session_start();
require_once '../../includes/DbConnection.php';

if (isset($_GET) && !empty($_GET['id'])) {
    $taskId = $_GET['id'];

    // ensure that the id is exist
    $getTaskStmt = $db->prepare("SELECT `name` FROM `tasks` WHERE id=:task_id");
    $getTaskStmt->execute([
        ':task_id' => $taskId
    ]);

    // if id not exist >>>> error message 
    if ($getTaskStmt->rowCount()) {
        // delete task by id 
        $completeTaskStmt = $db->prepare("UPDATE `tasks` SET `is_complete`=1 WHERE id=:task_id");
        $completeTaskStmt->execute([
            ':task_id' => $taskId
        ]);

        if ($completeTaskStmt->rowCount()) {
            $_SESSION['complete-task'] = true;
            header("location: ../../index.php");
        } else {
            $_SESSION['complete-task'] = false;
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
