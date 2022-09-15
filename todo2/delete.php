<?php
// include database connection file
include_once("config.php");

// Get id from URL to delete that todo
$id = $_GET['id'];

// Delete todo row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM todo WHERE id=$id");

// After delete redirect to Home, so that latest todo list will be displayed.
header("Location:index.php");
?>