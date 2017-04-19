<?php

	$db = new PDO();
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

	$sql = "SELECT * 
            FROM `upload` INNER JOIN `emoji` 
            ON (`emoji`.`emoji_id`=`upload`.`emoji_id`)";

	$result = $db->prepare($sql);
    $result -> execute();
    $data = $result->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC - returns an array indexed by column name as returned in your result set, instead of indexs

    echo(json_encode($data));

    /* FOLLOWING IS MY ORIGINAL SOLUTION, ABOVE IS TEACHER'S SOLUTION */

  //   foreach( $data as $row ) {
  //   	$arr = array('First Name' => $row['firstName'],
  //   			'Last Name' => $row['lastName'],
  //   			'Age' => $row['age']);
  //   	echo json_encode($arr);
		// }

    /* REFERENCE*/

    // $arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5); 
	// echo json_encode($arr);
 

    ?>
