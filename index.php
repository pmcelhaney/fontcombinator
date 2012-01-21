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
	
	<style type="text/css" media="screen">
	h1 {
		font-size: 30px;
	}
	
	h2 {
		font-size: 20px;
	}
	
	p {
		font-size: 16px;
		line-height: 1.4;
	}
	
    <?php 
	if(isset($_GET['h1'])){ 
	   	 echo 'h1 { font-family: ' . $_GET['h1'] . ';}';	 
	    }
	if(isset($_GET['h1size'])){ 
		   	 echo 'h1 { font-size: ' . $_GET['h1size'] . 'px;}';	 
		    }
	
	if(isset($_GET['h1color'])){ 
			   	 echo 'h1 { color: #' . $_GET['h1color'] . ';}';	 
			    }
	
	
	if(isset($_GET['h2'])){ 
	   	 echo 'h2 { font-family: ' . $_GET['h2'] . ';}';	 
	    }
	if(isset($_GET['h2size'])){ 
   	 echo 'h2 { font-size: ' . $_GET['h2size'] . 'px;}';	 
    }
	
	if(isset($_GET['h1color'])){ 
			echo 'h2 { color: #' . $_GET['h2color'] . ';}';	 
		}
	
	
	
		if(isset($_GET['p'])){ 
		   	 echo 'p { font-family: ' . $_GET['p'] . ';}';	 
		    }
		if(isset($_GET['h2size'])){ 
	   	 echo 'p { font-size: ' . $_GET['psize'] . 'px;}';	 
	    }
	
		if(isset($_GET['pcolor'])){ 
				echo 'p { color: #' . $_GET['pcolor'] . ';}';	 
			}

			if(isset($_GET['plh'])){ 
					echo 'p { line-height: ' . $_GET['plh'] . ';}';	 
				}
	
	
	?>

	</style>
	
	
</head>

<body>
	

		
	
	<form action="index.php" method="get" accept-charset="utf-8">


		<section id="h1_sec">
			<h1 id="the_web_font_combinator">The Web Font Combinator</h1>
			<select name="h1" id="h1_select">
				<?php 
					include 'default_font_list_h1.php';
				?>	
			</select>
			<label for="h1size">Size:</label>
			<input type="number" name="h1size" value="<?php if(isset($_GET['h1size'])) {echo $_GET['h1size']; } else { echo '30'; } ?>"  id="h1size" />px
			<label for="h1w">Weight:</label>
			<select name="h1w" id="h1w">
				<option value="300">300</option>
				<option value="regular">Regular</option>
				<option value="bold">Bold</option>
			</select>


			<label for="h1color">Color:</label>
			<input type="text" name="h1color" value="<?php if(isset($_GET['h1color'])) {echo $_GET['h1color']; } ?>" placeholder="000000" id="h1color" />
			
		</section>
		<section id="h2_sec">	
			<h2 id="h2_text" contenteditable="true">A Web Typography Tool</h2>
			<select name="h2" id="h2_select">
				<?php include 'default_font_list_h2.php' ?>	
			</select>
			<label for="h2size">Size:</label>
			<input type="number" name="h2size" value="<?php if(isset($_GET['h2size'])) {echo $_GET['h2size']; } else { echo '20'; } ?>"  id="h2size" />px
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
			<label for="pcolor">Color:</label>
			<input type="text" name="pcolor" value="<?php if(isset($_GET['pcolor'])) {echo $_GET['pcolor']; } ?>" placeholder="000000" id="pcolor" />
			<label for="plh">Line Height</label><input type="number" name="plh" value="<?php if(isset($_GET['plh'])) {echo $_GET['plh']; }  else { echo '1.4'; } ?>" id="plh" step="0.01" />
			
			
		</section>
		<input type="submit" name="Submit" value="Submit" id="Submit" />
			
	</form>
</body>
</html>
