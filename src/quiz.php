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
    $stmt = $pdo->prepare('SELECT * FROM big_questions WHERE id = :id');
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $test =  $stmt->fetch();

    $question_stmt = $pdo->prepare('SELECT * FROM questions WHERE big_question_id = :id');
    $question_stmt->bindValue(':id', $id);
    $question_stmt->execute();
    $question_results =  $question_stmt->fetchAll();


  ?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css" />
  <title>Document</title>
</head>
<body>
  <div class="container">
    <h1><?php echo$test['name']?></h1>
  <!-- // {（波カッコ）の代わりに、：（コロン）を使う -->
    
    <?php foreach ($question_results as $question_result) : ?>
      <h2><?php echo $question_result['id']?>、この地名なんて読む？</h2>
      <img src="./img/<?php echo $question_result['image']; ?>"></img>
      <ul>
      <?php 
      $choice_stmt = $pdo->prepare('SELECT * FROM choices WHERE question_id = :id');
      $choice_stmt->bindValue(':id', $question_result['id']);
      $choice_stmt->execute();
      $choice_results =  $choice_stmt->fetchAll();
      ?>
          <?php foreach ($choice_results as $choice_result) : ?>
        <li><?= $choice_result['name']?></li>
        <?php endforeach; ?>
      </ul>
  
  <!-- // 最後は endforeach と；（セミコロン）で閉じる -->
  <?php endforeach; ?>
  </div>
</body>
</html>