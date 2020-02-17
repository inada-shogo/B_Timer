<?php

$user = 'ar99_admin';
$pass = 'Shogo1231';

try{
 
  $db = new PDO(
      'mysql:host=mysql8086.xserver.jp;dbname=ar99_music',$user,$pass);

  $keyword = $_POST["keyword"];
 
} catch(PDOException $e) {
  die('エラーメッセージ：'.$e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
    
  <head>
    <meta charset="utf-8">
    <title>Airtist-Research(アーティストリサーチ)</title>
  </head>
  <body>
            <?php

$keyword = '%'.$keyword.'%';
//二つのカラムを同時に検索したい場合は以下
$stmt = $db->prepare("SELECT * FROM airtist_name WHERE name1 LIKE :keyword OR name2 LIKE :keyword");
$stmt->bindParam( ':keyword' ,$keyword, PDO::PARAM_STR);
$stmt->execute();

while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    
    
        print '<a href = "https://www.youtube.com/results?search_query='.htmlspecialchars($result['name1'],ENT_QUOTES,'UTF-8').'">'.htmlspecialchars($result['name1'],ENT_QUOTES,'UTF-8').'</a>';
    
        print '<a href = "https://www.youtube.com/results?search_query='.htmlspecialchars($result['name2'],ENT_QUOTES,'UTF-8').'">'.htmlspecialchars($result['name2'],ENT_QUOTES,'UTF-8').'</a>';
}


?>
      
    </body>
</html>