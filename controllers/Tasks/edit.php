<?php

require_once '../../includes/DbConnection.php';
session_start();

// var_dump($_GET);
// die;
if (isset($_GET) && !empty($_GET['id'])) {
    $taskId = $_GET['id'];

    // get task by id 
    $getTaskStmt = $db->prepare("SELECT `name` FROM `tasks` WHERE id=:task_id");
    $getTaskStmt->execute([
        ':task_id' => $taskId
    ]);

    // if id not exist >>>> error message 
    if ($getTaskStmt->rowCount()) {
        $_SESSION['task-name'] = $getTaskStmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['task-id'] = $taskId;
        header("location: ../../views/Tasks/edit.php");
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
