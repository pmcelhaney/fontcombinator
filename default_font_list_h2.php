<?php

$systemFontArr = array(
	'Arial',
	'Garamond',
	'Georgia',
	'Helvetica',
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
			<?php if(isset($_GET['h2']) && $_GET['h2'] == $value){
				echo 'selected';
			} ?>
			><?php echo $value ?></option>
	<?php } ?>

