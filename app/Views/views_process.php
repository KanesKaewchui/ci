<?php
    $datainfo = $views_process;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table style="width:350px; margin:0 auto">
            <th>Label</th>
            <th>data</th>
            <tr>
                <td style="text-align:right">Username:</td>
                <td><?php echo $datainfo['username'];?></td>

            </tr>    
            <tr>
                <td style="text-align:right">Name:</td>
                <td><?php echo $datainfo['name'];?></td>
            </tr>
            <tr>
                <td style="text-align:right">Last Name:</td>
                <td><?php echo $datainfo['lastname']?></td>
            </tr>
            <tr>
                <td style="text-align:right">Number: </td>
                <td><?php echo $datainfo['number']?></td>
            </tr>
            <tr>
                <td style="text-align:right">Email:</td>
                <td><?php echo $datainfo['email']?></td>
            </tr>
            <tr>
                <td style="text-align:right">Account:</td>
                <td><?php echo $datainfo['account']?></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="button" onclick="window.location.href='check'">back</button></td>
            </tr>
        </table>
</body>
</html>