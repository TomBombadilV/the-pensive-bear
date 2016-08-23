<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- For Proper Mobile Rendering -->
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>The Pensive Bear</title>

		<!-- Bootstrap -->
		<link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="style.css" rel="stylesheet">
	</head>

	<body>
		<!-- jQuery (necessary for Bootstrap's JS plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

		<!-- Include all plugins below, or individual files as needed -->
		<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>

		<div class="container-fluid" id="Top">

			<div class="row" id="MenuBar">
				<div class="col-sm-8 MenuBarCol" id="MenuFill">
				</div><!--
		
				--><div class="col-sm-1 MenuBarCol" id="MenuHome">
					<a href="index.php"  style="text-decoration: none"><p>Home</p></a>
				</div><!--
	
				--><div class="col-sm-1 MenuBarCol" id="MenuML">
					<a href="index.php?filter=ML"  style="text-decoration: none"><p>ML</p></a>
				</div><!--

				--><div class="col-sm-1 MenuBarCol" id="MenuIOS">
					<a href="index.php?filter=iOS"  style="text-decoration: none"><p>iOS</p></a>
				</div><!--
	
				--><div class="col-sm-1 MenuBarCol" id="MenuGrowth">
					<a href="index.php?filter=Growth"  style="text-decoration: none"><p>Growth</p></a>
				</div>
			
			</div>

			<div class="row" id="TitleBar">
				<div class="col-sm-1"></div>
				<!--<div class="col-sm-5 TitleBarItem" id="TitleBarImgs">
					<img id="BearImg" src="PensiveBear_Geo_5px.png">-->
					<!--<img id="BearImg" src="http://pngimg.com/upload/bear_PNG1200.png"/>-->
					<!--<img id="RobotImg" src="http://megaicons.net/static/img/icons_sizes/276/700/256/robot-icon.png"/>
					<img id="RobotImg" src="http://megaicons.net/static/img/icons_sizes/276/700/256/robot-icon.png"/>
					<img id="RobotImg" src="http://megaicons.net/static/img/icons_sizes/276/700/256/robot-icon.png"/>
				</div>
				<div class="col-sm-6 TitleBarItem" id="TitleBarText">
					<p> Thoughts &&<br> Experiments</p>
				</div>-->
				<a href="index.php"><img id="BannerImg" src="PensiveBear_Geo_banner.png"/></a>
			</div>
		</div>

		<?php 
			$dbhost = "localhost:8888";
			$user = "root";
			$password = "root";

			$link = mysql_connect(
				"$dbhost",
				$user,
				$password
			);

			if(! $link ){
				die('Could not connect: ' . mysql_error());
			}

			$title = $_GET['title'];
			$sql = "SELECT Type, Subtitle, PostDate, Content FROM Posts WHERE Title = '$title'";
			mysql_select_db('test');
			$retval = mysql_query( $sql, $link);
			if(! $retval ) {
				die('Could not get data: ' . mysql_error());
			}
			$row = mysql_fetch_assoc($retval);

		?>
		<div class="container-fluid" id="Content">
			<div class="row ContentBlock">
				<div class="col-sm-3 LeftColumn">
					<div class="CategoryTab">
						<p><?php echo "{$row['Type']}";?></p>
					</div>
				</div>

				<div class="col-sm-7 col-med-7 EntryColumn">
					<h1 class="EntryTitle"><?php echo $title;?> <small class="EntrySubtitle"><?php echo "{$row['Subtitle']}";?></small></h1>

					<p class="EntryDate"><?php $date = "{$row['PostDate']}"; $formatted = date("F j, Y", $date); echo $formatted;?></p>
					
					<span class="EntryText">
						<p><?php echo "{$row['Content']}";?></p>
					</span>
					
				</div>
			</div>
		</div>

		<div class="container-fluid" id="Comment">
		</div>

		<div class="container-fluid" id="AboutMe">
			<div class="row">
				<div class="col-sm-2">
				</div>

				<div class="col-sm-6" id="About">
					<h1 id="AboutTitle">About the Pensive Bear <small> ...AKA Julien</small></h1>
					<span id="AboutText">
						<p>Julien is a data scientist living in the Silicon Valley. He loves Machine Learning, robots, and coffee. In his free time you might find him working out, listening to awesome music, or hanging out with his bear girlfriend (who built this really awesome website for him). You also might find him devouring a large array of desserts, or hanging out on his laptop in a coffee shop. </p>

						

						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</span>
				</div>

				<div class="col-sm-3">
					<img src="juju_detail.png" id="JulienImg"/>
				</div>
			</div>
		</div>

		<div class="container-fluid" id="BottomBar">
			<p>Julien Hoachuck &copy; 2016</p>
		</div>

	</body>

	<script>
			$(document).ready(function() {
				/*--- Function for Coloring Tabs ---*/
				$('.CategoryTab').each(function() {
					if ($(this).children($('p')).text() == "ML") {
						$(this).css("background-color", "#9BD22D");
					}
					else if ($(this).children($('p')).text() == "iOS") {
						$(this).css("background-color", "#BF245E");
					}
					else if ($(this).children($('p')).text() == "Growth") {
						$(this).css("background-color", "#662E91");
					}

				});

				/* --- Function for Menu Bar coloring ---*/
				var id = $('.CategoryTab').children($('p')).text();

				if ( id == "ML") {
					borderColor = "#d7edab";
				}
				if ( id == "iOS" ) {
					borderColor = "#efa9c3";
				}
				if ( id == "Growth" ) {
					borderColor = "#cfb2e6";
				}
				/* Set all tabs back to original color (accounts for clicking in backwards order in the menu) */
					$('#MenuHome').css("background-color", "#190C99");
					$('#MenuML').css("background-color", "#9BD22D");
					$('#MenuIOS').css("background-color", "#BF245E");
					$('#MenuGrowth').css("background-color", "#662E91");

				var color = $('.CategoryTab').css("background-color");
				var tab = 0;
				$('.MenuBarCol').each(function() {
					if($(this).children($('p')).text() == id) {
						tab = $(this);
					}
				});
				tab.prevAll().css("background-color", color);
				tab.prevAll().css("border-right", "5px solid " + color); /* Flush all previous tab borders with clicked tab's color */
				tab.css("border-right", "5px solid " + borderColor);
			});
		</script>
</html>
