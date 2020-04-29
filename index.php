
   
<title>月曆製作</title>
    <style>
     body{
         display: flex;
         justify-content: center;
         align-items: center;
         background: linear-gradient(135deg, #E1DAE7, lightblue);
         
     }   
       
    
    .box{
        width: 600px;
        height: 300px;
        border-radius: 10px;
        background: white;
        box-shadow: 5px 5px 1rem #333;
        
    }
    table{
        width= 500px;
        border-collapse:collapse;
        margin:auto;
    }
    td{
        border-top:1px solid #999;
        text-align:center;
        padding:5px;
        font-family:Arial, Helvetica, sans-serif;
        font-size:16px;
    }
    
   
    tr:nth-of-type(1){
        background:yellow;
    }

   
    td:nth-of-type(1){
       
        color:red;
    }
    
    td:nth-last-child(1){
        
        color: green;
    }
    </style>

<div class="box">
<?php

    $month=date("m");

    if (isset($_GET["month"])) {
        $month=$_GET["month"];
    }
    ?>
<table>
<tr><td colspan='7'>
<?php 

echo "TODAY   " . date("d F ") . "<br>";

?>
<a href="index.php?month=<?=$month-1;?>">上一月</a>
<span>本月(<?=$month;?>)</span>
<a href="index.php?month=<?=$month+1;?>">下一月</a>


</td></tr>
<tr>
        <td>SUN</td>
        <td>MON</td>
        <td>TUE</td>
        <td>WED</td>
        <td>THU</td>
        <td>FRI</td>
        <td>SAT</td>
    </tr>
<?php

   
if ($month>12) {
    $month-12;
}
  $timecode=strtotime("2020-$month-01");
  $firstDay=date('Y-m-1',$timecode);
  $firstDayWeek=date("w",strtotime($firstDay));
  $days=date("t",strtotime($firstDay));
  
  $mdays=[];  
  for($i=0;$i<$days;$i++){
    $date=date("Y-m-d",strtotime("+$i days",$timecode)); 
    $mdays[$date]=date("d",strtotime("+$i days",$timecode)); 
  }
  
  $events=[
    "2020-1-1"=>"元旦",
    "2020-1-24"=>"除夕",
    "2020-1-25"=>"春節",
    "2020-2-28"=>"228紀念日",
    "2020-4-4"=>"兒童節",
    "2020-4-4"=>"掃墓節",  
    "2020-5-1"=>"勞動節",
    "2020-6-25"=>"端午節",
    "2020-10-1"=>"中秋節",
    "2020-10-10"=>"雙十節",
           ];
  
  for($i=1;$i<=6;$i++){
      echo "<tr>";
      for($j=1;$j<=7;$j++){
  
          
          $tmp=($i-1)*7+$j-$firstDayWeek-1;
          $cellDate=date("Y-m-d",strtotime("+$tmp days",$timecode));
          echo "<td>";

            

          
          if(!empty($mdays[$cellDate])){
            echo $mdays[$cellDate];
        }
          echo "</td>";
      }
      echo "</tr>";
  } 
?>
</table>
</div>