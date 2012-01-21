<?php

$systemFontArr = array(
	'Arial',
	'Garamond',
	'Georgia',
	'Helvetica',
	'Times New Roman',
	'Verdana'
	);	
?>

	<?php foreach($systemFontArr as $value) { ?>
	    <option value="<?php echo $value ?>"
			<?php if(isset($_GET['h1']) && $_GET['h1'] == $value){
				echo 'selected';
			} ?>
			><?php echo $value ?></option>
	<?php } ?>

