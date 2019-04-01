<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Input &amp; Edit Kota</title>
</head>
<body>
    <h2>Form Input &amp; Edit Kota</h2>

    <form action="" method="POST">
        <input type="hidden" name="act" value="<?= $act ?>">
        <table>
            <tr>
                <th>Nama Kota</th>
                <td><input type="text" name="city" value="<?= @$city['city'] ?>"></td>
            </tr>
            <tr>
                <th>Negara</th>
                <td>
                    <select name="country_id">
                        <option value="0">- pilih negara -</option>
                        <?php foreach($data_country as $row): ?>
                        <option value="<?= $row['country_id'] ?>"
                            <?= $row['country_id']==@$city['country_id'] ? 'selected' : '' ?>
                        >
                            <?= $row['country'] ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="simpan" value="simpan"></td>
            </tr>
        </table>
    </form>
</body>
</html>