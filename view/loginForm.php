<div class="login">
	<div class="card">
		<form class="loginForm" action="Login" method="post">
			<div class="input">
				<label>Login</label>
				<input type="text" name="username" placeholder="My Login">
			</div>
			<div class="input">
				<!-- <label>Password</label> -->
				<input type="password" name="password" placeholder="My Password">
			</div>
			<div class="loginBtn">
				<button type="submit" name="button">Login</button>
			</div>
		</form>
		<div class="errorMessage"><?= $message; ?></div>
	</div>
</div>
