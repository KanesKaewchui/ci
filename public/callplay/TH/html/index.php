<?php

class Api
{
    protected $mydev_model;

    public function __construct()
    {
        $this->mydev_model = new Mydev_model();
    }

    public function insert()
    {
        $sql = 'DELETE FROM event_detail WHERE event_id = 1';
        $this->mydev_model->execute($sql);

        $url = 'https://takeme.la/manual_info/list_rank_training/';
        $response = $this->getApiData($url);

        if (!$response) {
            die('Error: Unable to fetch data from API');
        }

        $insertedData = [];
        $event_id = 1;

        foreach ($response['more_data'] as $data) {
            $sql = "INSERT INTO event_detail (event_id, user_id, user_name, user_logo, count_gift, updatetime) 
                    VALUES (?, ?, ?, ?, ?, NOW())";
            $this->mydev_model->execute($sql, [
                $event_id,
                $data['user_id'],
                $data['user_name'],
                $data['user_logo'],
                $data['count_gift']
            ]);

            $insertedData[] = [
                'user_id' => $data['user_id'],
                'user_name' => $data['user_name'],
                'user_logo' => $data['user_logo'],
                'count_gift' => $data['count_gift'],
            ];
        }

        return json_encode([
            'code' => '101',
            'msg' => 'success',
            'more_data' => $insertedData,
        ]);
    }

    protected function getApiData($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return json_decode($output, true);
    }
}

$api = new Api();
$response = $api->insert();
echo $response;
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>CallPlay</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" href="css/style.css">
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

            <div class="pic-top"><img src="images/pic-top.jpg" /></div>

            <div class="content">

                <h class="a2">
                    เติมคูปองครั้งแรกรับยศ LOVE HEART<br />

                </h>
                <br />

                <?php if (!empty($users)) : ?>
                    <div class="users-container">
                        <div class="sub_container_user-item0">
                            <div class="user-item user-item0">
                                <img class="user-img" src="<?php echo $users[0]['user_logo']; ?>" alt="User Logo">
                                <span class="user-number0"><strong>1</strong></span>
                                <div class="user-details">
                                    <div><?php echo $users[0]['user_id']; ?></div>
                                    <div><?php echo $users[0]['user_name']; ?></div>
                                </div>
                            </div>
                        </div>

                        <div class="sub_container_user-item1">
                            <div class="user-item1">
                                <img class="user-img" src="<?php echo $users[1]['user_logo']; ?>" alt="User Logo">
                                <span class="user-number1">2</span>
                                <div class="user-details">
                                    <div><?php echo $users[1]['user_id']; ?></div>
                                    <div><?php echo $users[1]['user_name']; ?></div>
                                </div>
                            </div>

                            <div class="user-item2">
                                <img class="user-img" src="<?php echo $users[2]['user_logo']; ?>" alt="User Logo">
                                <span class="user-number">3</span>
                                <div class="user-details2">
                                    <div><?php echo $users[2]['user_id']; ?></div>
                                    <div><?php echo $users[2]['user_name']; ?></div>
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
                        <?php if (!empty($users)) : ?>
                            <?php foreach ($users as $index => $user) : ?>
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
                3 ก.ค. 67 เวลา 10.00 น. – 12 ก.ค. 67 เวลา 23.59 น.<br />
                <br />

                <h class="a2">รางวัลโปรโมชั่น
                </h>
                <br />

                <br />
                <img src="images/01.png" />
                <br />
                <img src="images/02.png" />
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