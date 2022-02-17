<?php
	include('Process/db/connect.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Landing Page</title>

	</head>
	<body>
		<?php
			$sql_search_suggestions = "select * from hanghoa where TenHH like '%".$search."%'";
			$result = $con -> query($sql_search_suggestions);


		?>	
		<input id="inputSuggest" placeholder="Enter some text" name="name" />
		<p id="values"></p>
	</body>
	<script type="text/javascript" src="main.js"></script>
</html>