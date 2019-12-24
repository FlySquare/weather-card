<!DOCTYPE html>
<?php
$city = "yalova";
$site = file_get_contents("https://www.havadurumu15gunluk.xyz/havadurumu/1376/$city-hava-durumu-15-gunluk.html");
$site2 = file_get_contents("http://takvim.ufgu.com");
$site3 = file_get_contents("https://www.havadurumu.com.tr/havadurumu/$city-hava-durumu");
preg_match_all('@<span class="report-C">(.*?)</span>@si', $site, $name);
$namecikti = implode("p", $name[1]);
$namedizi = explode ("p",$namecikti);
preg_match_all('@<div class="right" style="text-align: center; width: 100px; padding: 5 10 10 10px;">(.*?)</div>@si', $site3, $status);
$statuscikti = implode("p", $status[1]);
$statusdizi = explode ("p",$statuscikti);
preg_match_all('@<span class="report-il">(.*?)</span>@si', $site, $il);
$ilcikti = implode("p", $il[1]);
$ildizi = explode ("p",$ilcikti);
preg_match_all('@<div class="bugun_ne">(.*?)</div>@si', $site2, $time);
$timecikti = implode("p", $time[1]);
$timedizi = explode ("p",$timecikti);
$timeuzun = $timedizi[0];
$dizi = explode (",",$timeuzun);
preg_match_all('@<b>(.*?)</b>@si', $site, $nem);
$nemcikti = implode("p", $nem[1]);
$nemdizi = explode ("p",$nemcikti);
preg_match_all('@<li class="weather15h">(.*?)</li>@si', $site, $day1);
$day1cikti = implode("p", $day1[1]);
$day1dizi = explode ("p",$day1cikti);
$metin = $day1dizi[0];
$day1 = explode (" ",$metin);
$day2 = explode (" ",$day1dizi[6]);
$day3 = explode (" ",$day1dizi[12]);

$metin = $statusdizi[3];

$dizri = explode ("<br />",$metin);

?>


<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Online Hava Durumu Kartı</title>
  <script src="https://unpkg.com/feather-icons"></script><link rel="stylesheet" href="./style.css">
  <script src="https://kit.fontawesome.com/2345f97192.js" crossorigin="anonymous"></script>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
  <div class="weather-side">
    <div class="weather-gradient"></div>
    <div class="date-container">
      <h2 class="date-dayname"><?php echo $dizi[1];?></h2><span class="date-day"><?php echo $dizi[0];?></span><i class="location-icon" data-feather="map-pin"></i><span class="location"><?php echo $ildizi[0]; ?></span>
    </div>
    <div class="weather-container">
      <?php 
        if(strstr($dizri[1], "ağmur")){
          echo '<i class="fas fa-cloud-rain fa-4x"></i>';
        }if(strstr($dizri[1], "ulut")){
          echo '<i class="fas fa-cloud fa-4x"></i>';
        }if(strstr($dizri[1], "kar")){
          echo '<i class="far fa-snowflake fa-4x"></i>';
        }if(strstr($dizri[1], "isli")){
          echo '<i class="fas fa-smog fa-4x"></i>';
        }if(strstr($dizri[1], "üneş")){
          echo '<i class="fas fa-sun fa-4x"></i>';
        }
        




?>
      <h1 class="weather-temp"><?php echo $namedizi[0]?></h1>
      <h3 class="weather-desc"><?php echo $dizri[1];?></h3>
    </div>
  </div>
  <div class="info-side">
    <div class="today-info-container">
      <div class="today-info">
        <div class="precipitation"> <span class="title">HİSSEDİLEN</span><span class="value"><?php echo $nemdizi[0]?></span>
          <div class="clear"></div>
        </div>
        <div class="humidity"> <span class="title">NEM ORANI</span><span class="value"><?php echo $nemdizi[3]?></span>
          <div class="clear"></div>
        </div>
        <div class="wind"> <span class="title">RÜZGAR</span><span class="value"><?php echo $nemdizi[1]?></span>
          <div class="clear"></div>
        </div>
      </div>
    </div>
    <div class="week-container">
      <ul class="week-list">
        <li class="active"><i class="day-icon" data-feather="sun"></i><span class="day-name"><?php echo $day1[2]?></span><span class="day-temp"><?php echo $namedizi[0]?></span></li>
        <li><i class="day-icon" data-feather="cloud"></i><span class="day-name"><?php echo $day2[2]?></span><span class="day-temp"><?php echo $day1dizi[11]?></span></li>
        <li><i class="day-icon" data-feather="cloud-snow"></i><span class="day-name"><?php echo $day3[2]?></span><span class="day-temp"><?php echo $day1dizi[17]?></span></li>
        <div class="clear"></div>
      </ul>
    </div>
    <div class="location-container">
      <button class="location-button"> <i data-feather="map-pin"></i><span>Konum Değiştir</span></button>
    </div>
  </div>
</div>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>