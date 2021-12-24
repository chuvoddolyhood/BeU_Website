<?php
	session_start();
	include('Process/db/connect.php');
?>

<?php

$id=$_SESSION['id'];
$kq_search=$_GET['kq'];
if(isset($_SESSION['login'])){

	$sql_search_suggestions = "select * from hanghoa where (TenHH like '%".$kq_search."%')";
	$result = $con->query($sql);

	echo "<div class="header__search-suggestions">";
		echo "<li class="header__search-suggestions-item">";
			while($row_get_suggestions = $result->fetch_assoc()){
				echo " <a> ".$row['TenHH']." </a> ";
	}
		echo "</li>";
	echo "</div>";
}
?>