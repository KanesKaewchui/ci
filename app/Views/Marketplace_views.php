<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>login</title>
</head>

<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="w-full max-w-xs">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    username
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="username">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    password
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="password">
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                    login
                </button>
            </div>
        </form>
    </div>

    <script>
        function login() {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            fetch('', {
                    method: 'POST',
                    headers: {
                        'Content-Type': ''
                    },
                    body: `username=${username}&password=${password}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.token) {
                        Swal.fire({
                            title: 'succeed',
                            text: 'Login successful!',
                            icon: 'success',
                            confirmButtonText: 'agree'
                        });
                    } else {
                        Swal.fire({
                            title: 'error',
                            text: 'username or password is not correct',
                            icon: 'error',
                            confirmButtonText: 'agree'
                        });
                    }
                });
        }
    </script>
</body>

</html>