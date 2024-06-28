<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form data</title>
</head>

<body>
    <form id="myForm" action="process_views" method="POST">
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
                <td style="text-align:right">Confirm Password:</td>
                <td><input type="password" name="confirmpassword" id="confirmpassword" required></td>
            </tr>
            <tr>
                <td style="text-align:right">Name:</td>
                <td> <input type="text" name="name" id="name" required></td>
            </tr>
            <tr>
                <td style="text-align:right">Last Name:</td>
                <td><input type="text" name="lastname" id="lastname" required></td>
            </tr>
            <tr>
                <td style="text-align:right">Number: </td>
                <td><input type="number" name="number" id="number" required></td>
            </tr>
            <tr>
                <td style="text-align:right">Email:</td>
                <td><input type="email" name="email" id="email" required></td>
            </tr>
            <tr>
                <td style="text-align:right">Account:</td>
                <td><input type="number" name="account" id="account" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" id="submit"></td>
            </tr>
        </table>
    </form>
    <div id="error"></div>
</body>

</html>