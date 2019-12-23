<?php
	if(isset($_POST['submit'])){
		echo 'kek!!!!';
	}
	else{
		header('Location: yandex.ru');
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Форма</title>

		<meta charset="utf-8">
		<style type="text/css">
			table{
				margin: auto;
			}

			td{
				text-align: center;
			}
		</style>
	</head>

	<body>
		<table>
			<tr>
				<td>
					<form action="submit.php" method="post">
						<fieldset>
							<legend>Контактная информация</legend>

							<label>
								<p>
									Логин<br>
									<input type="text" name="login" required>
								</p>
							</label>

							<label>
								<p>
									E-mail<br>
									<input type="email" name="email" required>
								</p>
							</label>

							<label>
								<p>
									Пароль<br>
									<input type="password" name="password" required>
								</p>
							</label>

							<input type="submit" name="submit">
							<input type="reset">
						</fieldset>
					</form>
				</td>
			</tr>
		</table>
	</body>
</html>