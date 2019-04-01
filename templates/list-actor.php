<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>List Actor</title>
</head>
<body>
	<h2>List Actor Pemain Kawakan</h2>
	<table border="1">
		<tr>
			<th>Nama Depan</th>
			<th>Nama Belakang</th>
		</tr>
		<?php foreach($data_actor as $actor): ?>
		<tr>
			<td><?=$actor['first_name']?></td>
			<td><?=$actor['last_name']?></td>
		</tr>
		<?php endforeach?>
	</table>
</body>
</html>