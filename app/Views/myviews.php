<?php
$register = $register_data;

?>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#submit").click(function() {
                chk_empty();
            });

            function chk_empty() {
                var username = $("#username").val();
                var password = $("#password").val();
                var confirmpassword = $("#confirmpassword").val();
                var name = $("#name").val();
                var lastname = $("#lastname").val();
                var number = $("#number").val();
                var email = $("#email").val();
                var account = $("#account").val();
                var error = $("#error");

                if (username == "") {
                    error.html("Input username is null");
                    $("#username").focus();
                    return false;
                } else {
                    if (!/^[a-zA-Z0-9]{4,12}$/.test(username)) {
                        error.html("username is wrong");
                        return false;
                    }
                }
                if (password == "") {
                    error.html("Input password is null")
                    $("#password").focus();
                    return false;
                }
                if (password != confirmpassword) {
                    error.html("Passwords do not match")
                    $("#password").focus();
                    return false;
                }
                if (name == "") {
                    error.html("Input name is null");
                    $("#name").focus();
                    return false;
                } else {
                    if (!/^[a-zA-Z0-9]{4,12}$/.test(name)) {
                        error.html("name is wrong");
                        return false;
                    }
                }
                if (lastname == "") {
                    error.html("Input lastname in null");
                    $("#lastname").focus();
                    return false;
                }
                if (number == "") {
                    error.html("Input number in null");
                    $("#number").focus();
                    return false;
                }
                if (email == "") {
                    error.html("Input email is nill");
                    $("#email").foucs();
                    return false;
                }
                if (account == "") {
                    error.html("Input account is null");
                    $("#account").focus();
                    return false;
                }
            }
        });
    </script>
</body>

</html>