<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Mood Library</title>
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
			        <div class = "header">
				  
				  <div class = "history">
                      <a href="d3.html"><img src="image/history.png" alt="blank!" width="50" height="50" border="0"></a>
				  </div>
                  <div class="logout">
                    <p>Hey, <?php echo $_SESSION['user_name']; ?>!</p>
                    <a href="index.php?logout">Logout</a>
                  </div>
				</div>
				<h1>Mood Library<span>Upload your mood <br>or click the circles to see other people's mood below</span></h1>
			</header>
            
            <div class="component">
                <button class="cn-button" id="cn-button">+</button>       
                <div id="cn-overlay" class="cn-overlay"></div>
            </div>
            
<!--            Circle background    -->
            <svg  viewBox="0 0 1000 500">
                <circle class="click-popup-call" fill-opacity="0.4" r="50" cx="50" cy="50"></circle>
                <circle class="click-popup-call" fill-opacity="0.4" r="50" cx="150" cy="50"></circle>
                <circle class="click-popup-call" fill-opacity="0.4" r="50" cx="250" cy="50"></circle>
                <circle class="click-popup-call" fill-opacity="0.4" r="50" cx="350" cy="50"></circle>
                <circle class="click-popup-call" fill-opacity="0.4" r="50" cx="450" cy="50"></circle>
                <circle class="click-popup-call" fill-opacity="0.4" r="50" cx="550" cy="50"></circle>
                <circle class="click-popup-call" fill-opacity="0.4" r="50" cx="650" cy="50"></circle>
                <circle class="click-popup-call" fill-opacity="0.4" r="50" cx="750" cy="50"></circle>
                <circle class="click-popup-call" fill-opacity="0.4" r="50" cx="850" cy="50"></circle>
                <circle class="click-popup-call" fill-opacity="0.4" r="50" cx="950" cy="50"></circle>
            </svg>
    <!--          Circle background End -->
            
          <div class="popup-call" tabindex="-1">
  
                <div class="card">
                  <div class="wall-container">
                  <div class = "close">
                  <button class = "close">X</button>
                  </div>

           <img class="wall-pic" src="http://www.transformingourselves.com/Images/Meditation-leaf.jpg" />
                  </div>
                  <div class="profile" >
                    <img class="profile-pic" src="emojis/good.png"/>
                   
                        <h2 id="fullname"> Tom Hanks </h2>
                        <p id="fullstory"> I'm very happy today, my mood is just like this leaf. </p>
                  </div>
                </div>
              </div>

    <!-- Popup Upload Form -->

      <div class="popup-call-form">
        <div class="form-card">
          <form action="index.php" method="post" enctype="multipart/form-data">

          <div class="inline">
            <div class="form-title">
              How were you?
            </div>
                  <div class="emojis">
                    <label class="radioGone">
                          <input type="radio" name="emoji_id" value="5" checked>
                            <img src="emojis/rad.png">
                    </label>

                    <label class="radioGone">
                          <input type="radio" name="emoji_id" value="4">
                            <img src="emojis/good.png">
                    </label>

                    <label class="radioGone">
                          <input type="radio" name="emoji_id" value="3">
                            <img src="emojis/normal.png">
                    </label>

                    <label class="radioGone">
                          <input type="radio" name="emoji_id" value="2">
                            <img src="emojis/sad.png">
                    </label>

                    <label class="radioGone">
                          <input type="radio" name="emoji_id" value="1">
                            <img src="emojis/awful.png">
                    </label>
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

            error_reporting(0);

            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    echo '<script language="javascript">';
                    echo 'alert("File is an image - ' . $check["mime"] . '.")';
                    echo '</script>';
                    $uploadOk = 1;
                } else {
                    echo '<script language="javascript">';
                    echo 'alert("File is not an image.")';
                    echo '</script>';
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_file) && isset($_POST["submit"])) {
                echo '<script language="javascript">';
                echo 'alert("Sorry, file already exists.")';
                echo '</script>';
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000 && isset($_POST["submit"])) {
                echo '<script language="javascript">';
                echo 'alert("Sorry, your file is too large.")';
                echo '</script>';
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" && isset($_POST["submit"])) {
                echo '<script language="javascript">';
                echo 'alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")';
                echo '</script>';
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo '<script language="javascript">';
                echo 'alert("Sorry, your file was not uploaded.")';
                echo '</script>';
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo '<script language="javascript">';
                    echo 'alert("Thank you for sharing your mood! The file'. basename( $_FILES["fileToUpload"]["name"]). ' has been uploaded.")';
                    echo '</script>';
                } 
//                 else {
//                     echo '<script language="javascript">';
//                     echo 'alert("Sorry, there was an error uploading your file.")';
//                     echo '</script>';
//                 }
            }

                $db = new PDO();
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

                    $username = $_SESSION['user_name'];
                    $date = date("Y/m/d");

                if(isset($_POST['emoji_id'])&&isset($_POST['story'])){
                    $emoji = $_POST['emoji_id'];
                    $story = $_POST['story'];
                    $filename = ($_FILES["fileToUpload"]["name"]);
                    $sql = "INSERT INTO `upload` (`emoji_id`,`story`,`user_name`,`date`,`picturename`) VALUES (?,?,?,?,?)";
                    $query = $db->prepare($sql);
                    $result = $query->execute([$emoji, $story,  $username, $date, $filename]);
                }

        ?>


        <script>   
            //popup 
          $(document).ready(function(){
            $(".click-popup-call").click(function(e){

                var myRequest = new XMLHttpRequest;
                myRequest.onreadystatechange = function(){     
                    console.log(myRequest.readyState); // return 1,2,3,4    
                    if(myRequest.readyState === 4){        
                    console.log(myRequest.responseText);// modify or populate html elements based on response.
      
                    var responseObject = JSON.parse(myRequest.responseText); //return as a javascript object
                    //the variable response is now an object representation of the responseText JSON-formatted string.
                    var x = Math.floor((Math.random() * responseObject.length));
                    console.log(x);

                    var picture = responseObject[x].picturename;
                    var mood = responseObject[x].emoji_image;
                    var fullname = responseObject[x].user_name;
                    var fullstory = responseObject[x].story;

                    $(".wall-pic").removeAttr('src');
                    $(".wall-pic").attr('src', 'uploads/' + picture);

                    $(".profile-pic").removeAttr('src');
                    $(".profile-pic").attr('src', 'emojis/' + mood);

                    $("#fullname").html( fullname );
                    $("#fullstory").html( fullstory );
                    
                  }
                }
                //replace existing data

                //$(element).find('.wall-pic').removeAttr('src');
                //$(element).find('.wall-pic').attr('src', 'uploads/' + responseObject[Math.random()].picturename);

                myRequest.open("GET", "datajson_test.php", true); //making the actual request, true means it is asynchronous // Send urls through the url
                myRequest.send(null);

                e.preventDefault();
                $(".popup-call").fadeIn(300);

                });

                $('.close').click(function() {
                   $(".popup-call").fadeOut(300);
                });


              $('.cn-button').on('click', function(){
                $('.popup-call-form').toggleClass('popup-call-show-form');
              });

            });


   
        </script>
        <script src="js/polyfills.js"></script>
    </body>
</html>
