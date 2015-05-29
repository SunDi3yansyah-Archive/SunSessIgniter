<?php
$username = array(
	'name' => 'username',
	'autocomplete' => 'off',
	'placeholder' => 'Username'
	);
$password = array(
	'name' => 'password',
	'autocomplete' => 'off',
	'placeholder' => 'Password'
	);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Example Session in CodeIgniter</title>
</head>
<body>
	<?php echo form_open($this->uri->uri_string); ?>
		<?php echo form_input($username); ?>
		<?php echo form_input($password); ?>
		<?php echo form_submit('submit', 'Submit'); ?>
	<?php echo form_close(); ?>
</body>
</html>