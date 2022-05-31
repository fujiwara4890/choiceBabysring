<?php
$db = new mysqli('localhost', 'root', 'root', 'bebysring', '8889');

$id = ""; //id
$item = ""; //商品名
$manufacturer = ""; //メーカー
$countrry = ""; //生産国
$Lprice = 0; //下限値段
$Hprice = 50000; //上限値段
$lifestyle = ""; //生活様式にあわせた使用用途
$type = ""; //抱っこ紐のタイプ
$beltType = ""; //抱っこ紐のベルトのタイプ
$attachType = ""; //後抱きor同時抱き
$size = ""; //サイズ
$color = ""; //カラーの種類
$siteLink = ""; //サイトへのリンク
$saleLink = ""; //販売サイトのリンク
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="decription" content="あなたに合う抱っこひもを探します！" />
  <title>選んで抱っこひも</title>
  <link rel="stylesheet" href="css/reset.css" />
  <link rel="stylesheet" href="css/detail_serch.css" />
  <link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&family=Mochiy+Pop+One&display=swap" rel="stylesheet">
</head>

<body>
  <header class="page-header wrapper bg-color">
    <h1>
      <a href="top.html">
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


  <h1 class="title">詳しく検索する</h1>
  <div>

    <form method="post" class="box" action="detail_serch.php">
      <!-- メーカーを絞り込む -->
      <label class="search">メーカー:
      <select name="manufacturer" id="manufacturer">
        <option value="0" selected>指定なし</option>
        <option value="ergobaby">ergobaby</option>
        <option value="babybjyorn">babybjyorn</option>
        <option value="angelette">angelette</option>
        <option value="betta">betta</option>
        <option value="Terasbaby">Terasbaby</option>
      </select>
      </label>
      
      <!-- 値段で絞り込む -->
      <label class="search">値段 (下限)1000の倍数で金額を入力してください:
      <input type="number" id="Lprice" name="Lprice" step="5000" min="0" max="50000" value="0" required>
      </label>
       <label>値段 (上限)1000の倍数で金額を入力してください:
      <input type="number" id="Hprice" name="Hprice" step="5000" min="5000" max="50000" value="50000" required>
      </label>

      <!-- 種類で絞り込む -->
      <label class="search">種類:
      <select name="type" id="type">
        <option value="0" selected>指定なし</option>
        <option value="carry">キャリータイプ</option>
        <option value="wrap">ラップタイプ</option>
        <option value="sling">スリングタイプ</option>
        <option value="hipseat">ヒップシートタイプ</option>
      </select>
      </label>

      <!-- 肩ベルトか腰ベルトかで絞る -->
      <label class="search">ベルトタイプ:
      <select name="belt_type" id="belt_type">
        <option value="0" selected>指定なし</option>
        <option value="shoulder">肩ベルト</option>
        <option value="waist">腰ベルト</option>
      </select>
      </label>
      
      <!-- 後抱きか同時抱きで絞る -->
      <label class="search">抱き方:
      <select name="attach_type" id="attach_type">
        <option value="0" selected>指定なし</option>
        <option value="after">後抱き</option>
        <option value="before">同時抱き</option>
      </select>
      </label>

      <input type="submit" class="babysringDetailSerch" value="検索する">
    </form>
  </div>


  <?php
