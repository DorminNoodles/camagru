<div>
	<div class="card">
		<form class="loginForm" action="MyProfile" method="post">
			<div class="input">
				<label>Password</label>
				<input type="password" name="password" placeholder="My Password">
			</div>
			<div class="input">
				<div>
					<label>New Name</label>
				</div>
				<input type="text" name="username" placeholder="My Login" value="<?= $login ?>">
			</div>
			<div class="input">
				<label>New Password</label>
				<input type="password" name="newPassword" placeholder="My Password">
			</div>
			<div class="loginBtn">
				<button type="submit" name="button">Login</button>
			</div>
		</form>
		<div class="errorMessage"><?= $errorMessage; ?></div>
		<div class="successMessage"><?= $successMessage; ?></div>
	</div>
</div>
