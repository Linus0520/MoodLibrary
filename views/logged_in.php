<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Group web
		</title>
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component1.css" />
		<script src="js/modernizr-2.6.2.min.js"></script>


	</head>
	<!-- if you need user information, just put them into the $_SESSION variable and output them here -->
<body>



<!-- because people were asking: "index.php?logout" is just my simplified form of "index.php?logout=true" -->

<div class="container">
			<!-- Top Navigation -->
			<div class="codrops-top clearfix">
				
<!--				<span class="right"><a class="codrops-icon codrops-icon-drop" href="http://tympanus.net/codrops/?p=16114"><span>Back to the Codrops Article</span></a></span>-->
			</div>
			<header>
			    <div class = "log">
					<p>Hey, <?php echo $_SESSION['user_name']; ?>. You are logged in.
					Try to close this browser tab and open it again. Still logged in! ;)</p>
					<a href="index.php?logout">Logout</a>
	            </div>
				<h1>Group Web  <span>See other people's mood</span></h1>
			</header>
			
			<div class="component">
				<!-- Start Nav Structure -->
				<button class="cn-button" id="cn-button"><a href = "add.php">+</a></button>
				<div class="cn-wrapper" id="cn-wrapper">
				</div>
					<div class="sidemenu">
                        <nav class="left"> </nav>
                        <nav class="right"> </nav>
                    </div>
                    
				<div id="cn-overlay" class="cn-overlay"></div>
				<!-- End Nav Structure -->
			</div>
			
	        
            <svg viewBox="0 0 1000 500">
              <a href="display.php"><circle r="50" cx="50" cy="250"></circle></a>
              <circle r="50" cx="150" cy="250"></circle>
              <circle r="50" cx="250" cy="250"></circle>
              <circle r="50" cx="350" cy="250"></circle>
              <circle r="50" cx="450" cy="250"></circle>
              <circle r="50" cx="550" cy="250"></circle>
              <circle r="50" cx="650" cy="250"></circle>
              <circle r="50" cx="750" cy="250"></circle>
              <circle r="50" cx="850" cy="250"></circle>
              <circle r="50" cx="950" cy="250"></circle>
            </svg>
          

		</div><!-- /container -->

<script src="js/polyfills.js"></script>
		<script src="js/demo1.js"></script>
		<!-- For the demo ad only -->   
<script src="http://tympanus.net/codrops/adpacks/demoad.js"></script>
	</body>
</html>