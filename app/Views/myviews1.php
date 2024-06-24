<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form_day8</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="bg-gray-100">
    <?php if (isset($_SESSION['userid'])) { ?>
        <?php
        echo "UserID : " . ($userid);
        echo "<br>";
        echo "Cash : " . ($cash);
        echo "<br>";
        echo "Game : " . ($gamename);
        ?>
        <!--Add rewards-->

        <!-- Logout Form -->
        <form action="/test/logout" method="post" class="mt-4">
            <button id="LogoutButton" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Logout
            </button>
        </form>
    <?php } else { ?>
        <div id="form" class="flex items-center justify-center min-h-screen space-x-8">
            <!-- Login Form -->
            <div class="w-full max-w-xs">
                <form id="loginForm" action="/test/login" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <h2 class="mb-4 text-xl font-bold text-gray-700">Login</h2>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="LoginUsername">
                            Username
                        </label>
                        <input id="LoginUsername" name="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Username" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="LoginPassword">
                            Password
                        </label>
                        <input id="LoginPassword" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" placeholder="Password" required>
                    </div>
                    <div class="flex items-center justify-between">
                        <button id="LoginButton" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Login
                        </button>
                    </div>
                </form>
            </div>
            <!-- Registration Form -->
            <div class="w-full max-w-xs">
                <form id="registerForm" action="/test/register" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <h2 class="mb-4 text-xl font-bold text-gray-700">Register</h2>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="Username">
                            Username
                        </label>
                        <input id="Username" name="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Username" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="Password">
                            Password
                        </label>
                        <input id="Password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" placeholder="Password" required>
                    </div>
                    <div class="flex items-center justify-between">
                        <button id="RegisterButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    <?php } ?>

    <div id="loginResult" class="mt-8 text-center text-xl"></div>

    <script>
        $(document).ready(function() {
            $('#loginForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '/test/login',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#form').css("display", "none");
                        $('#loginResult').html(response);
                    },
                    error: function(xhr, status, error) {
                        $('#loginResult').text('An error occurred: ' + xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>

</html>