<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Group web</title>
	<link rel="shortcut icon" href="image/leaf.png" type="image/x-icon">
<link rel="icon" href="image/leaf.png" type="image/x-icon">
<!--        CSS FILE-->
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component1.css" />
<!--        JS FILE-->
		<script src="js/modernizr-2.6.2.min.js"></script>
        <script src="js/jquery-2.1.1.min.js"></script>
        <script src="js/jquery.gradientify.min.js"></script>

        <script>
            //change the background
            $(document).ready(function() {
                $("body").gradientify({
                    gradients: [
                        { start: [49,76,172], stop: [242,159,191] },
                        { start: [255,103,69], stop: [240,154,241] },
                        { start: [33,229,241], stop: [235,236,117] }
                    ]
                });
            });

        </script>

	</head>
	<body>
		<div class="container">

			<header>
				<h1>Mood Library<span>Upload your mood <br>or click the balls to see other people's mood below</span></h1>
			</header>
			
			<div class="component">
				<button class="cn-button" id="cn-button">+</button>       
				<div id="cn-overlay" class="cn-overlay"></div>
			</div>
			
<!--	        Circle background    -->
            <svg  viewBox="0 0 1000 500">
                <circle class="click-popup-call" fill-opacity="0.4" r="50" cx="50" cy="50"></circle>
                <circle class="click-popup-call" fill-opacity="0.4" r="50" cx="150" cy="250"></circle>
                <circle class="click-popup-call" fill-opacity="0.4" r="50" cx="250" cy="250"></circle>
                <circle class="click-popup-call" fill-opacity="0.4" r="50" cx="350" cy="250"></circle>
                <circle class="click-popup-call" fill-opacity="0.4" r="50" cx="450" cy="250"></circle>
                <circle class="click-popup-call" fill-opacity="0.4" r="50" cx="550" cy="250"></circle>
                 <circle class="click-popup-call" fill-opacity="0.4" r="50" cx="650" cy="250"></circle>
                <circle class="click-popup-call" fill-opacity="0.4" r="50" cx="750" cy="250"></circle>
                <circle class="click-popup-call" fill-opacity="0.4" r="50" cx="850" cy="250"></circle>
                <circle class="click-popup-call" fill-opacity="0.4" r="50" cx="950" cy="250"></circle>
            </svg>
    <!--	      Circle background End -->
            
          <div class="popup-call">
  
                <div class="card">
                  <div class="wall-container">

          <?php
            $db = new PDO('mysql:host=localhost;dbname=login;charset=utf8', 'root', 'root');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            $sql = "SELECT * 
            FROM `upload` INNER JOIN `emoji` 
            ON (`emoji`.`emoji_id`=`upload`.`emoji_id`)
            ORDER BY RAND() LIMIT 1";

            $sth = $db->prepare($sql);
            $sth->execute();
            $result = $sth->fetchAll();
            print_r(result);

            echo "<img class='wall-pic' src='uploads/".$result[0]['picturename']."'/></div>
                  <div class='profile' >
                    <img class='profile-pic' src='emojis/".$result[0]['emoji_image']."'/>";
            echo "<h2>Tom Hanks</h2>"; //we havn't figured out how to input the user name data, so can't display yet
            echo "<p>".$result[0]['story']."</p>"

          ?>
       <!--     <img class="wall-pic"   src="http://www.transformingourselves.com/Images/Meditation-leaf.jpg" />
                  </div>
                  <div class="profile" >
                    <img class="profile-pic" src="image/happiness.png"/>
                    -->
                       <!--  <h2> Tom Hanks</h2>
                        <p>I'm very happy today, my mood is just like this leaf. </p> -->
                    
                  </div>
               <span id='close' onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;'>x</span>
                </div>
              </div>

    <!-- Popup Upload Form -->

      <div class="popup-call-form">
        <div class="form-card">
          <form action="upload.php" method="post" enctype="multipart/form-data">

          <div class="inline">
            <div class="form-title">
              How were you?
            </div>
            <div>
              <input type="radio" name="emoji_id" value="1" checked> 
                <img src="emojis/rad.png">Rad
              <input type="radio" name="emoji_id" value="2"> 
                <img src="emojis/good.png">Good
              <input type="radio" name="emoji_id" value="3"> 
                <img src="emojis/normal.png">Meh
              <input type="radio" name="emoji_id" value="4">
                <img src="emojis/sad.png"> Sad
              <input type="radio" name="emoji_id" value="5"> 
                <img src="emojis/awful.png">Awful
            </div>
          </div>

          <ul class="formstyle">
              <li><textarea name="story" rows="10" cols="55" placeholder='Tell us your story'></textarea></li>
              <li>
                <input type="file" name="fileToUpload" id="fileToUpload">
              </li>    
          </ul>
          <div class="submit">
            <input class="myButton" type='submit' />
          </div>
        </form>
        </div>
      </div>
            
</div>
      
      <?php
      $db = new PDO('mysql:host=localhost;dbname=login;charset=utf8', 'root', 'root');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);



        $userID = $_SESSION['user_id'];
        $date = date("Y/m/d");


        if(isset($_POST['emoji_id'])&&isset($_POST['story'])){
          $emoji = $_POST['emoji_id'];
          $story = $_POST['story'];
          $sql = "INSERT INTO `upload` (`emoji_id`,`story`,`user_id`,`date`) VALUES (?,?,?,?)";
          $query = $db->prepare($sql);
            $result = $query->execute([$emoji, $story, $userID, $date]);
        }

      ?>



        <script>   
            //popup 
          $(document).ready(function(){
              $('.click-popup-call').on('click', function(){
                $('.popup-call').toggleClass('popup-call-show');
              });

              $('.cn-button').on('click', function(){
                $('.popup-call-form').toggleClass('popup-call-show-form');
              });
            });


   
        </script>
        <script src="js/polyfills.js"></script>
		<script src="js/demo1.js"></script>
	</body>
</html>
