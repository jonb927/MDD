<body id="loginBg" class="hidden-desktop">
	<div class="container-fluid" id="main">
		<div class="row-fluid">
			<div class="span12">
				<div id="intro" class="clearfix" id="signup">
					<p>Signup with a username and password</p>
					<?php echo validation_errors(); ?>
					<?php echo form_open('newRoots/signupValidation'); ?>

					<h5>Username</h5>
					<input type="text" name="username" value ="<?php echo set_value('username')?>"  placeholder="username"/>
					<h5>Password</h5>
					<input type="password" name="password" value ="<?php echo set_value('password')?>"  placeholder="password"/>
					<h5>Confirm Password</h5>
					<input type="password" name="cpassword" value ="<?php echo set_value('cpassword')?>"  placeholder="password"/>
					<h5>Email</h5>
					<input type="text" name="email" value ="<?php echo set_value('email')?>"  placeholder="loopy@crazy.com"/>
					<div id="sSubmit"><input type="submit" value ="Sign Up"/></div>
				</form>
					<p>If you already have an account</p>
					<p><?php echo anchor('newRoots', 'Login')?></p>

				</div>
			</div>
		</div>	
