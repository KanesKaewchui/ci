<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <th>
                ID
            </th>
            <th>
                Username
            </th>
            <th>
                Create Time
            </th>
        </tr>
        <tr>
            <?php
            foreach ($log->data as $data) {
                echo "<tr>";
                echo "<td>" . $data->id . "</td>";
                echo "<td>" . $data->username . "</td>";
                echo "<td>" . $data->create_time . "</td>";
                echo "</tr>";
            }
            ?>
        </tr>
    </table>
</body>

</html>