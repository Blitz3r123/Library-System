<html>
	<head>
		<title>Edit Books</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	</head>
	<body>
		<nav class="navbar navbar-default navbar-static-top">
		  <div class="container">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="view_books.php">Books</a>
		    </div>
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li><a href="view_books.php">View Books</a></li>
		        <li><a href="add_books.php">Add a Book</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div>
		</nav>
		
		<?php
			$link = mysqli_connect("localhost", "root", "1234", "islamunited");

			if ($link === false){
				die("ERROR: Could not connect. " . mysqli_connect_error());
			}
			$sql = "SELECT * FROM books WHERE BookID = " . $_GET['BookID'];

			if($result = mysqli_query($link, $sql)){
					$row = mysqli_fetch_array($result);
					$book_id = $row['BookID'];
					$book_title = $row['BookTitle'];
					$book_author = $row['BookAuthor'];
					$book_cover = $row['BookURL'];
					$book_description = $row['BookDescription'];
			}
			mysqli_close($link);
		?>

		<div class="container">
			<div class="page-header">
				<h1>Edit a Book</h1>
			</div>
			<form action="update.php?BookID=<?php echo $book_id;?>" method="post">
				<div class="form-group">
					<label for="book_title">Book Title</label>
					<input type="text" name="book_title" class="form-control" value="<?php echo $book_title ?>">
				</div>
				<div class="form-group">
					<label for="book_author">Author</label>
					<input type="text" name="book_author" class="form-control" value="<?php echo $book_author ?>">
				</div>
				<div class="form-group">
					<label for="book_cover">URL for Book Cover</label>
					<input type="text" name="book_cover" class="form-control" value="<?php echo $book_cover ?>">
				</div>
				<div class="form-group">
					<label for="book_description">Description</label>
					<textarea class="form-control" rows="3" name="book_description"><?php echo $book_description ?></textarea>
				</div>
				<input type="submit" value="Edit Book" style="float: right;" class="btn btn-primary">
			</form>
		</div>

		<script
			  src="https://code.jquery.com/jquery-3.2.1.js"
			  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
			  crossorigin="anonymous"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>