<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');
?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html lang="en-us" class="no-js ie6"> <![endif]-->
<!--[if IE 7]>    <html lang="en-us" class="no-js ie7"> <![endif]-->
<!--[if IE 8]>    <html lang="en-us" class="no-js ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en-us" class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

	<title>The Web Font Combinator</title>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script>
	if (typeof jQuery == 'undefined') {
	document.write('<script src="', 'javascript/jquery-1.7.1.min.js', '" type="text/JavaScript"><\/script>');
	}
	</script>
	<script src="javascript/chosen/chosen.jquery.min.js" type="text/javascript" charset="utf-8"></script>
	
	<script src="javascript/fc_functions.js" type="text/javascript" charset="utf-8"></script>
	
	<link rel="stylesheet" href="javascript/chosen/chosen.css" type="text/css" media="screen" title="no title" charset="utf-8" />
	
	<style type="text/css" media="screen">
	* {
		margin: 0;
		padding: 0;
		font-weight: regular;
	}
	
	h1 {
		font-size: 30px;
		font-size: regular;
		<?php
		if(isset($_GET['h1'])){ 
		   	 echo 'font-family: ' . $_GET['h1'] . ';';	 
		    }
		if(isset($_GET['h1size'])){ 
			   	 echo 'font-size: ' . $_GET['h1size'] . 'px;';	 
			    }
			
		// if(isset($_GET['h1w'])){ 
		// 	   	 echo 'font-weight: ' . $_GET['h1w'] . ';';	 
		// 	    }
		// if(isset($_GET['h1s'])){ 
		// 	   	 echo 'font-style: ' . $_GET['h1s'] . ';';	 
		// 	    }
	
		if(isset($_GET['h1color'])){ 
			   	 echo 'color: #' . $_GET['h1color'] . ';';	 
			    }
		?>
	}
	
	h2 {
		font-size: 20px;
		<?php
		if(isset($_GET['h2'])){ 
		   	 echo 'font-family: ' . $_GET['h2'] . ';';	 
		    }
		if(isset($_GET['h2size'])){ 
	   	 echo 'font-size: ' . $_GET['h2size'] . 'px;';	 
	    }
	
		if(isset($_GET['h2color'])){ 
				echo 'color: #' . $_GET['h2color'] . ';';	 
			}
		?>
	}
	
	p {
		font-size: 16px;
		line-height: 1.4;
		<?php
		if(isset($_GET['p'])){ 
		   	 echo 'font-family: ' . $_GET['p'] . ';';	 
		    }
		if(isset($_GET['h2size'])){ 
	   	 echo 'font-size: ' . $_GET['psize'] . 'px;';	 
	    }
	
		if(isset($_GET['pcolor'])){ 
				echo 'color: #' . $_GET['pcolor'] . ';';	 
			}

		if(isset($_GET['plh'])){ 
				echo 'line-height: ' . $_GET['plh'] . ';';	 
			}
		?>
	}
	
	select.variant_select {
		text-transform: capitalize;
	}
	</style>	
</head>
<body>
	
	<form action="index.php" method="get" accept-charset="utf-8">


		<section id="h1_sec">
			<h1 id="the_web_font_combinator" contenteditable="true">The Web Font Combinator</h1>
			<select name="h1" id="h1_select">
				<?php 
					include 'default_font_list_h1.php';
				?>	
			</select>
			<label for="h1size">Size:</label>
			<input type="range" name="h1size" value="<?php if(isset($_GET['h1size'])) {echo $_GET['h1size']; } else { echo '30'; } ?>"  id="h1size" />px
			<label for="h1lh">Line Height</label><input type="range" name="h1lh" value="<?php if(isset($_GET['h1lh'])) {echo $_GET['h1lh']; }  else { echo '1.4'; } ?>" id="h1lh" step="0.01" />
			<label for="h1color">Color:</label>
			<input type="text" name="h1color" value="<?php if(isset($_GET['h1color'])) {echo $_GET['h1color']; } ?>" placeholder="000000" id="h1color" />
			
		</section>
		<section id="h2_sec">	
			<h2 id="h2_text" contenteditable="true">A Web Typography Tool</h2>
			<select name="h2" id="h2_select">
				<?php include 'default_font_list_h2.php' ?>	
			</select>
			<label for="h2size">Size:</label>
			<input type="range" name="h2size" value="<?php if(isset($_GET['h2size'])) {echo $_GET['h2size']; } else { echo '20'; } ?>"  id="h2size" />px
			<label for="h2lh">Line Height</label><input type="range" name="plh" value="<?php if(isset($_GET['h2lh'])) {echo $_GET['h2lh']; }  else { echo '1.4'; } ?>" id="h2lh" step="0.01" />
			<label for="h2color">Color:</label>
			<input type="text" name="h2color" value="<?php if(isset($_GET['h2color'])) {echo $_GET['h2color']; } ?>" placeholder="000000" id="h2color" />
			
		</section>	
		<section id="p_sec">
			<p>Donec ante. Sed at velit. Vestibulum at purus at urna porttitor sodales. Nullam pulvinar, urna interdum eleifend sodales, eros est tempus quam, quis ultricies nibh elit vitae urna. Donec pretium arcu at quam. Quisque tristique, lacus id tempor blandit, quam massa imperdiet lorem, porta fermentum quam ante ac tortor. Curabitur mauris lectus, dapibus ut, ornare sit amet, vulputate sit amet, erat.</p>
			
			<select name="p" id="p_select">
				<?php include 'default_font_list_p.php' ?>	
			</select>
			<label for="psize">Size:</label>
			<input type="number" name="psize" value="<?php if(isset($_GET['psize'])) {echo $_GET['psize']; }  else { echo '16'; } ?>" placeholder="16" id="psize" />px
			<label for="plh">Line Height</label><input type="range" name="plh" value="<?php if(isset($_GET['plh'])) {echo $_GET['plh']; }  else { echo '1.4'; } ?>" id="plh" step="0.01" />
			<label for="pcolor">Color:</label>
			<input type="text" name="pcolor" value="<?php if(isset($_GET['pcolor'])) {echo $_GET['pcolor']; } ?>" placeholder="000000" id="pcolor" />
			
			
			
		</section>
		<input type="submit"  id="submit" />
			
	</form>
</body>
</html>
