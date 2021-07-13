<?php
session_start();
require_once '../../includes/DbConnection.php';

if (isset($_POST['task-name']) && !empty($_POST['task-name']) && isset($_POST['task-id']) && !empty($_POST['task-id'])) {
    // update task 
    $updateTaskStmt = $db->prepare("UPDATE `tasks` SET `name`=:task_name WHERE id= :task_id");

    $updateTaskStmt->execute([

        ':task_name' => $_POST['task-name'],
        ':task_id' => $_POST['task-id']
    ]);
   
    if ($updateTaskStmt->rowCount()) {
        $_SESSION['update'] = true;
        header("location: ../../index.php");
    } else {
        $_SESSION['update'] = false;
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
