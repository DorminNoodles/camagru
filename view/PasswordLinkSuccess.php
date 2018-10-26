<div class="card">
	<div>Enter your email for change password</div>
	<br/>
	<form class="loginForm" action="" method="post">
		<div class="input">
			<input type="email" name="email" placeholder="My Email">
		</div>
		<div class="registerBtn">
			<button type="submit" name="button">Login</button>
		</div>
	</form>
	<div class="errorMessage"><?= $successMessage;?></div>
	<div class="successMessage"><?= $errorMessage;?></div>
</div>
