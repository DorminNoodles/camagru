<div>
	<div class="card">
		<div>Create an Account</div>
		<br/>
		<form class="registerForm" action="Register" method="post">
			<div class="input">
				<!-- <label>Name</label> -->
				<input type="text" name="username" placeholder="My Login">
			</div>
			<div class="input">
				<!-- <label>Password</label> -->
				<input type="password" name="password" placeholder="My Password">
			</div>
			<div class="input">
				<!-- <label>Email</label> -->
				<input type="email" name="email" placeholder="My Email">
			</div>
			<div class="registerBtn">
				<button type="submit" name="button">Register</button>
			</div>
		</form>
		<div class="errorMessage"><?= $message;?></div>
	</div>
</div>
