
	<h1><?= $data['code'] ?></h1>
	<form action="<?= SITE ?>home/login" method="POST" >
		<input type="text" name="user">
		<input type="password" name="pass">
		<input type="hidden" value="<?= $data['token'] ?>" name='token'>
		<input type="submit" name="login" value="login">
	</form>
