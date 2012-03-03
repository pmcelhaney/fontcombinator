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
	<script src="javascript/colorpicker.js" type="text/javascript" charset="utf-8"></script>
	
	<script src="javascript/fc_functions.js" type="text/javascript" charset="utf-8"></script>
	
	<link rel="stylesheet" href="javascript/chosen/chosen.css" type="text/css" media="screen" title="no title" charset="utf-8" />
	<link rel="stylesheet" href="css/fc_style.css" type="text/css" media="screen" title="no title" charset="utf-8" />
	<link rel="stylesheet" href="css/colorpicker.css" type="text/css" media="screen" title="no title" charset="utf-8" />
	
	<style type="text/css" media="screen">
	* {
		margin: 0;
		padding: 0;
		font-weight: regular;
	}
	
	<?php
	if(isset($_GET['bgcolor'])){
		echo 'body { background-color: #' . $_GET['bgcolor'] . ';';	
	}
	?>
	
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
		line-height: 1.40;
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
	
	<section class="content_main">
		<h1 id="h1_text" contenteditable="true">The Web Font Combinator</h1>
		<h2 id="h2_text" contenteditable="true">A Web Typography Tool</h2>
		<div id="p_text" contenteditable="true">
			<p>Donec ante. afafSed at velit. Vestibulum at purus at urna porttitor sodales. Nullam pulvinar, urna interdum eleifend sodales, eros est tempus quam, quis ultricies nibh elit vitae urna. Donec pretium arcu at quam. Quisque tristique, lacus id tempor blandit, quam massa imperdiet lorem, porta fermentum quam ante ac tortor. Curabitur mauris lectus, dapibus ut, ornare sit amet, vulputate sit amet, erat.</p>
			<p>Donec ante. Sed at velit. Vestibulum at purus at urna porttitor sodales. Nullam pulvinar, urna interdum eleifend sodales, eros est tempus quam, quis ultricies nibh elit vitae urna. Donec pretium arcu at quam. Quisque tristique, lacus id tempor blandit, quam massa imperdiet lorem, porta fermentum quam ante ac tortor. Curabitur mauris lectus, dapibus ut, ornare sit amet, vulputate sit amet, erat.</p>
		</div>
	</section>
	
	<form action="index.php" method="get" accept-charset="utf-8" id="controls">

		<select name="control_option" id="control_option">
			<option value="h1">Headline (H1)</option>
			<option value="h2">Subhead (H2)</option>
			<option value="p">Body text (p)</option>
			<option value="bg">Background</option>
		</select>
		<section id="h1_sec" class="control active">
			
			<select name="h1" id="h1_select">
				<?php 
					include 'default_font_list_h1.php';
				?>	
			</select>
			
			<div class="size">
				<label for="h1size">Size:</label>
				<input type="range" name="h1size" value="<?php if(isset($_GET['h1size'])) {echo $_GET['h1size']; } else { echo '30'; } ?>"  id="h1size" min="0" max="150" />
				<span class="value"><?php if(isset($_GET['h1size'])) {echo $_GET['h1size']; } else { echo '30'; } ?></span>px
			</div>

			<div class="lh">
				<label for="h1lh">Line Height</label>
				<input type="range" name="h1lh" value="<?php if(isset($_GET['h1lh'])) {echo $_GET['h1lh']; }  else { echo '1.40'; } ?>" id="h1lh" step="0.01" min="0" max="5"/>
				<span class="value"><?php if(isset($_GET['h1lh'])) {echo $_GET['h1lh']; } else { echo '1.40'; } ?></span>
			</div>
			
			<div class="color">
				<label for="h1color">Color:</label>
				<input type="text" name="h1color" value="<?php if(isset($_GET['h1color'])) {echo $_GET['h1color']; } ?>" placeholder="000000" id="h1color" />
			</div>
			
			<input type="button" name="h1_hide" value="Hide" id="h1_hide" class="hide_btn" />
		</section>
		<section id="h2_sec" class="control">	
			
			<select name="h2" id="h2_select">
				<?php include 'default_font_list_h2.php' ?>	
			</select>
			<div class="size">
				<label for="h2size">Size:</label>
				<input type="range" name="h2size" value="<?php if(isset($_GET['h2size'])) {echo $_GET['h2size']; } else { echo '20'; } ?>"  id="h2size" />
				<span class="value"><?php if(isset($_GET['h2size'])) {echo $_GET['h2size']; } else { echo '20'; } ?></span>px
			</div>
			<div class="lh">
				<label for="h2lh">Line Height</label>
				<input type="range" name="plh" value="<?php if(isset($_GET['h2lh'])) {echo $_GET['h2lh']; }  else { echo '1.40'; } ?>" id="h2lh" step="0.01" min="0" max="5" />
				<span class="value"><?php if(isset($_GET['h2lh'])) {echo $_GET['h2lh']; } else { echo '1.40'; } ?></span>
			</div>
			<div class="color">
				<label for="h2color">Color:</label>
				<input type="text" name="h2color" value="<?php if(isset($_GET['h2color'])) {echo $_GET['h2color']; } ?>" placeholder="000000" id="h2color" />
			</div>
			<input type="button" name="h2_hide" value="Hide" id="h2_hide" class="hide_btn" />
		</section>	
		<section id="p_sec" class="control">
			<select name="p" id="p_select">
				<?php include 'default_font_list_p.php' ?>	
			</select>
			<div class="size">
				<label for="psize">Size:</label>
				<input type="range" name="psize" value="<?php if(isset($_GET['psize'])) {echo $_GET['psize']; }  else { echo '16'; } ?>" min="5" max="45" id="psize" />
				<span class="value"><?php if(isset($_GET['psize'])) {echo $_GET['psize']; } else { echo '16'; } ?></span>px
			</div>
			<div class="lh">
				<label for="plh">Line Height</label>
				<input type="range" name="plh" value="<?php if(isset($_GET['plh'])) {echo $_GET['plh']; }  else { echo '1.40'; } ?>" id="plh" step="0.01" min="0" max="5" />
				<span class="value"><?php if(isset($_GET['plh'])) {echo $_GET['plh']; } else { echo '1.40'; } ?></span>
			</div>
			<div class="color">
				<label for="pcolor">Color:</label>
				<input type="text" name="pcolor" value="<?php if(isset($_GET['pcolor'])) {echo $_GET['pcolor']; } ?>" placeholder="000000" id="pcolor" />
			</div>
			<input type="button" name="p_hide" value="Hide" id="p_hide" class="hide_btn" />
		</section>
		<section id="bg_sec" class="control">
			<label for="bgcolor">Background Color:</label>
			<input type="text" name="bgcolor" value="<?php if(isset($_GET['bgcolor'])) {echo $_GET['bgcolor']; } ?>" placeholder="FFFFFF" id="bgcolor" />
		</section>	
		
		<input type="submit"  id="submit" />
			
	</form>
	
	
	
</body>
</html>
