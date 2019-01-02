<?php
	require "connection_db.php";
	function getbrands(){
		global $con;
		$getbrandQuery = "select * from brands";
		$result = mysqli_query($con,$getbrandQuery);
		while($row = mysqli_fetch_assoc($result)){
			$title = $row['b_title'];
			$id = $row['b_id'];
			echo "<li> <a class='nav-link' href='#'>$title</a> </li>";
		}
	}
?>