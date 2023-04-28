<?php
include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tableau de bord des utilisateurs</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		tr:hover {
			background-color: #f5f5f5;
		}
		input[type=submit] {
			background-color: #4CAF50;
			border: none;
			color: white;
			padding: 10px 20px;
			text-decoration: none;
			margin: 4px 2px;
			cursor: pointer;
			border-radius: 4px;
		}
		input[type=submit]:hover {
			background-color: #45a049;
		}
	</style>
</head>
<body>
	<h1>Tableau de bord des utilisateurs</h1>
	<?php
        $sql = "SELECT * FROM admin_page";
         $result = $conn->query($sql);
        if($result->num_rows > 0){

        
        
	echo '<table>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Cr_data</th>
			<th>Statut</th>
			<th>Action</th>
		</tr>';
		while($row = $result->fetch_assoc()){
			if($row['status']==0){
				$status="Inactive";
			}else{
				$status="active";
			}
		echo '<tr>';
			echo'<td>'.$row['id'].'</td>';
			echo'<td>'.$row['name'].'</td>';
			echo'<td>'.$row['email'].'</td>';
			echo'<td>'.$row['cr_date'].'</td>';
			
			echo'<td>'.$status.'</td>';
			echo '<td><form action="update_status.php" method="POST"> <input type="hidden" name="id" value='. $row["id"] .'><button type="submit"  name="edit" value="edit">update status</button></form></td>';

			echo'</tr>';
		}

	echo '</table>';

	}
	?>
</body>
</html>
