<div class="container">
	<div class="row">
		<div class="col-6 align-self-center">
			<div class="jumbotron mt-4">
                <h3>Register</h3>
	     		<form method="post" action="<?= BASEURL ?>register/store">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter your name">
                    </div>
					<div class="form-group">
						<label>Email address</label>
						<input type="email" class="form-control" name="email" placeholder="Enter email">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
					<a href="<?= BASEURL ?>login" style="float:right;">Already account?</a>
				</form>
		    </div>
		</div>
	</div>
</div>