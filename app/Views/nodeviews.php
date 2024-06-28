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
            for ($i = 0; $i < count($log); $i++) {
                $id = $log[$i]->id;
                $username = $log[$i]->username;
                $create_time = $log[$i]->create_time;
                echo "<tr>";
                echo "<td>" . $id . "</td>";
                echo "<td>" . $username . "</td>";
                echo "<td>" . $create_time . "</td>";
                echo "</tr>";
            }
            ?>
        </tr>
    </table>
</body>

</html>