<?php
    $views = $data_usre;
    // print_r($views); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        table, th, td {
            border: 1px solid black;
        }
        td {
            padding: 0;
        }
        </style>
    <table>
        <tr>
            <th>ลำดับ</th>
            <th>username</th>
            <th>name</th>
            <th>lastname</th>
            <th>email</th>
            <th>เลขปชช</th>
            <th>เบอร์</th>
            <th>เวลาสร้าง</th>
            <th>สถานะ</th>
        </tr>
        <?php
            if(count($views)){
                for ($i=0; $i < count($views); $i++) { 
                    ?>       
        <tr>
            <td><?php echo $i + 1;?></td>
            <td><?php echo $views[$i]->username;?></td>
            <td><?php echo $views[$i]->fname;?></th>
            <td><?php echo $views[$i]->lname;?></th>
            <td><?php echo $views[$i]->email;?></th>
            <td><?php echo $views[$i]->id_card;?></th>
            <td><?php echo $views[$i]->phone_number;?></th>
            <td><?php echo $views[$i]->create_time;?></th>
            <td><?php
             if($views[$i]->status == 1 ){
                echo "active";
             } else {
                echo "inactive";
             }
             ?></th>
        </tr>
        <?php
                }
            }
        ?>
    </table>
<body>
