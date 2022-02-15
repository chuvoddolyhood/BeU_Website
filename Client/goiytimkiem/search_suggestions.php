<ul class="header__search-suggestions-list">
<?php
if(isset($_SESSION['login'])){
	$sql_search_suggestions = "select * from hanghoa where TenHH like '%".$search."%'";
	$result = $con -> query($sql_search_suggestions);				
	while($row_get_suggestions = $result->fetch_assoc()){
?>
		<li class="header__search-suggestions-item">
			<a href="">
				<?php echo $row_get_suggestions['TenHH']; ?>
			</a>
		</li>
		<?php
	}
}
?>
</ul>