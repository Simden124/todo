<?php
// Create database connection using config file
include_once("config.php");

// Fetch all todo data from database
$result = mysqli_query($mysqli, "SELECT * FROM todo ORDER BY id DESC");
?>

<html>
<head>
    
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Homepage</title>
</head>

<body>
<a class="addbutton" href="add.php">Add To Do</a><br/><br/>


    <table class="maintable" width='80%' border=1>

    <tr class="mainhead">
        <th>Id</th> <th>Title</th> <th>Content</th> <th>Done</th> <th>Update</th>
    </tr>
    <?php
    while($todo_data = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$todo_data['id']."</td>";
        echo "<td>".$todo_data['title']."</td>";
        echo "<td>".$todo_data['content']."</td>";
        echo "<td>".$todo_data['done']."</td>";
        echo "<td><a href='edit.php?id=$todo_data[id]'>Edit</a> | <a href='delete.php?id=$todo_data[id]'>Delete</a></td></tr>";
    }
    ?>
    </table>
</body>
</html>