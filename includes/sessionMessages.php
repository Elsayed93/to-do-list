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
    // unset($_SESSION['added']);
    session_unset();
} elseif (isset($_SESSION['added']) && $_SESSION['added'] === false) {
?>
    <div class="row">
        <div class="col-md-6">
            <div class="alert alert-danger" role="alert">
                Task has Not been added
            </div>
        </div>
    </div>
<?php
    session_unset();
} elseif (isset($_SESSION['update']) && $_SESSION['update'] === true) {
?>
    <div class="row">
        <div class="col-md-6">
            <div class="alert alert-success" role="alert">
                Task has been updated successfully
            </div>
        </div>
    </div>
<?php
    session_unset();
} elseif (isset($_SESSION['update']) && $_SESSION['update'] === false) {
?>
    <div class="row">
        <div class="col-md-6">
            <div class="alert alert-danger" role="alert">
                Task has Not been updated
            </div>
        </div>
    </div>
<?php
    session_unset();
} elseif (isset($_SESSION['delete']) && $_SESSION['delete'] === true) {
?>
    <div class="row">
        <div class="col-md-6">
            <div class="alert alert-success" role="alert">
                Task has been deleted successfully
            </div>
        </div>
    </div>
<?php
    session_unset();
} elseif (isset($_SESSION['delete']) && $_SESSION['delete'] === false) {
?>
    <div class="row">
        <div class="col-md-6">
            <div class="alert alert-danger" role="alert">
                Task has not been deleted
            </div>
        </div>
    </div>
<?php
    session_unset();
} elseif (isset($_SESSION['complete-task']) && $_SESSION['complete-task'] === true) {
?>
    <div class="row">
        <div class="col-md-6">
            <div class="alert alert-success" role="alert">
                Task has been Completed successfully
            </div>
        </div>
    </div>
<?php
    session_unset();
} elseif (isset($_SESSION['complete-task']) && $_SESSION['complete-task'] === false) {
?>
    <div class="row">
        <div class="col-md-6">
            <div class="alert alert-danger" role="alert">
                Task has not been Completed
            </div>
        </div>
    </div>
<?php
    session_unset();
}

?>