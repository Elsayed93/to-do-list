<?php
require_once '../../includes/header.php';
?>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form method="POST" action="../../controllers/Tasks/create.php">
                    <div class="mb-3">
                        <label for="taskName" class="form-label" style="font-weight: bold;">Task Name: </label>
                        <input type="text" class="form-control" id="taskName" name="task-name" placeholder="please enter task name">
                    </div>
                    <button type="submit" class="btn btn-primary">Add </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>