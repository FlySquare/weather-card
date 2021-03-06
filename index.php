<!DOCTYPE html>
<?php

$city = "yalova";
if(isset($_POST['submit'])){
  $selected_val = $_POST['Sehir'];
  $city = $selected_val;
  }
$site = file_get_contents("https://www.havadurumu15gunluk.xyz/havadurumu/1376/$city-hava-durumu-15-gunluk.html");
$site2 = file_get_contents("http://takvim.ufgu.com");
$site3 = file_get_contents("https://www.havadurumu.com.tr/havadurumu/$city-hava-durumu");
preg_match_all('@<span class="report-C">(.*?)</span>@si', $site, $name);
$namecikti = implode("p", $name[1]);
$namedizi = explode ("p",$namecikti);

preg_match_all('@<td style="text-align: left;">(.*?)</td>@si', $site3, $cal);
$calcikti = implode("p", $cal[1]);
$caldizi = explode ("p",$calcikti);


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
preg_match_all('@<div class="weather15h">(.*?)</div>@si', $site, $day1);
$day1cikti = implode("p", $day1[1]);
$day1dizi = explode ("p",$day1cikti);

$metin3 = $day1dizi[0];
$day3 = explode (" ",$metin3);
$metin = $day1dizi[4];
$day1 = explode (" ",$metin);
$metin2 = $day1dizi[8];
$day2 = explode (" ",$metin2);


$metin = $statusdizi[3];

$dizri = explode ("<br />",$metin);

$metincal = $calcikti;
$caldizr = explode ("p",$metincal);

?>


<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Online Hava Durumu Kartı</title>
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="css/style.css">
  <script src="https://kit.fontawesome.com/2345f97192.js" crossorigin="anonymous"></script>
</head>
<body>




<!-- partial:index.partial.html -->
<div class="container"> 
  <div style="
  <?php if(strstr($dizri[1],"ağmur")) echo "background-image: url('https://s5.gifyu.com/images/b1e5c848634a3b97ca18bf2c6cabfb9960c308f6r1-497-370_hq-1.gif');"?>
  <?php if(strstr($dizri[1],"ulut"))  echo "background-image: url('https://s5.gifyu.com/images/giphydea06a61393f5750.gif');"?>
    <?php if(strstr($dizri[1],"kar"))  echo "background-image: url('https://s5.gifyu.com/images/gif-animc3a9-hivers-neige-33.gif');"?>
      <?php if(strstr($dizri[1],"isli"))  echo "background-image: url('https://s5.gifyu.com/images/sis.gif');"?>
        <?php if(strstr($dizri[1],"üneş"))  echo "background-image: url('https://s5.gifyu.com/images/source2a23f571fb5ddfe2.gif');"?>
  
  " class='weather-side'>
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
        <li class="active">
        <?php if(strstr($caldizr[0],"ağmur")) echo '<i class="fas fa-cloud-rain fa-2x"></i>'?>
        <?php if(strstr($caldizr[0],"ulut")) echo '<i class="fas fa-cloud fa-2x"></i>'?>
        <?php if(strstr($caldizr[0],"kar")) echo '<i class="far fa-snowflake fa-2x"></i>'?>
        <?php if(strstr($caldizr[0],"isli")) echo '<i class="fas fa-smog fa-2x"></i>'?>
        <?php if(strstr($caldizr[0],"üneş")) echo '<i class="fas fa-sun fa-2x"></i>'?>
        <span class="day-name"><?php echo $day3[2] ?></span><span class="day-temp"><?php echo $day1dizi[3] ?></span></li>
        <li>
        <?php if(strstr($caldizr[1],"ağmur")) echo '<i class="fas fa-cloud-rain fa-2x"></i>'?>
        <?php if(strstr($caldizr[1],"ulut")) echo '<i class="fas fa-cloud fa-2x"></i>'?>
        <?php if(strstr($caldizr[1],"kar")) echo '<i class="far fa-snowflake fa-2x"></i>'?>
        <?php if(strstr($caldizr[1],"isli")) echo '<i class="fas fa-smog fa-2x"></i>'?>
        <?php if(strstr($caldizr[1],"üneş")) echo '<i class="fas fa-sun fa-2x"></i>'?></i>
        <span class="day-name"><?php echo $day1[2] ?></span><span class="day-temp"><?php echo $day1dizi[7] ?></span></li>
        <li>
        <?php if(strstr($caldizr[2],"ağmur")) echo '<i class="fas fa-cloud-rain fa-2x"></i>'?>
        <?php if(strstr($caldizr[2],"ulut")) echo '<i class="fas fa-cloud fa-2x"></i>'?>
        <?php if(strstr($caldizr[2],"kar")) echo '<i class="far fa-snowflake fa-2x"></i>'?>
        <?php if(strstr($caldizr[2],"isli")) echo '<i class="fas fa-smog fa-2x"></i>'?>
        <?php if(strstr($caldizr[2],"üneş")) echo '<i class="fas fa-sun fa-2x"></i>'?></i>
        <span class="day-name"><?php echo $day2[2] ?></span><span class="day-temp"><?php echo $day1dizi[11] ?></span></li>
        <div class="clear"></div>
      </ul>
    </div>
    <div class="location-container">
    <form action="index.php" METHOD="POST">
  
    <div class="box">
