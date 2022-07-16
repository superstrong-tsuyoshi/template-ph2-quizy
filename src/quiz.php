<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php 
  // const DB_HOST = 'db';
  // const DB_USER = 'root';
  // const DB_PASSWORD = 'password';
  
  
  // //例外処理
  // try{
  //   $pdo = new PDO(DB_HOST,DB_USER,DB_PASSWORD,[
  //     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,//連想配列
  //     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,//例外
  //     PDO::ATTR_EMULATE_PREPARES => false,//SQLインジェクション対策
  //   ]);
  //   echo '接続成功';
  // }catch(PDOException $e){
  //   echo '接続失敗' ,$e->getMessage() . "\n";
  //   exit();
  // }
  $id = $_GET['id'];
    // <!-- $idという変数にgetした値を返す -->
  ?>
  <p>hello world</p>
</body>
</html>