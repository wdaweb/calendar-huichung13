<style>
.box{
    max-width: 800px;
    display: flex;
    flex-flow: row wrap;
    justify-content: center;
}
table{
    border-collapse: collapse;
    
}
table td{
    border: 1px solid #ccc;
    padding: 5px;
    text-align: center;
}
</style>
<body>

<h4>月曆練習</h4>
<div class="box">
    <form action="?" method='get'>
        年份：<input type="number" name="year" >
        <input type="submit" value="送出">
    </form>
<?php
if (isset($_get[$year])) {
    $year=$_get["$year"];
}else{
    $year=date("Y");
}

for ($m=1; $m <= 12; $m++) {    
?>


<table>
<tr><td colspan=7>月份：<?=$m;?></td></tr>  <!-- 簡短的插入變數 -->
<tr>
    <td>日</td>
    <td>一</td>
    <td>二</td>
    <td>三</td>
    <td>四</td>
    <td>五</td>
    <td>六</td>
</tr>
<?php
$firstDay="$year-$m-01";

$firstDayWeek=date("w", strtotime($firstDay));
$monthDays= date("t", strtotime($firstDay));

// echo "第一天星期：" . $firstDayWeek . "<br>";
// echo "月天數：" . $monthDays . "天";
for ($i=0; $i < 6; $i++) {
    echo "<tr>"; 
    for ($j=0; $j < 7; $j++) {
        if ($i==0 && $j<$firstDayWeek) {
            echo "<td>";
            echo "</td>";
        }else{
        echo "<td>";
        $num= $i*7+ $j+1- $firstDayWeek;
        if($num<=$monthDays){
            echo $num;
        }else{
            echo "　";
        }

        echo "</td>";
    }
}
    echo "</tr>";
}


?>
</table>
<?php
}
?>
</div>
</body>


<!-- <?php


echo '<table border= 1 solid>
<thead>
<tr>
<th>一</th>
for ($i=0; $i < 5; $i++) {
    echo "<tr>"; 
    for ($j=0; $j < 7; $j++) { 
        echo "<td>" . $i . "</td>";
    }
    echo "</td>";
}

echo </table>';
$starD= date("w", strtotime("2020-04-01"));
echo $starD;

?> -->