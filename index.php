<?php
session_start();
require_once 'includes/header.php';
?>

<body>


    <div class="container mt-5">
        <?php require_once 'includes/sessionMessages.php'; ?>

        <div class="row">
            <div class="col-md-6">
                <a href="views/Tasks/create.php" class="btn btn-primary">Add Task</a>
            </div>
        </div>

        <!-- tasks table -->
        <div class="row mt-5">
            <div class="col-md-8">


                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Task Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once 'includes/DbConnection.php';

                        $fetchTasksQuery = $db->query("SELECT * FROM `tasks`");
                        $allTasks = $fetchTasksQuery->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($allTasks as $row) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $row['id'] ?></th>
                                <td><?php echo $row['name'] ?></td>
                                <td>
                                    <?php if ($row['is_complete'] == 1) {
                                    ?>
                                        <div class="alert alert-success" role="alert">
                                            Completed
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="alert alert-warning" role="alert">
                                            Not Completed
                                        </div>
                                    <?php
                                    }
                                    ?>

                                </td>
                                <td>
                                    <a href="controllers/Tasks/edit.php?id=<?php echo $row['id'] ?>" class="btn btn-warning ">Edite</a>
                                    <a href="controllers/Tasks/delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger ">Delete</a>
                                    <?php
                                    if ($row['is_complete'] == 0) {
                                    ?>
                                        <a href="controllers/Tasks/completeTask.php?id=<?php echo $row['id'] ?>" class="btn btn-dark ">Complete task</a>
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>