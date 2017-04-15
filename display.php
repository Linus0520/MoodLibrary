<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Display</title>
</head>
<body>
<div class = "main">
  <?php
  $db = new PDO('mysql:host=localhost; dbname=login;charset=utf8', 'root', 'root');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

  $sql = "SELECT DISTINCT
  u.user_id,
  e.emoji_id,
  e.emoji_image AS emoji_pic,
  u.user_name AS username,
  up.picturename AS picture,
  up.story AS story
  FROM emoji AS e
  INNER JOIN upload AS up 
  ON (e.emoji_id = up.emoji_id)
  INNER JOIN users AS u
  ON (up.user_id = u.user_id)";
  
  try{
   $query = $db->prepare( $sql );
   $result = $query->execute(); 
 } catch( PDOException $err ) {
   echo "ERROR: " . $err->getMessage();
 }
 $data = $query->fetchAll();

 foreach($data as $row){
     echo "<div class = 'img'>" ."<img src='uploads/" . $row['picture'] . "' alt='' width=400 height=400'/>" ."</div>"; 
     echo "<div class = 'emoji'>" ."<img src='emojis/" . $row['emoji_pic']. "' alt=''/>" . "</div>";
     echo "<div class = 'story'>" . $row['story'] . "</div>";
     echo "<div class = 'close'><a href = 'index.php'>BACK</div>";
 }

  ?>
  </div>
 
 
 



</body>
</html>

 