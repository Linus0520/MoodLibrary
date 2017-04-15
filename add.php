<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
<ul>
	<li>Your Name:<input type='text' name='name' placeholder='Put your name here'/></li>
    <li>Your Story:<textarea name="story" rows="10" cols="40" placeholder='Tell us your story'></textarea></li>
    <li>Select image to upload:
    	<input type="file" name="fileToUpload" id="fileToUpload">
   		<input type="submit" value="Upload Image" name="submit">
   	</li>    
</ul>
 <input type='submit' />
</form>
<?php
$db = new PDO('mysql:host=localhost;dbname=login;charset=utf8', 'root', 'root');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

	if(isset($_POST['name'])&&isset($_POST['story'])){
		$name = $_POST['name'];
		$story = $_POST['story'];
		$sql = "INSERT INTO `upload` (`name`,`story`) VALUES (?,?)";
		$query = $db->prepare($sql);
	    $result = $query->execute([$name, $story]);
	}

?>

</body>
</html>