<?php 
    const DB_HOST = 'db';
    const DB_USER = 'root';
    const DB_PASSWORD = 'password';
    // 例外処理
    try {
      $dsn = 'mysql:host=db;dbname=posse;charset=utf8;';
      $username = 'root';
      $password = 'password';
      $driver_options = [
          PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_EMULATE_PREPARES => false,
      ];
      $pdo = new PDO($dsn, $username, $password, $driver_options);
  } catch(Exception $e) {
      print($e->getTraceAsString());
  }
    $id = $_GET['id'];
    // <!-- $idという変数にgetした値を返す -->
    $stmt = $pdo->prepare('SELECT * FROM big_questions WHERE id = ?');
    // 「:id」に対して値「1」をセット
    $stmt->bindValue(1, $id);
    $stmt->execute();
    $test =  $stmt->fetch();

    $question_stmt = $pdo->prepare('SELECT * FROM questions WHERE big_question_id = ?');
    // 「:id」に対して値「1」をセット
    $question_stmt->bindValue(1, $id);
    $question_stmt->execute();
    $question_results =  $question_stmt->fetchAll();
    // echo$question_results[1]['image'];
  ?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1><?php echo$test['name']?></h1>
<!-- // {（波カッコ）の代わりに、：（コロン）を使う -->
<?php foreach ($question_results as $question_result) : ?>

<img src="./img/<?php echo $question_result['image']; ?>"></img>

<!-- // 最後は endforeach と；（セミコロン）で閉じる -->
<?php endforeach; ?>
</body>
</html>