<select name="Sehir">
    <option value="0">Şehir Seç</option>
    <option value="adana">Adana</option>
    <option value="adiyaman">Adıyaman</option>
    <option value="afyonkarahisar">Afyonkarahisar</option>
    <option value="agri">Ağrı</option>
    <option value="amasya">Amasya</option>
    <option value="ankara">Ankara</option>
    <option value="antalya">Antalya</option>
    <option value="artvin">Artvin</option>
    <option value="aydin">Aydın</option>
    <option value="balikesir">Balıkesir</option>
    <option value="bilecik">Bilecik</option>
    <option value="bingol">Bingöl</option>
    <option value="bitlis">Bitlis</option>
    <option value="bolu">Bolu</option>
    <option value="burdur">Burdur</option>
    <option value="bursa">Bursa</option>
    <option value="canakkale">Çanakkale</option>
    <option value="cankiri">Çankırı</option>
    <option value="corum">Çorum</option>
    <option value="denizli">Denizli</option>
    <option value="diyarbakir">Diyarbakır</option>
    <option value="edirne">Edirne</option>
    <option value="elazig">Elazığ</option>
    <option value="erzincan">Erzincan</option>
    <option value="erzurum">Erzurum</option>
    <option value="eskisehir">Eskişehir</option>
    <option value="gaziantep">Gaziantep</option>
    <option value="giresun">Giresun</option>
    <option value="gumushane">Gümüşhane</option>
    <option value="hakkari">Hakkâri</option>
    <option value="hatay">Hatay</option>
    <option value="isparta">Isparta</option>
    <option value="mersin">Mersin</option>
    <option value="istanbul">İstanbul</option>
    <option value="izmir">İzmir</option>
    <option value="kars">Kars</option>
    <option value="kastamonu">Kastamonu</option>
    <option value="kayseri">Kayseri</option>
    <option value="kirklareli">Kırklareli</option>
    <option value="kirsehir">Kırşehir</option>
    <option value="kocaeli">Kocaeli</option>
    <option value="konya">Konya</option>
    <option value="kutahya">Kütahya</option>
    <option value="malatya">Malatya</option>
    <option value="manisa">Manisa</option>
    <option value="kahramanmaras">Kahramanmaraş</option>
    <option value="mardin">Mardin</option>
    <option value="mugla">Muğla</option>
    <option value="mus">Muş</option>
    <option value="nevsehir">Nevşehir</option>
    <option value="nigde">Niğde</option>
    <option value="ordu">Ordu</option>
    <option value="rize">Rize</option>
    <option value="sakarya">Sakarya</option>
    <option value="samsun">Samsun</option>
    <option value="siirt">Siirt</option>
    <option value="sinop">Sinop</option>
    <option value="sivas">Sivas</option>
    <option value="tekirdag">Tekirdağ</option>
    <option value="tokat">Tokat</option>
    <option value="trabzon">Trabzon</option>
    <option value="tunceli">Tunceli</option>
    <option value="sanliurfa">Şanlıurfa</option>
    <option value="usak">Uşak</option>
    <option value="van">Van</option>
    <option value="yozgat">Yozgat</option>
    <option value="zpnguldak">Zonguldak</option>
    <option value="aksaray">Aksaray</option>
    <option value="bayburt">Bayburt</option>
    <option value="karaman">Karaman</option>
    <option value="kirikkale">Kırıkkale</option>
    <option value="batman">Batman</option>
    <option value="sirnak">Şırnak</option>
    <option value="bartin">Bartın</option>
    <option value="ardahan">Ardahan</option>
    <option value="igdir">Iğdır</option>
    <option value="yalova">Yalova</option>
    <option value="karabuk">Karabük</option>
    <option value="kilis">Kilis</option>
    <option value="osmaniye">Osmaniye</option>
    <option value="duzce">Düzce</option>
</select>

</div>
      
<button type="submit" name="submit" class="location-button"> <i data-feather="map-pin"></i><span>Konum Değiştir</span></button>

</form>
</div>

  
    </div>
  </div>
</div>
<!-- partial -->
  <script  src="js/script.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script><script  src="./script.js"></script>

</body>
</html>