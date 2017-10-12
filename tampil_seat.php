<?php 
	require "config/database.php";

	$query = "SELECT * FROM seat";

	$result = $mysqli->query($query);
	$num_rows = $result->num_rows;

	if ($num_rows > 0) {
		$table = "<table width=500 border='1'>";
			$table .= "<tr>";
				$table .= "<th>User Id</th>";
				$table .= "<th>Number</th>";
			$table .= "</tr>";
			while ($data = $result->fetch_assoc()) {
				extract($data);
				//echo data['userid'];
				$table .= "<tr>";
					$table .= "<td>{$userid}</td>";
					$table .= "<td>{$number}</td>";
				$table .= "</tr>";

			}
		$table .= "</table>";
		echo $table;
	}else{

	}
	//print_r($num_rows);
?>