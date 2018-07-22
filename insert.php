<?php
	$link = mysqli_connect("localhost", "root", "1234", "islamunited");

	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}

	$book_title = mysqli_real_escape_string($link, $_REQUEST['book_title']);
	$book_author = mysqli_real_escape_string($link, $_REQUEST['book_author']);
	$book_cover = mysqli_real_escape_string($link, $_REQUEST['book_cover']);
	$book_description = mysqli_real_escape_string($link, $_REQUEST['book_description']);

	$sql = "INSERT INTO books(BookTitle, BookAuthor, BookURL, BookDescription) VALUES('$book_title', '$book_author', '$book_cover', '$book_description')";

	if(mysqli_query($link, $sql)){
		header("Location: view_books.php");
		exit();
	}else{
		echo "Could not execute $sql. " . mysqli_error($link);
	}

	mysqli_close($link);
?>