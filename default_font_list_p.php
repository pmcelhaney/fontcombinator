<?php

$systemFontArr = array(
	'Arial',
	'Garamond',
	'Georgia',
	'Helvetica',
	'Impact',
	'Lucida Grande',
	'Palatino',
	'Tahoma',
	'Times New Roman',
	'Trebuchet MS',
	'Verdana'
	);	
?>


	<?php foreach($systemFontArr as $value) { ?>
	    <option value="<?php echo $value ?>"
			<?php if(isset($_GET['p']) && $_GET['p'] == $value){
				echo 'selected';
			} ?>
			><?php echo $value ?></option>
	<?php } ?>

