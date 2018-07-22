<?php
	$link = mysqli_connect("localhost", "root", "1234", "islamunited");

	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}

	$sql = "UPDATE books SET BookTitle = '".$_REQUEST['book_title']."', BookAuthor = '".$_REQUEST['book_author']."', BookURL = '".$_REQUEST['book_cover']."', BookDescription = '".$_REQUEST['book_description']."' WHERE BookID = " . $_GET['BookID'];

	if (mysqli_query($link, $sql)){
		Header("Location: view_books.php");
		Exit();
	}else{
		echo "Could not execute $sql. " . mysqli_error($link);
	}

	mysqli_close($link);
?>