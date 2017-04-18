<?php
session_start();
// $username = $_SESSION['user_name']; 

$db = new PDO('mysql:host=localhost;dbname=login;charset=utf8', 'root', 'root');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);



  $sql = "SELECT *
  FROM emoji AS e
  INNER JOIN upload AS up 
  ON (e.emoji_id = up.emoji_id)
  INNER JOIN users AS u
  ON (up.user_name = u.user_name)
  WHERE u.user_name = '".$_SESSION['user_name']."'
  ORDER BY date ASC";

  $result = $db->prepare($sql);
    $result -> execute();
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    
    echo(json_encode($data));

?>