<div class="card">
	<div>New Password</div>
	<br/>
	<form class="loginForm" action="" method="post">
		<div class="input">
			<input type="password" name="newPassword1" placeholder="Password">
		</div>
		<div class="input">
			<input type="password" name="newPassword2" placeholder="Confirm Password">
		</div>
		<div class="registerBtn">
			<button type="submit" name="button">Confirm</button>
		</div>
	</form>
	<div class="errorMessage"><?= $successMessage;?></div>
	<div class="succesMessage"><?= $errorMessage;?></div>
</div>
