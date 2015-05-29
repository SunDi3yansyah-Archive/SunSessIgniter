<?php foreach ($me as $user): ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $user->username; ?></title>
</head>
<body>
	Saya adalah <?php echo $user->username; ?>
	<br>
	Saya ingin <a href="<?php echo base_url('login/logout'); ?>">Logout</a>

</body>
</html>
<?php endforeach ?>