<!Doctype Html>
<head>
<meta name="viewport" content="width-device-width,initial-scale=1.0">

<link href="css/bootstrap.min.css" rel="stylesheet"></link>
<link href="css/styles.css" rel="stylesheet"></link>

<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</head>
</body>
<p><br/></p>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="page-header" style="margin-top:10px;">
					<h3> Sign-In Here!
					</div>
				<form class="form-horizontal">
					<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
							<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
							</div>
						</div>
					</div>
					<div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">
							<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
							<input type="password" class="form-control" id="inputPassword3" placeholder="Password">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<div class="checkbox">
								<label>
								<input type="checkbox"> Remember me
								<a href="forgot_pass.php" style="font-style:italic;padding-left:200px;"> Forgot your password!</a>
								</label>
							</div>
						 </div>
					</div>
					<!-- <div class="form-group" style="position:relative;border:1px solid blue;text-align:right;left:350px;z-index:1;width:300px;top:-35px;">
						<div class="col-sm-offset-2 col-sm-10">
								<label>
									<a href="forgot_pass.php" style="font-style:italic;"> Forgot your password!</a>
								</label>
							</div>
					</div> -->
					<div class="form-group" style="text-align:center;">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class= "btn-primary" style="width:200px;height:30px;border-radius:5px;text-shadow:none !important">Sign in</button>
						</div>
						<p><br/></p>
					<div class="form-group" style="text-align:center;padding:50px;">
						<div class="col-sm-offset-2 col-sm-10">
							<a href="sign_up.php">Not a member? Sign Up</button>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>