<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- For Proper Mobile Rendering -->
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>The Pensive Bear</title>
		<meta name="description" content="Free Web tutorials">
		<meta name="keywords" content="Machine Learning, data science, computer science, pensive bear">
		<meta name="author" content="Julien Hoachuck">

		<!-- Bootstrap -->
		<link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="style.css" rel="stylesheet">
		<link rel="shortcut icon" href="PensiveBear_Logo.png" />
	</head>

	<body>
		<!-- jQuery (necessary for Bootstrap's JS plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

		<!-- Include all plugins below, or individual files as needed -->
		<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>

<div id="main">
		<div class="container-fluid" id="Top">

			<div class="row" id="MenuBar">
				<div class="col-sm-8 MenuBarCol" id="MenuFill">
				</div><!--
				--><div class="col-sm-1 MenuBarCol" id="MenuHome">
					<a href="index.php" style="text-decoration: none;"><p>Home</p></a>
				</div><!--
				--><div class="col-sm-1 MenuBarCol" id="MenuML">
					<a href="index.php?filter=ML" style="text-decoration: none;"><p>ML</p></a>
				</div><!--
				--><div class="col-sm-1 MenuBarCol" id="MenuIOS">
					<a href="index.php?filter=iOS" style="text-decoration: none;"><p>iOS</p></a>
				</div><!--
				--><div class="col-sm-1 MenuBarCol" id="MenuGrowth">
					<a href="index.php?filter=Growth" style="text-decoration: none;"><p>Growth</p></a>
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
				<a href="index.php"><img  id="BannerImg" src="PensiveBear_Geo_banner.png"/></a>
			</div>
		</div>

		<div class="container-fluid" id="Content">

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

			$sql = 'SELECT Type, Title, Subtitle, PostDate, Content FROM Posts';
			mysql_select_db('test');
			$retval = mysql_query( $sql, $link);

			if(! $retval ) {
				die('Could not get data: ' . mysql_error());
			}

			while ( $row = mysql_fetch_assoc($retval)) {?>
				<div class="row ContentBlock">
					<div class="col-sm-3 LeftColumn">
						<div class="CategoryTab">
							<p><?php echo "{$row['Type']}";?></p>
						</div>
					</div>

					<div class="col-sm-6 col-med-6 EntryColumn">
						<a href="page2.php?title=<?php echo "{$row['Title']}";?>" style="text-decoration: none;">
							<h1 class="EntryTitle"><?php echo "{$row['Title']}";?> <small class="EntrySubtitle"><?php echo "{$row['Subtitle']}";?></small></h1>
						</a>
						<p class="EntryDate"><?php $date = "{$row['PostDate']}"; $formatted = date("F j, Y", $date); echo $formatted;?></p>
						
						<span class="EntryText">
							<p><?php echo "{$row['Content']}";?></p>
						</span>
						
					</div>

					<div class="Resized">
						<a href="page2.php?title=<?php echo "{$row['Title']}";?>"><p>Read More...</p></a>
					</div>
				</div>
			<?php }
		?>
		</div>

		<div class="container-fluid" id="AboutMe">
			<div class="row">
				<div class="col-sm-2">
				</div>

				<div class="col-sm-6" id="About">
					<h1 id="AboutTitle">About the Pensive Bear <small> ...AKA Julien</small></h1>
					<span id="AboutText">
						<p>The Pensive Bear is a data scientist living in the Silicon Valley. He loves Machine Learning, robots, and coffee. In his free time you might find him working out, listening to awesome music, or hanging out with his bear girlfriend (who built this really awesome website for him). You also might find him devouring a large array of desserts, or hanging out on his laptop in a coffee shop. </p>
					</span>
					<div id="Links">
						<div class="LinkButton" id="GitHub">
							<a href="https://github.com/mechaman" target="_blank">
								<img src="github.png"/>
							</a>
						</div>
						<div class="LinkButton" id="LinkedIn">
							<a href="https://www.linkedin.com/in/julienhoachuck" target="_blank">
								<img src="linkedin_green.png"/>
							</a>
						</div>
					</div>
				</div>

				<div class="col-sm-3">
					<img src="juju_detail.png" id="JulienImg"/>
				</div>
			</div>
		</div>

		<div class="container-fluid" id="BottomBar">
			<p>Julien Hoachuck &copy; 2016</p>
		</div>


		<!--<script>
			$(document).ready(function() {
				/* --- Function for Menu Bar coloring ---*/
				$('.MenuBarCol').click(function() { 
					var id = $(this).attr("id"); /* Get ID */
					var color = "white";
					var borderColor = "white"; /* Underline shades are the fifth shade from the top on color picker */

					/* Set vars according to Menu tab that was clicked */
					if ( id == "MenuHome" ) {
						color = "#190C99"; /* Blue */
						borderColor = "#a3b0f8";
					}
					if ( id == "MenuML") {
						color = "#9BD22D"; /* Lime green */
						borderColor = "#d7edab";
					}
					if ( id == "MenuIOS" ) {
						color = "#BF245E"; /* Fuschia */
						borderColor = "#efa9c3";
					}
					if ( id == "MenuGrowth" ) {
						color = "#662E91"; /* Purple */
						borderColor = "#cfb2e6";
					}

					/* Set all tabs back to original color (accounts for clicking in backwards order in the menu) */
					$('#MenuHome').css("background-color", "#190C99");
					$('#MenuML').css("background-color", "#9BD22D");
					$('#MenuIOS').css("background-color", "#BF245E");
					$('#MenuGrowth').css("background-color", "#662E91");

					$(this).prevAll().css("background-color", color); /* Flush all previous tabs with clicked tab's color */

					/* Set all tab borders to original color (accounts for tab borders that were flushed) */
					$('#MenuHome').css("border-right", "5px solid " + '#190C99');
					$('#MenuML').css("border-right", "5px solid " + '#9BD22D');
					$('#MenuIOS').css("border-right", "5px solid " + '#BF245E');
					$('#MenuGrowth').css("border-right", "5px solid " + '#662E91');
					$(this).prevAll().css("border-right", "5px solid " + color); /* Flush all previous tab borders with clicked tab's color */
					$(this).css("border-right", "5px solid " + borderColor); /* Set this tab's correct border color */

				});


				/*--- Function for MenuBar filtering ---*/
				$('.MenuBarCol').click(function() { 
					var filter = $(this).children('p').text(); /* Which tab was clicked */
					$('.ContentBlock').each(function() { /* Go through each post */
						var text = $(this).find($('.CategoryTab p')).text(); /* Get category of post */
						if (filter == "Home") { /* if clicked on home show everything */
							$(this).css("display","block");
						} 
						else {
							if (text == filter) { /* have to do this to re-display previously hidden posts */
								$(this).css("display","block");
							}
							if (text != filter) { /* hide irrelevant posts */
								$(this).css("display", "none");
							}
						}

					});
				});
			});
		</script>-->

		<script>
			$(document).ready(function() {
				/*--- Function for limiting height of content blocks ---*/
				$('.ContentBlock').each(function() { 
					if ($(this).height() > '730') { /* 730 to leave a little room. Don't need to resize a 730px div to 700 */
						$(this).css("height", "700px");
						$(this).children($('.Resized')).css("display", "block"); /* Display Read More */
						$(this).css("margin-bottom","50px"); /* workaround for <br>/absolute issue */
					}
				});

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
			});
		</script>

		<!-- Big fat crazy if statement for filtering -->
		<?php
			if ($_GET['filter'] == null) {?>
			<script>
			$(document).ready(function() {
				$('#MenuFill').css("background-color", "#190C99");
				$('#MenuHome').css("background-color", "#190C99");
				$('#MenuML').css("background-color", "#9BD22D");
				$('#MenuIOS').css("background-color", "#BF245E");
				$('#MenuGrowth').css("background-color", "#662E91");

				/* Set all tab borders to original color (accounts for tab borders that were flushed) */
				$('#MenuHome').css("border-right", "5px solid " + '#a3b0f8');
			});
			</script>

		<?php }

			if ($_GET['filter'] == "ML" ) { ?>
				<script>
				$(document).ready(function() {
					$('.ContentBlock').each(function() { /* Go through each post */
						var text = $(this).find($('.CategoryTab p')).text(); /* Get category of post */
						if (text == "ML") { /* have to do this to re-display previously hidden posts */
								$(this).css("display","block");
						}
						else { /* hide irrelevant posts */
								$(this).css("display", "none");
						}
					});
					var color = "#9BD22D";
					var borderColor = "#d7edab"
					/* Set tabs at and after ML back to original color (accounts for clicking in backwards order in the menu) */
					$('#MenuML').css("background-color", color);
					$('#MenuIOS').css("background-color", "#BF245E");
					$('#MenuGrowth').css("background-color", "#662E91");

					$('#MenuML').prevAll().css("background-color", color); /* Flush all previous tabs with clicked tab's color */

					/* Set all tab borders after ML to original color (accounts for tab borders that were flushed) */
					$('#MenuIOS').css("border-right", "5px solid " + '#BF245E');
					$('#MenuGrowth').css("border-right", "5px solid " + '#662E91');
					$('#MenuML').prevAll().css("border-right", "5px solid " + color); /* Flush all previous tab borders with clicked tab's color */
					$('#MenuML').css("border-right", "5px solid " + borderColor); /* Set this tab's correct border color */
				});
				</script>
		<?php } 
			if ($_GET['filter'] == "iOS" ) { ?>
				<script>
				$(document).ready(function() {
					$('.ContentBlock').each(function() { /* Go through each post */
						var text = $(this).find($('.CategoryTab p')).text(); /* Get category of post */
						if (text == "iOS") { /* have to do this to re-display previously hidden posts */
								$(this).css("display","block");
						}
						else { /* hide irrelevant posts */
								$(this).css("display", "none");
						}
					});
					var color = "#BF245E"; /* Fuschia */
					var borderColor = "#efa9c3";
					/* Set tabs at and after iOS back to original color (accounts for clicking in backwards order in the menu) */
					$('#MenuIOS').css("background-color", color);
					$('#MenuGrowth').css("background-color", "#662E91");

					$('#MenuIOS').prevAll().css("background-color", color); /* Flush all previous tabs with clicked tab's color */

					/* Set all tab borders after iOS to original color (accounts for tab borders that were flushed) */
					$('#MenuGrowth').css("border-right", "5px solid " + '#662E91');
					$('#MenuIOS').prevAll().css("border-right", "5px solid " + color); /* Flush all previous tab borders with clicked tab's color */
					$('#MenuIOS').css("border-right", "5px solid " + borderColor); /* Set this tab's correct border color */
				});
				</script>
		<?php }
			if ($_GET['filter'] == "Growth" ) { ?>
				<script>
				$(document).ready(function() {
					$('.ContentBlock').each(function() { /* Go through each post */
						var text = $(this).find($('.CategoryTab p')).text(); /* Get category of post */
						if (text == "Growth") { /* have to do this to re-display previously hidden posts */
								$(this).css("display","block");
						}
						else { /* hide irrelevant posts */
								$(this).css("display", "none");
						}
					});
					var color = "#662E91"; /* Purple */
					var borderColor = "#cfb2e6";
					/* Set tabs at and after Growth back to original color (accounts for clicking in backwards order in the menu) */
					$('#MenuGrowth').css("background-color", color);

					$('#MenuGrowth').prevAll().css("background-color", color); /* Flush all previous tabs with clicked tab's color */

					$('#MenuGrowth').prevAll().css("border-right", "5px solid " + color); /* Flush all previous tab borders with clicked tab's color */
					$('#MenuGrowth').css("border-right", "5px solid " + borderColor); /* Set this tab's correct border color */
				});
				</script>
		<?php } ?>

</div>
	</body>
</html>