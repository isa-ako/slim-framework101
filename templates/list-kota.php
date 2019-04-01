<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>List Actor</title>
</head>
<body>
	<h2>Daftar Kota</h2>
	<table border="1">
		<tr>
			<th>id</th>
			<th>Nama Kota</th>
			<th>Nama Negara</th>
		</tr>
		<?php foreach($kota as $value): ?>
		<tr>
			<td><?= $value['city_id'] ?></td>
			<td><?= $value['city'] ?></td>
			<td><?= $value['country'] ?></td>
		</tr>
		<?php endforeach ?>
	</table>
</body>
</html>