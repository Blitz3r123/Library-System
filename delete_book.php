<?php
	$link = mysqli_connect("localhost", "root", "1234", "islamunited");

	if ($link === false){
		die("ERROR: Could not connect to database. " . mysqli_connect_error());
	}

	$sql = "DELETE FROM books WHERE BookID = " . $_GET['BookID'];
	if(mysqli_query($link, $sql)){
		Header("Location: view_books.php");
		Exit();
	}
?>