// メーカーのみセット
  if(isset($_POST['manufacturer']) 
  && isset($_POST['Lprice']) 
  && isset($_POST['Hprice'])
  && isset($_POST['type']) 
  && isset($_POST['belt_type']) 
  && isset($_POST['attach_type'])
  && $_POST['manufacturer'] !=="0"
  && $_POST['type'] ==="0"
  && $_POST['belt_type'] ==="0"
  && $_POST['attach_type'] ==="0"
  ){
    $manufacturer = $_POST['manufacturer'];
    $Lprice = $_POST['Lprice'];
    $Hprice = $_POST['Hprice'];
    $stmt = $db->prepare('select * from bs where manufacturer = ? and price between ? and ?');
    $stmt->bind_param('sii',$manufacturer,$Lprice,$Hprice);
    $stmt->execute();

// 値段のみセット
  } elseif(isset($_POST['manufacturer']) 
  && isset($_POST['Lprice']) 
  && isset($_POST['Hprice'])
  && isset($_POST['type']) 
  && isset($_POST['belt_type']) 
  && isset($_POST['attach_type'])
  && $_POST['manufacturer'] ==="0"
  && $_POST['type'] ==="0"
  && $_POST['belt_type'] ==="0"
  && $_POST['attach_type'] ==="0"
  ){
    $Lprice = $_POST['Lprice'];
    $Hprice = $_POST['Hprice'];
    $stmt = $db->prepare('select * from bs where price between ? and ?');
    $stmt->bind_param('ii',$Lprice,$Hprice);
    $stmt->execute();

// 種類のみセット
  } elseif(isset($_POST['manufacturer']) 
  && isset($_POST['Lprice']) 
  && isset($_POST['Hprice'])
  && isset($_POST['type']) 
  && isset($_POST['belt_type']) 
  && isset($_POST['attach_type'])
  && $_POST['manufacturer'] ==="0"
  && $_POST['type'] !=="0"
  && $_POST['belt_type'] ==="0"
  && $_POST['attach_type'] ==="0"
  ){
    $Lprice = $_POST['Lprice'];
    $Hprice = $_POST['Hprice'];
    $type = $_POST['type'];
    $stmt = $db->prepare('select * from bs where price between ? and ? and type = ?');
    $stmt->bind_param('iis',$Lprice,$Hprice,$type);
    $stmt->execute();

// ベルトタイプのみセット
  } elseif(isset($_POST['manufacturer']) 
  && isset($_POST['Lprice']) 
  && isset($_POST['Hprice'])
  && isset($_POST['type']) 
  && isset($_POST['belt_type']) 
  && isset($_POST['attach_type'])
  && $_POST['manufacturer'] ==="0"
  && $_POST['type'] ==="0"
  && $_POST['belt_type'] !=="0"
  && $_POST['attach_type'] ==="0"
  ){
    $Lprice = $_POST['Lprice'];
    $Hprice = $_POST['Hprice'];
    $beltType = $_POST['belt_type'];
    $stmt = $db->prepare('select * from bs where price between ? and ? and belt_type = ?');
    $stmt->bind_param('iis',$Lprice,$Hprice,$beltType);
    $stmt->execute();

//抱き方のみセット
  }elseif(isset($_POST['manufacturer']) 
  && isset($_POST['Lprice']) 
  && isset($_POST['Hprice'])
  && isset($_POST['type']) 
  && isset($_POST['belt_type']) 
  && isset($_POST['attach_type'])
  && $_POST['manufacturer'] ==="0"
  && $_POST['type'] ==="0"
  && $_POST['belt_type'] ==="0"
  && $_POST['attach_type'] !=="0"
  ){
    $Lprice = $_POST['Lprice'];
    $Hprice = $_POST['Hprice'];
    $attachType = $_POST['attach_type'];
    $stmt = $db->prepare('select * from bs where price between ? and ? and attach_type = ?');
    $stmt->bind_param('iis',$Lprice,$Hprice,$attachType);
    $stmt->execute();

// メーカーと種類
  }elseif(isset($_POST['manufacturer']) 
  && isset($_POST['Lprice']) 
  && isset($_POST['Hprice'])
  && isset($_POST['type']) 
  && isset($_POST['belt_type']) 
  && isset($_POST['attach_type'])
  && $_POST['manufacturer'] !=="0"
  && $_POST['type'] !=="0"
  && $_POST['belt_type'] ==="0"
  && $_POST['attach_type'] ==="0"
  ){
    $manufacturer = $_POST['manufacturer'];
    $Lprice = $_POST['Lprice'];
    $Hprice = $_POST['Hprice'];
    $type = $_POST['type'];
    $stmt = $db->prepare('select * from bs where manufacturer = ? and price between ? and ? and type = ?');
    $stmt->bind_param('siis',$manufacturer,$Lprice,$Hprice,$type);
    $stmt->execute();

// メーカーとベルトタイプ
  }elseif(isset($_POST['manufacturer']) 
  && isset($_POST['Lprice']) 
  && isset($_POST['Hprice'])
  && isset($_POST['type']) 
  && isset($_POST['belt_type']) 
  && isset($_POST['attach_type'])
  && $_POST['manufacturer'] !=="0"
  && $_POST['type'] ==="0"
  && $_POST['belt_type'] !=="0"
  && $_POST['attach_type'] ==="0"
  ){
    $manufacturer = $_POST['manufacturer'];
    $Lprice = $_POST['Lprice'];
    $Hprice = $_POST['Hprice'];
    $beltType = $_POST['belt_type'];
    $stmt = $db->prepare('select * from bs where manufacturer = ? and price between ? and ? and belt_type = ?');
    $stmt->bind_param('siis',$manufacturer,$Lprice,$Hprice,$beltType);
    $stmt->execute();

// メーカーと抱き方
  }elseif(isset($_POST['manufacturer']) 
  && isset($_POST['Lprice']) 
  && isset($_POST['Hprice'])
  && isset($_POST['type']) 
  && isset($_POST['belt_type']) 
  && isset($_POST['attach_type'])
  && $_POST['manufacturer'] !=="0"
  && $_POST['type'] ==="0"
  && $_POST['belt_type'] ==="0"
  && $_POST['attach_type'] !=="0"
  ){
    $manufacturer = $_POST['manufacturer'];
    $Lprice = $_POST['Lprice'];
    $Hprice = $_POST['Hprice'];
    $attachType = $_POST['attach_type'];
    $stmt = $db->prepare('select * from bs where manufacturer = ? and price between ? and ? and attach_type = ?');
    $stmt->bind_param('siis',$manufacturer,$Lprice,$Hprice,$attachType);
    $stmt->execute();
  
// 種類とタイプ
  }elseif(isset($_POST['manufacturer']) 
  && isset($_POST['Lprice']) 
  && isset($_POST['Hprice'])
  && isset($_POST['type']) 
  && isset($_POST['belt_type']) 
  && isset($_POST['attach_type'])
  && $_POST['manufacturer'] ==="0"
  && $_POST['type'] !=="0"
  && $_POST['belt_type'] !=="0"
  && $_POST['attach_type'] ==="0"
  ){
    $Lprice = $_POST['Lprice'];
    $Hprice = $_POST['Hprice'];
    $type = $_POST['type'];
    $beltType = $_POST['belt_type'];
    $stmt = $db->prepare('select * from bs where price between ? and ? and type = ? and belt_type = ?');
    $stmt->bind_param('iiss',$Lprice,$Hprice,$type,$beltType);
    $stmt->execute();

// 種類と抱き方
  }elseif(isset($_POST['manufacturer']) 
  && isset($_POST['Lprice']) 
  && isset($_POST['Hprice'])
  && isset($_POST['type']) 
  && isset($_POST['belt_type']) 
  && isset($_POST['attach_type'])
  && $_POST['manufacturer'] ==="0"
  && $_POST['type'] !=="0"
  && $_POST['belt_type'] ==="0"
  && $_POST['attach_type'] !=="0"
  ){
    $Lprice = $_POST['Lprice'];
    $Hprice = $_POST['Hprice'];
    $type = $_POST['type'];
    $attachType = $_POST['attach_type'];
    $stmt = $db->prepare('select * from bs where price between ? and ? and type = ? and attach_type = ?');
    $stmt->bind_param('iiss',$Lprice,$Hprice,$type,$attachType);
    $stmt->execute();

// タイプと抱き方
  }elseif(isset($_POST['manufacturer']) 
  && isset($_POST['Lprice']) 
  && isset($_POST['Hprice'])
  && isset($_POST['type']) 
  && isset($_POST['belt_type']) 
  && isset($_POST['attach_type'])
  && $_POST['manufacturer'] ==="0"
  && $_POST['type'] ==="0"
  && $_POST['belt_type'] !=="0"
  && $_POST['attach_type'] !=="0"
  ){
    $Lprice = $_POST['Lprice'];
    $Hprice = $_POST['Hprice'];
    $beltType = $_POST['belt_type'];
    $attachType = $_POST['attach_type'];
    $stmt = $db->prepare('select * from bs where price between ? and ? and belt_type = ? and attach_type = ?');
    $stmt->bind_param('iiss',$Lprice,$Hprice,$beltType,$attachType);
    $stmt->execute();

// メーカーと種類とベルトタイプ
  }elseif(isset($_POST['manufacturer']) 
  && isset($_POST['Lprice']) 
  && isset($_POST['Hprice'])
  && isset($_POST['type']) 
  && isset($_POST['belt_type']) 
  && isset($_POST['attach_type'])
  && $_POST['manufacturer'] !=="0"
  && $_POST['type'] !=="0"
  && $_POST['belt_type'] !=="0"
  && $_POST['attach_type'] ==="0"
  ){
    $manufacturer = $_POST['manufacturer'];
    $Lprice = $_POST['Lprice'];
    $Hprice = $_POST['Hprice'];
    $type = $_POST['type'];
    $beltType = $_POST['belt_type'];
    $stmt = $db->prepare('select * from bs where manufacturer = ? and price between ? and ? and type = ? and belt_type = ?');
    $stmt->bind_param('siiss',$manufacturer,$Lprice,$Hprice,$type,$beltType);
    $stmt->execute();

// メーカーと種類と抱き方
  }elseif(isset($_POST['manufacturer']) 
  && isset($_POST['Lprice']) 
  && isset($_POST['Hprice'])
  && isset($_POST['type']) 
  && isset($_POST['belt_type']) 
  && isset($_POST['attach_type'])
  && $_POST['manufacturer'] !=="0"
  && $_POST['type'] !=="0"
  && $_POST['belt_type'] ==="0"
  && $_POST['attach_type'] !=="0"
  ){
    $manufacturer = $_POST['manufacturer'];
    $Lprice = $_POST['Lprice'];
    $Hprice = $_POST['Hprice'];
    $type = $_POST['type'];
    $attachType = $_POST['attach_type'];
    $stmt = $db->prepare('select * from bs where manufacturer = ? and price between ? and ? and type = ? and attach_type = ?');
    $stmt->bind_param('siiss',$manufacturer,$Lprice,$Hprice,$type,$attachType);
    $stmt->execute();

// メーカーと抱き方とベルトタイプ
  }elseif(isset($_POST['manufacturer']) 
  && isset($_POST['Lprice']) 
  && isset($_POST['Hprice'])
  && isset($_POST['type']) 
  && isset($_POST['belt_type']) 
  && isset($_POST['attach_type'])
  && $_POST['manufacturer'] !=="0"
  && $_POST['type'] ==="0"
  && $_POST['belt_type'] !=="0"
  && $_POST['attach_type'] !=="0"
  ){
    $manufacturer = $_POST['manufacturer'];
    $Lprice = $_POST['Lprice'];
    $Hprice = $_POST['Hprice'];
    $type = $_POST['type'];
    $attachType = $_POST['attach_type'];
    $stmt = $db->prepare('select * from bs where manufacturer = ? and price between ? and ? and type = ? and attach_type = ?');
    $stmt->bind_param('siiss',$manufacturer,$Lprice,$Hprice,$type,$attachType);
    $stmt->execute();

// 種類と抱き方とベルトタイプ
  }elseif(isset($_POST['manufacturer']) 
  && isset($_POST['Lprice']) 
  && isset($_POST['Hprice'])
  && isset($_POST['type']) 
  && isset($_POST['belt_type']) 
  && isset($_POST['attach_type'])
  && $_POST['manufacturer'] ==="0"
  && $_POST['type'] !=="0"
  && $_POST['belt_type'] !=="0"
  && $_POST['attach_type'] !=="0"
  ){
    $Lprice = $_POST['Lprice'];
    $Hprice = $_POST['Hprice'];
    $type = $_POST['type'];
    $beltType = $_POST['belt_type'];
    $attachType = $_POST['attach_type'];
    $stmt = $db->prepare('select * from bs where price between ? and ? and type = ? and belt_type = ? and attach_type = ?');
    $stmt->bind_param('iisss',$Lprice,$Hprice,$type,$beltType,$attachType);
    $stmt->execute();

// メーカーと種類と抱き方とベルトタイプ
  }elseif(isset($_POST['manufacturer']) 
  && isset($_POST['Lprice']) 
  && isset($_POST['Hprice'])
  && isset($_POST['type']) 
  && isset($_POST['belt_type']) 
  && isset($_POST['attach_type'])
  && $_POST['manufacturer'] !=="0"
  && $_POST['type'] !=="0"
  && $_POST['belt_type'] !=="0"
  && $_POST['attach_type'] !=="0"
  ){
    $manufacturer = $_POST['manufacturer'];
    $Lprice = $_POST['Lprice'];
    $Hprice = $_POST['Hprice'];
    $type = $_POST['type'];
    $beltType = $_POST['belt_type'];
    $attachType = $_POST['attach_type'];
    $stmt = $db->prepare('select * from bs where manufacturer = ? and price between ? and ? and type = ? and belt_type = ? and attach_type = ?');
    $stmt->bind_param('siisss',$manufacturer,$Lprice,$Hprice,$type,$beltType,$attachType);
    $stmt->execute();
  }
  ?>


  <table>
    <?php 
    if (isset($_POST['manufacturer']) 
    && isset($_POST['Lprice']) 
    && isset($_POST['Hprice'])
    && isset($_POST['type']) 
    && isset($_POST['belt_type']) 
    && isset($_POST['attach_type']) 
    ): 
    ?>
    <?php
    if ($stmt !== false): 
    ?>
    <?php
      $stmt->bind_result($id, $item, $manufacturer, $countrry, $price, $lifestyle, $type, $beltType, $attachType, $size, $color, $siteLink, $saleLink);
    ?>
    <tr>
      <th>メーカー</th>
      <th>商品名</th>
      <th>値段</th>
      <th>カラー</th>
      <th>サイト</th>
    </tr>
    <?php while ($stmt->fetch()) : ?>

    <tr>
      <td>
        <?php echo htmlspecialchars($manufacturer) . '<br>'; ?>
      </td>
      <td>
        <?php echo htmlspecialchars($item) . '<br>'; ?>
      </td>
      <td>
        <?php echo htmlspecialchars($price) . '<br>'; ?>
      </td>
      <td>
        <?php echo htmlspecialchars($color) . "色" . '<br>'; ?>
      </td>
      <td>
        <a href="<?php echo htmlspecialchars($siteLink); ?>">
          <?php echo htmlspecialchars($manufacturer); ?>の公式サイトでみる
        </a>
      </td>
    </tr>
    <?php endwhile; ?>
    <?php endif; ?>
    <?php endif; ?>

    <?php if ($Lprice > $Hprice) : ?>
      <h2>下限金額が上限金額より高く設定されています</h2>
    <?php endif; ?>

    <?php if ($id === "") : ?>
      <h2>対象商品がありません</h2>
      <h2>検索条件を変えてください</h2>
    <?php endif; ?>

  </table>


</html>