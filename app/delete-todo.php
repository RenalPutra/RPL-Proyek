<?php
require "../config/connect.php";
require "../config/functions.php";
 
if (isset($_GET["id"])) {
    $todoId = mysqli_real_escape_string($conn, $_GET["id"]);
    $sql = "DELETE FROM todos WHERE id='{$todoId}'";
    mysqli_query($conn, $sql);
    header("Location: todos.php");
} else {
    header("Location: todos.php");
}

?>