<?php
$db = new mysqli('localhost', 'root', 'root', 'bebysring', '8889');

$id = ""; //id
$item = ""; //商品名
$manufacture = ""; //メーカー
$countrry = ""; //生産国
$price = ""; //値段
$lifestyle = ""; //生活様式にあわせた使用用途
$type = ""; //抱っこ紐のタイプ
$beltType = ""; //抱っこ紐のベルトのタイプ
$attachType = ""; //後抱きor同時抱き
$size = ""; //サイズ
$color = ""; //カラーの種類
$siteLink = ""; //サイトへのリンク
$saleLink = ""; //販売サイトのリンク


$countrry = $_POST['q01'];
// $Lprice $Hprice の値を設定
if ($_POST['q02'] === "1") {
    $Lprice = 0;
    $Hprice = 15000;
} elseif ($_POST['q02'] === "2") {
    $Lprice = 15000;
    $Hprice = 25000;
} elseif ($_POST['q02'] === "3") {
    $Lprice = 25000;
    $Hprice = 999999;
} else {
    $_POST['q02'] === "0";
}
$lifestyle = $_POST['q03'];
$size = $_POST['q04'];
$attachType = $_POST['q05'];
$color = $_POST['q06'];
$beltType = $_POST['q07'];


//条件なし
if ($_POST['q01'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs');
    $stmt->execute();



    //条件１つ 7
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ?');
    $stmt->bind_param('i', $countrry);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ?');
    $stmt->bind_param('ii', $Lprice, $Hprice);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where lifestyle = ?');
    $stmt->bind_param('s', $lifestyle);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where size = ?');
    $stmt->bind_param('s', $size);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where attach_type = ?');
    $stmt->bind_param('s', $attachType);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where color > ?');
    $stmt->bind_param('i', $color);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where belt_type = ?');
    $stmt->bind_param('s', $beltType);
    $stmt->execute();


    //条件2つq01固定 6
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ?');
    $stmt->bind_param('iii', $countrry, $Lprice, $Hprice);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ? and lifestyle = ?');
    $stmt->bind_param('is', $countrry, $lifestyle);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ? and size = ?');
    $stmt->bind_param('is', $countrry, $size);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ? and attach_type = ?');
    $stmt->bind_param('is', $countrry, $attachType);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ? and color > ?');
    $stmt->bind_param('ii', $countrry, $color);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ? and belt_type = ?');
    $stmt->bind_param('is', $countrry, $beltType);
    $stmt->execute();
    //条件2つq02固定 5
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and lifestyle = ?');
    $stmt->bind_param('iis', $Lprice, $Hprice, $lifestyle);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and size = ?');
    $stmt->bind_param('iis', $Lprice, $Hprice, $size);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and attach_type = ?');
    $stmt->bind_param('iis', $Lprice, $Hprice, $attachType);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and color > ?');
    $stmt->bind_param('iii', $Lprice, $Hprice, $color);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and belt_type = ?');
    $stmt->bind_param('iis', $Lprice, $Hprice, $beltType);
    $stmt->execute();
    //条件2つq03固定 4
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where lifestyle = ? and size = ?');
    $stmt->bind_param('ss', $lifestyle, $size);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where lifestyle = ? and attach_type = ?');
    $stmt->bind_param('ss', $lifestyle, $attachType);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where lifestyle = ? and color > ?');
    $stmt->bind_param('si', $lifestyle, $color);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where lifestyle = ? and belt_type = ?');
    $stmt->bind_param('ss', $lifestyle, $beltType);
    $stmt->execute();
    //条件2つq04固定 3
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where size = ? and attach_type = ?');
    $stmt->bind_param('ss', $size, $attachType);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where size = ? and color > ?');
    $stmt->bind_param('si', $size, $color);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where size = ? and belt_type = ?');
    $stmt->bind_param('ss', $size, $beltType);
    $stmt->execute();
    //条件2つq05固定 2
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where attach_type = ? and color > ?');
    $stmt->bind_param('si', $attachType, $color);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where attach_type = ? and belt_type = ?');
    $stmt->bind_param('ss', $attachType, $beltType);
    $stmt->execute();
    //条件2つq06固定 1
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where color > ? and belt_type = ?');
    $stmt->bind_param('is', $color, $beltType);
    $stmt->execute();



    //条件3つq01固定 15
    //かつq02固定 5
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and lifestyle = ?');
    $stmt->bind_param('iiis', $countrry, $Lprice, $Hprice, $lifestyle);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and size = ?');
    $stmt->bind_param('iiis', $countrry, $Lprice, $Hprice, $size);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and attach_type = ?');
    $stmt->bind_param('iiis', $countrry, $Lprice, $Hprice, $attachType);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and color > ?');
    $stmt->bind_param('iiii', $countrry, $Lprice, $Hprice, $color);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and belt_type = ?');
    $stmt->bind_param('iiis', $countrry, $Lprice, $Hprice, $beltType);
    $stmt->execute();
    //条件3つq01固定 15
    //かつq03固定 4
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ? and lifestyle = ? and size = ?');
    $stmt->bind_param('iss', $countrry, $lifestyle, $size);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ? and lifestyle = ? and attach_type = ?');
    $stmt->bind_param('iss', $countrry, $lifestyle, $attachType);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ? and lifestyle = ? and color > ?');
    $stmt->bind_param('isi', $countrry, $lifestyle, $color);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ? and lifestyle = ? and belt_type = ?');
    $stmt->bind_param('iss', $countrry, $lifestyle, $beltType);
    $stmt->execute();
    //条件3つq01固定 15
    //かつq04固定 3
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ? and size = ? and attach_type = ?');
    $stmt->bind_param('iss', $countrry, $size, $attachType);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ? and size = ? and color > ?');
    $stmt->bind_param('isi', $countrry, $size, $color);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ? and size = ? and belt_type = ?');
    $stmt->bind_param('iss', $countrry, $size, $beltType);
    $stmt->execute();
    //条件3つq01固定 15
    //かつq05固定 2
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ? and attach_type = ? and color > ?');
    $stmt->bind_param('isi', $countrry, $attachType, $color);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ? and attach_type = ? and belt_type = ?');
    $stmt->bind_param('iss', $countrry, $attachType, $beltType);
    $stmt->execute();
    //条件3つq01固定 15
    //かつq06固定 1
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ? and color > ? and belt_type = ?');
    $stmt->bind_param('iis', $countrry, $color, $beltType);
    $stmt->execute();


    //条件3つq02固定 10
    //かつq03固定 4
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and lifestyle = ? and size = ?');
    $stmt->bind_param('iiss', $Lprice, $Hprice, $lifestyle, $size);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and lifestyle = ? and attach_type = ?');
    $stmt->bind_param('iiss', $Lprice, $Hprice, $lifestyle, $attachType);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and lifestyle = ? and color > ?');
    $stmt->bind_param('iisi', $Lprice, $Hprice, $lifestyle, $color);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and lifestyle = ? and belt_type = ?');
    $stmt->bind_param('iiss', $Lprice, $Hprice, $lifestyle, $beltType);
    $stmt->execute();
    //条件3つq02固定 10
    //かつq04固定 3
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and size = ? and attach_type = ?');
    $stmt->bind_param('iiss', $Lprice, $Hprice, $size, $attachType);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and  size = ? and color > ?');
    $stmt->bind_param('iisi', $Lprice, $Hprice, $size, $color);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and  size = ? and belt_type = ?');
    $stmt->bind_param('iiss', $Lprice, $Hprice, $size, $beltType);
    $stmt->execute();
    //条件3つq02固定 10
    //かつq05固定 2
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and  attach_type = ? and color > ?');
    $stmt->bind_param('iisi', $Lprice, $Hprice, $attachType, $color);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and  attach_type = ? and belt_type = ?');
    $stmt->bind_param('iiss', $Lprice, $Hprice, $attachType, $beltType);
    $stmt->execute();
    //条件3つq02固定 10
    //かつq06固定 1
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and color > ? and belt_type = ?');
    $stmt->bind_param('iiis', $Lprice, $Hprice, $color, $beltType);
    $stmt->execute();


    //条件3つq03固定 6
    //かつq04固定 3
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where lifestyle = ? and size = ? and attach_type = ?');
    $stmt->bind_param('sss', $lifestyle, $size, $attachType);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where lifestyle = ? and size = ? and color > ?');
    $stmt->bind_param('ssi', $lifestyle, $size, $color);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where lifestyle = ? and size = ? and belt_type = ?');
    $stmt->bind_param('sss', $lifestyle, $size, $beltType);
    $stmt->execute();
    //条件3つq03固定 6
    //かつq05固定 2
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where lifestyle = ? and attach_type = ? and color > ?');
    $stmt->bind_param('ssi', $lifestyle, $attachType, $color);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where lifestyle = ? and attach_type = ? and belt_type = ?');
    $stmt->bind_param('sss', $lifestyle, $attachType, $beltType);
    $stmt->execute();
    //条件3つq03固定 6
    //かつq06固定 1
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where lifestyle = ? and color > ? and belt_type = ?');
    $stmt->bind_param('sis', $lifestyle, $color, $beltType);
    $stmt->execute();

    //条件3つq04固定 3
    //かつq05固定 2
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where size = ? and attach_type = ? and color > ?');
    $stmt->bind_param('ssi', $size, $attachType, $color);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where size = ? and attach_type = ? and belt_type = ?');
    $stmt->bind_param('sss', $size, $attachType, $beltType);
    $stmt->execute();
    //条件3つq04固定 3
    //かつq06固定 1
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where size = ? and color > ? and belt_type = ?');
    $stmt->bind_param('sis', $size, $color, $beltType);
    $stmt->execute();

    //条件3つq05固定 1
    //かつq06固定 1
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where attach_type = ? and color > ? and belt_type = ?');
    $stmt->bind_param('sis', $attachType, $color, $beltType);
    $stmt->execute();



    //条件4つq01固定 20
    //かつq02固定 10
    //かつq03固定 4
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and lifestyle = ? and size = ?');
    $stmt->bind_param('iiiss', $countrry, $Lprice, $Hprice, $lifestyle, $size);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and lifestyle = ? and attach_type = ?');
    $stmt->bind_param('iiiss', $countrry, $Lprice, $Hprice, $lifestyle, $attachType);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and lifestyle = ? and color > ?');
    $stmt->bind_param('iiisi', $countrry, $Lprice, $Hprice, $lifestyle, $color);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and lifestyle = ? and belt_type = ?');
    $stmt->bind_param('iiiss', $countrry, $Lprice, $Hprice, $lifestyle, $beltType);
    $stmt->execute();
    //条件4つq01固定 20
    //かつq02固定 10
    //かつq04固定 3
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and size = ? and attach_type = ?');
    $stmt->bind_param('iiiss', $countrry, $Lprice, $Hprice, $size, $attachType);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and size = ? and color > ?');
    $stmt->bind_param('iiisi', $countrry, $Lprice, $Hprice, $size, $color);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and size = ? and belt_type = ?');
    $stmt->bind_param('iiiss', $countrry, $Lprice, $Hprice, $size, $beltType);
    $stmt->execute();
    //条件4つq01固定 20
    //かつq02固定 10
    //かつq05固定 2
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and attach_type = ? and color > ?');
    $stmt->bind_param('iiisi', $countrry, $Lprice, $Hprice, $attachType, $color);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and attach_type = ? and belt_type = ?');
    $stmt->bind_param('iiiss', $countrry, $Lprice, $Hprice, $attachType, $beltType);
    $stmt->execute();
    //条件4つq01固定 20
    //かつq02固定 10
    //かつq06固定 1
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and color > ? and belt_type = ?');
    $stmt->bind_param('iiisi', $countrry, $Lprice, $Hprice, $color, $beltType);
    $stmt->execute();
    //条件4つq01固定 20
    //かつq03固定 6
    //かつq04固定 3
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ?  and lifestyle = ? and size = ? and attach_type = ?');
    $stmt->bind_param('isss', $countrry, $lifestyle, $size, $attachType);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ?  and lifestyle = ? and size = ? and color > ?');
    $stmt->bind_param('issi', $countrry, $lifestyle, $size, $color);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ? and lifestyle = ? and size = ? and belt_type = ?');
    $stmt->bind_param('isss', $countrry, $lifestyle, $size, $beltType);
    $stmt->execute();
    //条件4つq01固定 20
    //かつq03固定 6
    //かつq05固定 2
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ?  and lifestyle = ? and attach_type = ? and color > ?');
    $stmt->bind_param('issi', $countrry, $lifestyle, $attachType, $color);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ?  and lifestyle = ? and attach_type = ? and belt_type = ?');
    $stmt->bind_param('issi', $countrry, $lifestyle, $attachType, $beltType);
    $stmt->execute();
    //条件4つq01固定 20
    //かつq03固定 6
    //かつq06固定 1
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ?  and lifestyle = ? and color > ? and belt_type = ?');
    $stmt->bind_param('isis', $countrry, $lifestyle, $color, $beltType);
    $stmt->execute();
    //条件4つq01固定 20
    //かつq04固定 3
    //かつq05固定 2
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ? and size = ? and attach_type = ? and color > ?');
    $stmt->bind_param('issi', $countrry, $size, $attachType, $color);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ? and size = ? and attach_type = ? and belt_type = ?');
    $stmt->bind_param('isss', $countrry, $size, $attachType, $beltType);
    $stmt->execute();
    //条件4つq01固定 20
    //かつq04固定 3
    //かつq06固定 1
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ? and size = ? and color > ? and belt_type = ?');
    $stmt->bind_param('isis', $countrry, $size, $color, $beltType);
    $stmt->execute();
    //条件4つq01固定 20
    //かつq05固定 1
    //かつq06固定 1
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ? and attach_type = ? and color > ? and belt_type = ?');
    $stmt->bind_param('isis', $countrry,  $attachType, $color, $beltType);
    $stmt->execute();

    //条件4つq02固定 10
    //かつq03固定 6
    //かつq04固定 3
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and lifestyle = ? and size = ? and attach_type = ?');
    $stmt->bind_param('iisss', $Lprice, $Hprice, $lifestyle, $size, $attachType);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and lifestyle = ? and size = ? and color > ?');
    $stmt->bind_param('iissi', $Lprice, $Hprice, $lifestyle, $size, $color);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and lifestyle = ? and size = ? and belt_type = ?');
    $stmt->bind_param('iisss', $Lprice, $Hprice, $lifestyle, $size, $beltType);
    $stmt->execute();
    //条件4つq02固定 10
    //かつq03固定 6
    //かつq05固定 2
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and lifestyle = ? and attach_type = ? and color > ?');
    $stmt->bind_param('iissi', $Lprice, $Hprice, $lifestyle, $attachType, $color);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and lifestyle = ? and attach_type = ? and belt_type = ?');
    $stmt->bind_param('iisss', $Lprice, $Hprice, $lifestyle, $attachType, $beltType);
    $stmt->execute();
    //条件4つq02固定 10
    //かつq03固定 6
    //かつq06固定 1
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and lifestyle = ? and color > ? and belt_type = ?');
    $stmt->bind_param('iisss', $Lprice, $Hprice, $lifestyle, $color, $beltType);
    $stmt->execute();
    //条件4つq02固定 10
    //かつq04固定 3
    //かつq05固定 2
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and size = ? and attach_type = ? and color > ?');
    $stmt->bind_param('iissi', $Lprice, $Hprice, $size, $attachType, $color);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and size = ? and attach_type = ? and belt_type = ?');
    $stmt->bind_param('iisss', $Lprice, $Hprice, $size, $attachType, $beltType);
    $stmt->execute();
    //条件4つq02固定 10
    //かつq04固定 3
    //かつq06固定 1
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and size = ? and color > ? and belt_type = ?');
    $stmt->bind_param('iisis', $Lprice, $Hprice, $size, $color, $beltType);
    $stmt->execute();
    //条件4つq02固定 10
    //かつq05固定 1
    //かつq06固定 1
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and attach_type = ? and color > ? and belt_type = ?');
    $stmt->bind_param('iisis', $Lprice, $Hprice, $attachType, $color, $beltType);
    $stmt->execute();

    //条件4つq03固定 4
    //かつq04固定 3
    //かつq05固定 2
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where lifestyle = ? and size = ? and attach_type = ? and color > ?');
    $stmt->bind_param('sssi', $lifestyle, $size, $attachType, $color);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where lifestyle = ? and size = ? and attach_type = ? and belt_type = ?');
    $stmt->bind_param('ssss', $lifestyle, $size, $attachType, $beltType);
    $stmt->execute();
    //条件4つq03固定 4
    //かつq04固定 3
    //かつq06固定 1
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where lifestyle = ? and size = ? and color > ? and belt_type = ?');
    $stmt->bind_param('ssis', $lifestyle, $size, $color, $beltType);
    $stmt->execute();

    //条件4つq03固定 4
    //かつq05固定 1
    //かつq06固定 1
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where lifestyle = ? and attach_type = ? and color > ? and belt_type = ?');
    $stmt->bind_param('ssis', $lifestyle, $attachType, $color, $beltType);
    $stmt->execute();

    //条件4つq04固定 1
    //かつq05固定 1
    //かつq06固定 1
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where size =? and attach_type = ? and color > ? and belt_type = ?');
    $stmt->bind_param('ssis', $size, $attachType, $color, $beltType);
    $stmt->execute();



    //条件5つq01固定 15
    //かつq02固定 10
    //かつq03固定 6
    //かつq04固定 3
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and lifestyle = ? and size= ? and attach_type = ?');
    $stmt->bind_param('iiisss', $countrry, $Lprice, $Hprice, $lifestyle, $size,  $attachType);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and lifestyle = ? and size = ? and color > ?');
    $stmt->bind_param('iiissi', $countrry, $Lprice, $Hprice, $lifestyle, $size, $color);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and lifestyle = ? and size = ? and belt_type = ?');
    $stmt->bind_param('iiisss', $countrry, $Lprice, $Hprice, $lifestyle, $size, $beltType);
    $stmt->execute();
    //条件5つq01固定 15
    //かつq02固定 10
    //かつq03固定 6
    //かつq05固定 2
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and lifestyle = ? and attach_type = ? and color > ?');
    $stmt->bind_param('iiissi', $countrry, $Lprice, $Hprice, $lifestyle, $attachType, $color);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and lifestyle = ? and attach_type = ? and belt_type = ?');
    $stmt->bind_param('iiisss', $countrry, $Lprice, $Hprice, $lifestyle, $attachType, $beltType);
    $stmt->execute();
    //条件5つq01固定 15
    //かつq02固定 10
    //かつq03固定 6
    //かつq06固定 1
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and lifestyle = ? and attach_type = ? and belt_type = ?');
    $stmt->bind_param('iiissi', $countrry, $Lprice, $Hprice, $lifestyle, $color, $beltType);
    $stmt->execute();

    //条件5つq01固定 15
    //かつq02固定 10
    //かつq04固定 3
    //かつq05固定 2
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and size = ? and attach_type = ? and color > ?');
    $stmt->bind_param('iiissi', $countrry, $Lprice, $Hprice, $size, $attachType, $color);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and size = ? and attach_type = ? and belt_type = ?');
    $stmt->bind_param('iiisss', $countrry, $Lprice, $Hprice, $size, $attachType, $beltType);
    $stmt->execute();
    //条件5つq01固定 15
    //かつq02固定 10
    //かつq04固定 3
    //かつq06固定 1
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and size = ? and color > ? and belt_type = ?');
    $stmt->bind_param('iiissi', $countrry, $Lprice, $Hprice, $size, $color, $beltType);
    $stmt->execute();
    //条件5つq01固定 15
    //かつq02固定 10
    //かつq05固定 1
    //かつq06固定 1
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and attach_type = ? and color > ? and belt_type = ?');
    $stmt->bind_param('iiisis', $countrry, $Lprice, $Hprice, $attachType, $color, $beltType);
    $stmt->execute();

    //条件5つq01固定 15
    //かつq03固定 4
    //かつq04固定 3
    //かつq05固定 2
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ? and lifestyle = ? and size = ? and attach_type = ? and color > ?');
    $stmt->bind_param('isssi', $countrry, $lifestyle, $size, $attachType, $color);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ? and lifestyle = ? and size = ? and attach_type = ? and belt_type = ?');
    $stmt->bind_param('issss', $countrry, $lifestyle, $size, $attachType, $beltType);
    $stmt->execute();
    //条件5つq01固定 15
    //かつq03固定 4
    //かつq04固定 3
    //かつq06固定 1
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ? and lifestyle = ? and size = ? and color > ? and belt_type = ?');
    $stmt->bind_param('issis', $countrry, $lifestyle, $size, $color, $beltType);
    $stmt->execute();
    //条件5つq01固定 15
    //かつq03固定 4
    //かつq05固定 1
    //かつq06固定 1
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ? and lifestyle = ? and attach_type = ? and color > ? and belt_type = ?');
    $stmt->bind_param('issis', $countrry, $lifestyle, $attachType, $color, $beltType);
    $stmt->execute();
    //条件5つq01固定 15
    //かつq04固定 1
    //かつq05固定 1
    //かつq06固定 1
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ? and size = ? and attach_type = ? and color > ? and belt_type = ?');
    $stmt->bind_param('issis', $countrry, $size, $attachType, $color, $beltType);
    $stmt->execute();

    //条件5つq02固定 6
    //かつq03固定 4
    //かつq04固定 3
    //かつq05固定 2
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and lifestyle = ? and size = ? and attach_type = ? and color > ?');
    $stmt->bind_param('iisssi', $Lprice, $Hprice, $lifestyle, $size, $attachType, $color);
    $stmt->execute();
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and lifestyle = ? and size = ? and attach_type = ? and belt_type = ?');
    $stmt->bind_param('iissss', $Lprice, $Hprice, $lifestyle, $size, $attachType, $beltType);
    $stmt->execute();
    //条件5つq02固定 6
    //かつq03固定 4
    //かつq04固定 3
    //かつq06固定 1
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and lifestyle = ? and size = ? and color > ? and belt_type = ?');
    $stmt->bind_param('iissis', $Lprice, $Hprice, $lifestyle, $size, $color, $beltType);
    $stmt->execute();
    //条件5つq02固定 6
    //かつq03固定 4
    //かつq05固定 1
    //かつq06固定 1
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and lifestyle = ? and attach_type = ? and color > ? and belt_type = ?');
    $stmt->bind_param('iissis', $Lprice, $Hprice, $lifestyle, $attachType, $color, $beltType);
    $stmt->execute();
    //条件5つq02固定 6
    //かつq04固定 1
    //かつq05固定 1
    //かつq06固定 1
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and size = ? and attach_type = ? and color > ? and belt_type = ?');
    $stmt->bind_param('iissis', $Lprice, $Hprice, $size, $attachType, $color, $beltType);
    $stmt->execute();

    //条件5つq03固定 1
    //かつq04固定 1
    //かつq05固定 1
    //かつq06固定 1
} elseif ($_POST['q01'] === "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where lifestyle = ? and size = ? and attach_type = ? and color > ? and belt_type = ?');
    $stmt->bind_param('sssis', $lifestyle, $size, $attachType, $color, $beltType);
    $stmt->execute();



    //条件6つq01固定 7
    //かつq02固定 5
    //かつq03固定 4
    //かつq04固定 3
    //かつq05固定 2
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] === "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and lifestyle = ? and size = ? and attach_type = ? and color > ?');
    $stmt->bind_param('iiisssi', $countrry, $Lprice, $Hprice, $lifestyle, $size, $attachType, $color,);
    $stmt->execute();
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] === "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and lifestyle = ? and size = ? and attach_type = ? and belt_type = ?');
    $stmt->bind_param('iiissss', $countrry, $Lprice, $Hprice, $lifestyle, $size, $attachType, $beltType);
    $stmt->execute();
    //条件6つq01固定 7
    //かつq02固定 5
    //かつq03固定 4
    //かつq04固定 3
    //かつq06固定 1 
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] === "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and lifestyle = ? and size = ? and color > ? and belt_type = ?');
    $stmt->bind_param('iiissss', $countrry, $Lprice, $Hprice, $lifestyle, $size, $attachType, $beltType);
    $stmt->execute();
    //条件6つq01固定 7
    //かつq02固定 5
    //かつq03固定 4
    //かつq05固定 1
    //かつq06固定 1
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] === "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and lifestyle = ? and attach_type = ? and color > ? and belt_type = ?');
    $stmt->bind_param('iiissis', $countrry, $Lprice, $Hprice, $lifestyle, $attachType, $color, $beltType);
    $stmt->execute();
    //条件6つq01固定 7
    //かつq02固定 5
    //かつq04固定 1
    //かつq05固定 1
    //かつq06固定 1
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] === "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and size = ? and attach_type = ? and color > ? and belt_type = ?');
    $stmt->bind_param('iiissis', $countrry, $Lprice, $Hprice, $size, $attachType, $color, $beltType);
    $stmt->execute();
    //条件6つq01固定 7
    //かつq03固定 1
    //かつq04固定 1
    //かつq05固定 1
    //かつq06固定 1
} elseif ($_POST['q01'] != "0" && $_POST['q02'] === "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ? and lifestyle = ? and size = ? and attach_type = ? and color > ? and belt_type = ?');
    $stmt->bind_param('isssis', $countrry, $lifestyle, $size, $attachType, $color, $beltType);
    $stmt->execute();
    //条件6つq02固定 1
    //かつq03固定 1
    //かつq04固定 1
    //かつq05固定 1
    //かつq06固定 1
} elseif ($_POST['q01'] === "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where price between ? and ? and lifestyle = ? and size = ? and attach_type = ? and color > ? and belt_type = ?');
    $stmt->bind_param('iisssis', $Lprice, $Hprice, $lifestyle, $size, $attachType, $color, $beltType);
    $stmt->execute();


    //全条件あり 1
} elseif ($_POST['q01'] != "0" && $_POST['q02'] != "0" && $_POST['q03'] != "0" && $_POST['q04'] != "0" && $_POST['q05'] != "0" && $_POST['q06'] != "0" && $_POST['q07'] != "0") {
    $stmt = $db->prepare('select * from bs where country = ? and price between ? and ? and lifestyle = ? and size = ? and attach_type = ? and color > ? and belt_type = ?');
    $stmt->bind_param('iiisssis', $countrry, $Lprice, $Hprice, $lifestyle, $size, $attachType, $color, $beltType);
    $stmt->execute();
} else {
    $stmt = false;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>あなたへのおすすめ抱っこ紐</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/console.css" />
</head>

<header class="page-header wrapper bg-color">
    <h1>
        <a href="../top/top.html">
            <img class="logo" src="../images/logo.png" alt="選んで抱っこひも" />
        </a>
    </h1>
    <nav>
        <ul class="main-nav">
            <li><a class="li-color" href="../top/top.html">トップ</a></li>
            <li><a class="li-color" href="../serch/serch.html">検索</a></li>
            <li><a class="li-color" href="../Category/category.html">コラム</a></li>
        </ul>
    </nav>
</header>

<body>
    <div class="console-table">
        <h1>お勧め抱っこ紐</br>検索結果</h1>
        
        <table>

            <?php if ($stmt !== false) : ?>
                <?php $stmt->bind_result($id, $item, $manufacture, $countrry, $price, $lifestyle, $type, $beltType, $attachType, $size, $color, $siteLink, $saleLink); ?>
                <tr>
                    <th>メーカー</th>
                    <th>商品名</th>
                    <th>値段</th>
                    <th>カラー</th>
                    <th>サイト</th>
                </tr>
                <?php while ($stmt->fetch()) : ?>

                    <tr>
                        <td><?php echo htmlspecialchars($manufacture) . '<br>'; ?></td>
                        <td><?php echo htmlspecialchars($item) . '<br>'; ?></td>
                        <td><?php echo htmlspecialchars($price) . '<br>'; ?></td>
                        <td><?php echo htmlspecialchars($color) . "色" . '<br>'; ?></td>
                        <td><a href="<?php echo htmlspecialchars($siteLink); ?>"><?php echo htmlspecialchars($manufacture); ?>の公式サイトでみる</a></td>
                    </tr>
                <?php endwhile; ?>
            <?php endif; ?>
        </table>
        <?php if ($id === "") : ?>
            <h2>対象商品がありません</h2>
            <p>検索条件を変えてください</p>
            <p>
                <a href="../top/top.html">
                もう一度検索する
                </a>
            </p>
        <?php endif; ?>

    </div>



</body>

</html>