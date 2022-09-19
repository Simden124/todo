<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for todo update, then redirect to homepage after update
if(isset($_POST['update']))
{
	$id = $_POST['id'];

	$title=$_POST['title'];
	$content=$_POST['content'];
	//$done=$_POST['done']; 
    $done=0;
    if(isset($_POST['done'])){
        $done=1;

    }

	// update todo data
	$result = mysqli_query($mysqli, "UPDATE todo SET title='$title',content='$content',done=$done WHERE id=$id");

	// Redirect to homepage to display updated todo in list
	header("Location: index.php");
}
?>
<?php
// Display selected todo data based on id
// Getting id from url
$id = $_GET['id'];

// Fetch todo data based on id
$result = mysqli_query($mysqli, "SELECT * FROM todo WHERE id=$id");

while($todo_data = mysqli_fetch_array($result))
{
	$title = $todo_data['title'];
	$content = $todo_data['content'];
	$done = $todo_data['done'];
}
?>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
	<title>Edit Todo Data</title>
</head>

<body>
	<a class="addbutton" href="index.php">Home</a>
	<br/><br/>

	<form name="update_todo" method="post" action="edit.php">
		<table class="mainhead" border="0">
			<tr>
				<td>Title</td>
				<td><input type="text" name="title" value=<?php echo $title;?>></td>
			</tr>
			<tr>
				<td>Content</td>
				<td><input type="text" name="content" value=<?php echo $content;?>></td>
			</tr>
			<tr>
				<td>Done</td>
				<td>  <input type="checkbox" name="done" <?php if($done==1){
       echo"checked='checked'"; }
       ?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>