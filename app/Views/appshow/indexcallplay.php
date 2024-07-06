<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>CallPlay</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" href="<?= base_url('/callplay/TH/html/css/style.css') ?>">
    <style>
        .users-container {
            display: flex;
            justify-content: space-between;
            flex-direction: column;
            align-items: center;
        }

        .user-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin: 10px;
            position: relative;
        }

        .user-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 6px solid rgb(253 224 71);
            object-fit: cover;
            margin-bottom: 10px;
        }

        .user-number0 {
            position: absolute;
            bottom: 64px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgb(253 224 71);
            padding: 5px 10px;
            border-radius: 50%;
        }

        .user-number1 {
            position: absolute;
            bottom: 40%;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgb(148 163 184);
            padding: 5px 10px;
            border-radius: 50%;
        }

        .user-info {
            margin-bottom: 10px;
        }

        .user-info img {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
        }

        .sub_container_user-item0 {
            display: flex;
            justify-content: center;
        }

        .sub_container_user-item1 {
            display: flex;
            padding-top: 15px;
        }

        .user-item1,
        .user-item2 {
            padding: 10px 30px 10px 30px;
        }


        .user-details {
            margin-top: 10px;
        }

        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .wrapper {
            width: 100%;
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        table th,
        table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .hidden {
            display: none;
        }
    </style>

</head>

<body>

    <div class="wrapper">

        <div class="section1">

            <div class="pic-top"><img src="<?= base_url('/callplay/TH/html/images/pic-top.jpg') ?>" /></div>

            <div class="content">

                <h class="a2">
                    เติมคูปองครั้งแรกรับยศ LOVE HEART<br />

                </h>
                <br />

                <?php if (!empty($users)) : ?>
                    <div class="users-container">
                        <div class="sub_container_user-item0">
                            <div class="user-item user-item0">
                                <img class="user-img" src="<?php echo $users['more_data'][0]['user_logo']; ?>" alt="User Logo">
                                <span class="user-number0"><strong>1</strong></span>
                                <div class="user-details">
                                    <div><?php echo $users['more_data'][0]['user_id']; ?></div>
                                    <div><?php echo $users['more_data'][0]['user_name']; ?></div>
                                </div>
                            </div>
                        </div>

                        <div class="sub_container_user-item1">
                            <div class="user-item1">
                                <img class="user-img" src="<?php echo $users['more_data'][1]['user_logo']; ?>" alt="User Logo">
                                <span class="user-number1">2</span>
                                <div class="user-details">
                                    <div><?php echo $users['more_data'][1]['user_id']; ?></div>
                                    <div><?php echo $users['more_data'][1]['user_name']; ?></div>
                                </div>
                            </div>

                            <div class="user-item2">
                                <img class="user-img" src="<?php echo $users['more_data'][2]['user_logo']; ?>" alt="User Logo">
                                <span class="user-number">3</span>
                                <div class="user-details2">
                                    <div><?php echo $users['more_data'][2]['user_id']; ?></div>
                                    <div><?php echo $users['more_data'][2]['user_name']; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="mt-4">
                    <button id="toggleTableBtn" class="bg-pink-500 text-white px-4 py-2 rounded">ดูอันดับเพิ่มเติม</button>
                </div>

                <table id="userTable" class="hidden">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ข้อมูล</th>
                            <th>รางวัล</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($users['more_data'])) : ?>
                            <?php foreach ($users['more_data'] as $index => $user) : ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td>
                                        <div class="user-info">
                                            <img src="<?= htmlspecialchars($user['user_logo']) ?>" alt="User Logo">
                                            <div>
                                                <div><?= htmlspecialchars($user['user_id']) ?></div>
                                                <div><?= htmlspecialchars($user['user_name']) ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <?= number_format($user['count_gift']) ?><br>
                                        <?php if ($user['count_gift'] >= 100) : ?>
                                            <span class="reward">ได้รางวัล</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="3">ไม่มีข้อมูล</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <script>
                    document.getElementById('toggleTableBtn').addEventListener('click', function() {
                        var table = document.getElementById('userTable');
                        table.classList.toggle('hidden');
                    });
                </script>

                <h class="a1">ระยะเวลากิจกรรม
                </h>
                <br />
                <?php

                $group = $users['group'];
                // echo "<pre>";
                // print_r($group);
                ?>
                <h class="a2"><?php echo $group['th_lang']; ?>
                </h>
                <br />
                <?php echo DateThai($group['start_date']); ?> – <?php echo DateThai($group['end_date']); ?><br />
                <br />

                <h class="a2">รางวัลโปรโมชั่น
                </h>
                <br />

                <br />
                <img src="<?= base_url('/callplay/TH/html/images/01.png') ?>" />
                <br />
                <img src="<?= base_url('/callplay/TH/html/images/02.png') ?>" />
                <br />
                ยศพิเศษ Love Heart 15 วัน<br />
                เมื่อเติมคูปองขั้นต่ำ 5,000 คูปองขึ้นไป<br />
                <br />

                <h class="a1">เงื่อนไขกิจกรรม
                </h>
                <br />
                - ต้องเป็นไอดีที่ไม่เคยเติมเงินมาก่อน<br />
                - เติมเงินครั้งแรกในช่วงกิจกรรม 5,000 คูปอง ขึ้นไป (ไม่นับสะสม)<br />
                - จำกัด 1 ไอดีมีสิทธิ์ 1 ครั้ง<br />
                - ยศพิเศษกดรับได้หลังกิจกรรมจบ จนถึงวันที่ 15 ก.ค. 67 (23.59น.)<br />
                <br />

            </div><!-- /content -->

            <div class="note">
                <font size="+2">หมายเหตุ</font><br />
                - ต้องเติมเงินขั้นต่ำ 5,000 คูปอง ขึ้นไป<br />
                - ทีมงานขอสงวนสิทธิ์การเติมเงินผ่านช่องทาง Goldman<br />
                และแลกเปลี่ยน THC เป็นคูปองจะไม่สามารถเข้าร่วมโปรโมชั่นนี้ได้<br />
                หากไม่กดรับภายในเวลาดังกล่าวจะถือว่าสละสิทธิ์โดยทันที<br />
                - เวลาอ้างอิงตามเวลาของ Server เป็นหลัก<br />
                - การตัดสินของทีมงานถือเป็นที่สิ้นสุด<br />
                - ขอสงวนสิทธิ์ในการเปลี่ยนแปลงหากเกิดปัญหา<br />
                โดยไม่ต้องแจ้งให้ทราบล่วงหน้า<br />
                - กิจกรรมใดที่จัดอยู่ในช่วงเวลาปิดเซิร์ฟเวอร์หรือเหตุใดๆที่<br />
                ทำให้ไม่สามารถออนไลน์ได้จะยึดเวลาจบกิจกรรมตามเดิม<br />
                <br />

            </div><!-- /note -->

            <div class="foot">WinNine Pacific Pty Ltd Level 20, Zenith Center, 821 Pacific Hwy, Chatswood NSW 2067 Australia</div>

        </div><!-- /section1 -->

    </div><!-- /wrapper -->

</body>

</html>

<?php

function DateThai($strDate)
{
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");


    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear $strHour:$strMinute";
    //return "$strMonthThai $strYear";
}


function DateEng($strDate)
{
    $strYear = date("Y", strtotime($strDate));
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $time = date("A", strtotime($strDate));
    $dateObj   = DateTime::createFromFormat('!m', $strMonth);

    $monthName = $dateObj->format('F');

    return "$strDay $monthName  $strYear  ( $strHour:$strMinute $time)";
}

?>