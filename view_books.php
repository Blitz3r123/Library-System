<html>
	<head>
		<title>Books</title>
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

		<div class="container">
				<?php
					$link = mysqli_connect("localhost", "root", "1234", "islamunited");

					if ($link === false){
						die("ERROR: Could not connect. " . mysqli_connect_error());
					}

					$sql = "SELECT * FROM books";
					if($result = mysqli_query($link, $sql)){
						if(mysqli_num_rows($result) > 0){
							while($row = mysqli_fetch_array($result)){
								echo "<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12' style='text-align: center;'>
							<div class='thumbnail'>
								<img src='" .$row['BookURL']. "' alt='Book Cover'>
								<div class='caption'>
									<h3>".$row['BookTitle']."</h3>
									<h4>By ".$row['BookAuthor']."</h4>
									<p>".$row['BookDescription']."</p>
									<p><a href='edit_book.php?BookID=".$row['BookID']."' class='btn btn-primary'>Edit</a> <a href='delete_book.php?BookID=".$row['BookID']."' class='btn btn-danger'>Delete</a></p>
								</div>
							</div>
						</div>";
							}
						}else{
							echo "<p>No Books Found.</p>";
							echo "<a class='btn btn-success' href='add_books.php'>Want to add a book?</a>";
						}
					}
					mysqli_close($link);
				?>
		</div>



		<script
			  src="https://code.jquery.com/jquery-3.2.1.js"
			  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
			  crossorigin="anonymous"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>