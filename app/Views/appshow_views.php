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

    <div class="flex justify-center items-center relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-black ">
            <thead>
                <tr>
                    <th class="px-4 py-2">ลำดับ</th>
                    <th class="px-4 py-2">ข้อมูล user</th>
                    <th class="px-4 py-2">เวลาที่อัพเดทล่าสุด</th>
                </tr>
            </thead>
            <tbody>
                <?php $index = 1; ?>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td class="border px-4 py-2"><?php echo $index++; ?></td>
                        <td class="border px-4 py-2">
                            <div class="flex items-center">
                                <img class="rounded-md w-16 h-16" src="<?php echo $user['user_logo']; ?>" alt="User Logo">
                                <span class="ml-2"><?php echo $user['user_id']; ?></span>
                                <span class="ml-2"><?php echo $user['user_name']; ?></span>
                            </div>
                        </td>
                        <td class="border px-4 py-2"><?php echo $user['updatetime']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>