<body id="loginBg" class="hidden-desktop">
<div class="container-fluid" id="main">
	<div class="row-fluid">
		<div class="span12 clearfix" id="loginForm">
			<h1>Login to New Roots or <?php echo anchor('newRoots/signup', 'Sign Up')?> for new member access</h1>
			<form action="?" method="POST" class="form-horizontal clearfix">
			<div class="login clearfix"><input type="text" name="nRusername" placeholder="username" class="input-small"></div>
			<div class="login clearfix"><input type="password" name="nRpassword" placeholder="password" class="input-small"></div>
			<div class="clearfix" id="lsubmit"><input type="submit" value="login"/></div>	
			</form>
		</div>
	</div>