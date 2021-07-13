<?php
session_start();
require_once '../../includes/header.php';

if (isset($_SESSION['task-name']) && !empty($_SESSION['task-name']) && isset($_SESSION['task-id']) && !empty($_SESSION['task-id'])) {

    $taskName = $_SESSION['task-name']['name'];
    $taskId = $_SESSION['task-id'];
?>

    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 mx-auto">

                    <h3>Edit Task</h3>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6 mx-auto">
                    <form method="POST" action="../../controllers/Tasks/update.php">
                        <input type="hidden" name="task-id" value="<?php echo $taskId ?>">
                        <div class="mb-3">
                            <label for="taskName" class="form-label" style="font-weight: bold;">Task Name: </label>
                            <input type="text" class="form-control" id="taskName" name="task-name" value="<?php echo $taskName ?>" placeholder="please enter task name">
                        </div>
                        <button type="submit" class="btn btn-primary">Update </button>
                    </form>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 mx-auto">
                    <a href="../../index.php" class="btn btn-primary">Home </a>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
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
