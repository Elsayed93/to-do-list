<?php
session_start();
require_once 'includes/header.php';
?>

<body>


    <div class="container mt-5">
        <?php

        if (isset($_SESSION['added']) && $_SESSION['added'] === true) {
        ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-success" role="alert">
                        Task has been added successfully
                    </div>
                </div>
            </div>
        <?php
            unset($_SESSION['added']);
        } elseif (isset($_SESSION['added']) && $_SESSION['added'] === false) {
        ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-danger" role="alert">
                        Task has Not been added successfully
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

        <div class="row">
            <div class="col-md-6">
                <a href="views/Tasks/create.php" class="btn btn-primary">Add Task</a>
            </div>
        </div>

        <!-- tasks table -->
        <div class="row mt-5">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
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
                                    <button type="button" class="btn btn-success btn-sm">Completed</button>
                                <?php
                                }
                                ?>
                                <button type="button" class="btn btn-info btn-sm">Not Completed</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm">Edite</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>