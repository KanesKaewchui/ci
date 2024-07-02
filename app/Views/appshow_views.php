<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body class="bg-red-300 flex-col justify-center items-start h-screen p-0 m-0">
    <div class="flex justify-center items-center w-full">
        <img class="w-2/5 mt-0" src="https://callplay.in.th/manual_info/2024/07/event_item_116/en/images/pic-top.jpg" alt="Header Image">
    </div>
    <div class="flex justify-center items-center">
        <img class="w-2/5 mt-0" src="https://callplay.in.th/manual_info/2024/07/event_item_116/en/images/pic-top.jpg" alt="Header Image">
    </div>
    <div class="flex justify-center items-center relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-black ">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ข้อมูล user</th>
                    <th>เวลาที่อัพเดทล่าสุด</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?php echo $user['user_id']; ?></td>
                        <td><?php echo $user['user_name']; ?></td>
                        <td><img src="<?php echo $user['user_logo']; ?>" alt="User Logo"></td>
                        <td><?php echo $user['updatetime']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>