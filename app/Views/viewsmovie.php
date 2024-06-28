<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form data</title>
</head>

<body>
    <form id="myForm" action="Movie_test" method="POST">
        <style>
            table,
            th,
            td {
                border: 1px solid black;
            }

            td {
                padding: 0;
            }

            #error {
                text-align: center;
                color: red;
                margin-top: 10px;
            }
        </style>
        <!-- Registration -->
        <table style="width:350px; margin:0 auto">
            <tr>
                <th>Label</th>
                <th>data</th>
            </tr>
            <tr>
                <td style="text-align:right">Username:</td>
                <td><input type="text" name="username" id="username" required></td>
            </tr>
            <tr>
                <td style="text-align:right">Password:</td>
                <td><input type="password" name="password" id="password" required></td>
            </tr>
            <tr>
                <td style="text-align:right">name:</td>
                <td><input type="text" name="name" id="name" required></td>
            </tr>
            <tr>
                <td style="text-align:right">lastname:</td>
                <td><input type="text" name="lastname" id="lastname" required></td>
            </tr>
            <tr>
                <td style="text-align:right">email:</td>
                <td><input type="email" name="email" id="email" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" id="submit"></td>
            </tr>
        </table>

        <br>

        <!-- login -->
        <!-- <table style="width:350px; margin:0 auto">
            <tr>
                <th>Label</th>
                <th>data</th>
            </tr>
            <tr>
                <td style="text-align:right">Username:</td>
                <td><input type="text" name="username" id="username" required></td>
            </tr>
            <tr>
                <td style="text-align:right">Password:</td>
                <td><input type="password" name="password" id="password" required></td>
            </tr>
            <td></td>
            <td><input type="submit" name="submit" id="submit"></td>
            </tr>
        </table> -->
    </form>
    <div id="error"></div>
</body>

</html>