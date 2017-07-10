<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- BASIC INFO (title, keywords, description) -->
  <title>My to-do List [FINAL]</title>

  <!-- LIBRARIES CSS -->
  <link href=".\css\bootstrap.css" rel="stylesheet">
  <link href=".\css\bootstrap-theme.css" rel="stylesheet">
  <link href=".\style.css" rel="stylesheet">
  <!-- FONTS -->

</head>
<body>
	<div class="container">
		<!--This is where you can add your new to-do-->
		<div id="addNew" class="header">
			<h2>My To Do List [FINAL]</h2>
			<form action="AddItem2.php" method="post">
				<div class="form-group">
				<label for="title">Title</label>
				<input type="text" class="form-control" name="title" id="title" placeholder="Title..."><br>
				</div>

				<div class="form-group">
				<label for="description">Description</label>
				<textarea name="description" class="form-control" id="description" rows="10" cols="35" placeholder="Description..."></textarea><br>
				</div>

				<button type="submit" name="addEntry" id="addEntry">Add</button>
			</form>
		</div> <!--end addNew div-->

		<!-- Your to-do list retrieved from database-->
		<div id="todolist">
			<ul id="myUL">
				<?php
			        require 'connect-to-db.php';
			        $db = new Db();
			        $query = "SELECT * FROM todo ORDER BY id asc";
			        $results = $db->mysql->query($query);

			        if($results->num_rows){
			         	while($row = $results->fetch_object() /*retrieve item from database*/){
				            $title = $row->title;
				            $description = $row->description;
				            $id = $row->id;
				            echo '<li class="item">';
				            $data = <<<EOD
<h3> $title </h3>
<p> $description </p>
<input type ="hidden" name="id" id="id" value="$id">
<div class="options">
	<button id="close" class="btn btn-danger"><a class="deleteEntryAnchor" href=".\delete.php?id=$id">&times</a></button>
</div>
EOD;

							echo $data;
							echo '</li>'; //end item class
          				} //end while
        			} else{
          				echo "<p>There are zero items. Add one now! </p>";
        			}
      			?>
			</ul>
		</div>
	</div> <!--end container-->

  <!-- JQUERY-->
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.0.min.js"></script>

  <!--COMPILED AND MINIFIED JAVASCRIPT-->
  <script src=".\js\bootstrap.min.js"></script> 
  <script src=".\script3.js"></script>
  <!--<script src=".\script4.js"></script>-->
</body>
</html>