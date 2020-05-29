<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/2d0f11d24e.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;400&display=swap');
body{
    font-family: 'Noto Sans TC', sans-serif;
}

table th a, a:hover{
    font-size: 3rem;
    color: white;
    text-decoration: none;
}
table td{
    width: 14%;
}
</style>

</head>

<body class="alert-warning">
    <?php

    $month = date("m");
    $year = date("Y");


    if (isset($_GET["month"])) {
        $month = $_GET["month"];
    }
    if (isset($_GET["year"])) {
        $year = $_GET["year"];
    }

    $timecode = strtotime("Y-m-01");
    $firstDay = date("$year-$month-1", $timecode);
    // 當月一號星期幾
    $firstDayWeek = date("w", strtotime($firstDay));
    //一個月有幾天
    $monthdays = date("t", strtotime($firstDay));

    // echo "<a href='index.php'>" . $year . "-" . $month . "</a>";
    if ($month >= 12) {
        $nextm = 1;
        $nexty = $year + 1;
    } else {
        $nextm = $month + 1;
        $nexty = $year;
    }
    if ($month <= 1) {
        $prem = 12;
        $prey = $year - 1;
    } else {
        $prem = $month - 1;
        $prey = $year;
    }



    ?>
    <div class="container">
    <table class="table table-sm table-light text-center col-md-8">
<thead>
    <tr class="bg-warning">
            <th colspan='7' class="color-light">
               
                
                <a class="float-left px-5" href="index.php?month=<?= $prem; ?>&year=<?= $prey; ?>"><i class="fas fa-chevron-left"></i></a>
               
                <span><a title="back to Today" href='index.php'><?= $month , $year; ?></a></span>
                <a class="float-right px-5" href="index.php?month=<?= $nextm; ?>&year=<?= $nexty; ?>"><i class="fas fa-chevron-right"></i></a>
</th>
            </tr>
            <tr style="color:#ffc107;">
                <td>SUN</td>
                <td>MON</td>
                <td>TUE</td>
                <td>WED</td>
                <td>THU</td>
                <td>FRI</td>
                <td>SAT</td>
            </tr>

            <?php

            $events = [

                "1-1" => "元旦",

                "2-28" => "和平紀念日",
                "4-4" => "兒童節",

                "5-1" => "勞動節",
                "6-25" => "端午節",
                "10-1" => "中秋節",
                "10-10" => "雙十節",
            ];


            $weeks = ceil(($firstDayWeek + $monthdays) / 7);
            for ($i = 1; $i <= $weeks; $i++) {
                echo "<tr>";
                for ($j = 1; $j < 8; $j++) {
                    $dayStr = (($i - 1) * 7 + $j) - $firstDayWeek;

                    $tmpDay = date("$year-$month-$dayStr", strtotime("now"));
                    $eventDate = date("n-j", strtotime($tmpDay));

                    if (!empty($events[$eventDate])) {
                        $meg = $events[$eventDate];
                    } else {
                        $meg = "　";
                    }


                    if ($i == 1) {
                        if ($dayStr > 0) {
                            echo "<td> $dayStr <br> $meg </td>";
                        } else {
                            echo "<td></td>";
                        }
                    } else {

                        if ($dayStr <= $monthdays) {
                            echo "<td> $dayStr <br> $meg </td>";
                        } else {
                            echo "<td></td>";
                        }
                    }
                }
                echo  "</tr>";
            }

            ?>

        </table>
    </div>
</body>

</html>