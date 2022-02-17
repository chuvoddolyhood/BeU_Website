<?php
	include("../../Process/db/connect.php");

	$sql_search_suggestions = "select * from hanghoa where TenHH like '%".$search."%'";
	// echo $sql_search_suggestions;
	$result = $con -> query($sql_search_suggestions);
?>
<?php	
	echo '<h3 class="header__search-suggestions-heading">Gợi ý tìm kiếm</h3>';
	echo '<ul id="header__search-suggestions-list" class="header__search-suggestions-list">';
	while($row_get_suggestions = $result->fetch_assoc()){
		$productId = $row_get_suggestions['MSHH'];
		echo '<li id="header__search-suggestions-item" class="header__search-suggestions-item">';
		echo '	<a href="?quanly=chitietsp&id='.$productId.'">';
		echo '		<span class="header__search-suggestions-label">'.$row_get_suggestions['TenHH'].' </span>';
		echo '	</a>';
		echo '</li>';
	}
	echo '</ul>';
?>
</ul>