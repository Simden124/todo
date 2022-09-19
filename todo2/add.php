<html>
<head>
<link rel="stylesheet" href="css/style.css">
	<title>Add Todo</title>
</head>

<body>
	<a class="addbutton"  href="index.php">Go to Home</a>
	<br/><br/>

	<form action="add.php" method="post" name="form1">
		<table class="mainhead" width="25%" border="0">
			<tr>
				<td>Title</td>
				<td><input type="text" name="title"></td>
			</tr>
			<tr>
				<td>Content</td>
				<td><input type="text" name="content"></td>
			</tr>
			
			<tr>
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>

	<span class="stilen">
    <?php

	// Check If form submitted, insert form data into todo table.
	if(isset($_POST['Submit'])) {
		$title = $_POST['title'];
		$content = $_POST['content'];
		

		// include database connection file
		include_once("config.php");

		// Insert todo data into table
		$result = mysqli_query($mysqli, "INSERT INTO todo(title,content,done) VALUES('$title','$content',0)");

		// Show message when todo added
		echo " <a href='index.php'>Todo added successfully.Click here to view list</a>";
	}
	?> </span>
</body>
</html>