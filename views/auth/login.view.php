<div class="container">
	<div class="row">
		<div class="col-6 align-self-center">
			<div class="jumbotron mt-4">
	     		<form method="post" action="<?= BASEURL ?>login/login">
					<div class="form-group">
						<label>Email address</label>
						<input type="email" class="form-control" name="email" placeholder="Enter email">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input" name="remember" id="exampleCheck1">
						<label class="form-check-label" for="exampleCheck1">Remember me?</label>
					</div><br>
					<button type="submit" class="btn btn-primary">Submit</button>
					<a href="<?= BASEURL ?>register" style="float:right;">No have an account?</a>
				</form>
		    </div>
		</div>
	</div>
</div>