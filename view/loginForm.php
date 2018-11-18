<div class="login">
	<div class="card">
		<div>Login</div>
		<br/>
		<form class="loginForm" action="Login" method="post">
			<div class="input">
				<input type="text" name="username" placeholder="My Login">
			</div>
			<div class="input">
				<input type="password" name="password" placeholder="My Password">
			</div>
			<div class="registerBtn">
				<button type="submit" name="button">Login</button>
			</div>
		</form>
		<div><a href="/camagru/PasswordLink">forgot password</a></div>
		<div class="errorMessage"><?= $message; ?></div>
	</div>
</div>
