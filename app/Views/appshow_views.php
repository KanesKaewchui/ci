<?php
function DateThai($strDate)
{
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = array(
        "",
        "มกราคม",
        "กุมภาพันธ์",
        "มีนาคม",
        "เมษายน",
        "พฤษภาคม",
        "มิถุนายน",
        "กรกฎาคม",
        "สิงหาคม",
        "กันยายน",
        "ตุลาคม",
        "พฤศจิกายน",
        "ธันวาคม"
    );

    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear $strHour:$strMinute";
}

$top_users = array_slice($users, 0, 30);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body class="bg-pink-600 flex-col justify-center items-start h-screen p-0 m-0">
    <div class="bg-pink-200 w-3/5 mx-auto">
        <div class="flex justify-center items-center w-full">
            <img class="w-auto mt-0" src="https://callplay.in.th/manual_info/2024/07/event_item_116/en/images/pic-top.jpg" alt="Header Image">
        </div>

        <div class="flex flex-col items-center">
            <div class="flex flex-col items-center mt-6 relative">
                <img class="rounded-full w-48 h-48 mb-2 shadow-lg border-8 border-yellow-400" src="<?php echo $users[0]['user_logo']; ?>" alt="User Logo">
                <span class="absolute bottom-14 bg-yellow-400 rounded-full w-7 h-7 text-center">1</span>
                <div class="text-center">
                    <div><?php echo $users[0]['user_id']; ?></div>
                    <div><?php echo $users[0]['user_name']; ?></div>
                </div>
            </div>

            <div class="flex justify-center gap-24 w-full max-w-3xl mx-auto px-10 py-5 ">
                <div class="flex flex-col items-center relative">
                    <img class="rounded-full w-48 h-48 mb-2 shadow-lg border-8 border-gray-400" src="<?php echo $users[1]['user_logo']; ?>" alt="User Logo">
                    <span class="absolute bottom-14 bg-gray-400 rounded-full w-7 h-7 text-center">2</span>
                    <div class="text-center">
                        <div><?php echo $users[1]['user_id']; ?></div>
                        <div><?php echo $users[1]['user_name']; ?></div>
                    </div>
                </div>

                <div class="flex flex-col items-center relative">
                    <img class="rounded-full w-48 h-48 mb-2 shadow-lg border-8" style="border-color: #C06020;" src="<?php echo $users[2]['user_logo']; ?>" alt="User Logo">
                    <span class="absolute bottom-14 rounded-full w-7 h-7 text-center" style="background: #C06020;">3</span>
                    <div class="text-center">
                        <div><?php echo $users[2]['user_id']; ?></div>
                        <div><?php echo $users[2]['user_name']; ?></div>
                    </div>
                </div>
            </div>
            <button id="toggleTableBtn" class="bg-pink-500 text-white px-4 py-2 rounded">ดูอันดับเพิ่มเติม</button>
        </div>


        <div id="userTable" class="flex justify-center items-center relative overflow-x-auto hidden mt-5">
            <table class="w-full text-sm text-center rtl:text-right text-black">
                <thead>
                    <tr class="bg-pink-400">
                        <th class="px-4 py-2">ลำดับ</th>
                        <th class="px-4 py-2">ข้อมูล user</th>
                        <th class="px-4 py-2">เวลาที่อัพเดทล่าสุด</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1; ?>
                    <?php foreach ($top_users as $user) : ?>
                        <tr class="<?php echo $index % 2 == 0 ? 'bg-pink-200' : 'bg-pink-100'; ?>">
                            <td class="border px-4 py-2"><?php echo $index++; ?></td>
                            <td class="border px-4 py-2 flex items-center justify-center">
                                <div class="flex flex-col items-center">
                                    <img class="rounded-md w-28 h-28 mb-2 shadow-lg" src="<?php echo $user['user_logo']; ?>" alt="User Logo">
                                    <div class="text-center">
                                        <div><?php echo $user['user_id']; ?></div>
                                        <div><?php echo $user['user_name']; ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="border px-4 py-2"><?php echo DateThai($user['updatetime']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        document.getElementById('toggleTableBtn').addEventListener('click', function() {
            var table = document.getElementById('userTable');
            table.classList.toggle('hidden');
        });
    </script>
</body>

</html>